<?php

namespace GlobalEngineeringInitiative\Api_v1\Resources;

use GlobalEngineeringInitiative\Api_v1\Api;

/**
 * Processes public information about collections of resources and individual resources
 * 
 * The format it expects is: 
 * http://globalengineeringinitiative.com/api/v1/resources
 * http://globalengineeringinitiative.com/api/v1/resources/12
 * 
 * Arguments can be passed:
 * ?subjects=biology&license=cc-by&limit=3
 */
class ResourcesApi extends Api {

	/**
	 * Control the arguments that can be passed to the API
	 * 
	 * @var type 
	 */
	protected $default_variations = array(
	    'offset' => 0,
	    'limit' => 100,
	);
	
	/**
	 * Default format of the response
	 * 
	 * @var string 
	 */
	protected $format = 'json';

	/**
	 * List of published resources
	 * 
	 * @var array 
	 */
	protected $published_resources = array();
	
	/**
	 * Array of metadata keys
	 * 
	 * @var array 
	 */
	protected $metadata_keys = array(
		'subtitle',
		'authors' => array(
			'first_name',
			'last_name'
		),
		'source',
		'publication_date',
		'short_summary',
		'summary',
		'recommended_citation',
		'external_url',
		'file_download_url',
		'file_format',
		'language',
	);

	/**
	 * Array of taxonomies
	 * 
	 * @var array 
	 */
	protected $taxonomy_names = array(
		'gei_discipline',
		'gei_module',
		'gei_topic',
		'gei_type',
		'gei_region',
		'gei_skill',
	);
	
	/**
	 * Parse arguments and send the response to the controller
	 * 
	 * @param int $id
	 * @param array $variations
	 */
	function __construct( $id = '', $variations = '' ) {

		// only serve info about published resources
		$this->published_resources = $this->getPublishedResourceIds();

		// get the format, set it as instance variable
		if ( isset( $variations['json'] ) && 1 == $variations['json'] ) {
			$this->format = 'json';
			unset( $variations['json'] );
		} elseif ( isset( $variations['xml'] ) && 1 == $variations['xml'] ) {
			$this->format = 'xml';
			unset( $variations['xml'] );
		}

		// Merge args with default args
		$args = wp_parse_args( $variations, $this->default_variations );

		// add id to the args
		if ( $id ) {
			$args['id'] = $id;
		}

		$this->controller( $args );
	}

	/**
	 * Controls which resources are retrieved based on what is passed to it
	 * 
	 * @param array $args
	 */
	public function controller( $args ) {

		$resources = $this->getResourcesById( $args );
		$resources = $this->filterArgs( $resources, $args );

		$this->response( $resources, $this->format );
	}

	/**
	 * Filters the results based on what is passed to it
	 * 
	 * @param array $results
	 * @param array $args
	 * @return array of resources with arguments applied
	 */
	protected function filterArgs( $results, $args ) {
		$match = array();
		
		$diff = array_diff_assoc( $args, $this->default_variations );
		if ( empty( $diff ) ) {
			return $results;
		}

		if ( ! isset( $diff['id'] ) ) {

			$args_length = count( $diff );

			if ( isset( $diff['title'] ) ) {

				$titles = $this->getMetaElement( $results, 'title' );
				$match['title'] = $this->naiveStringSearch( $diff['title'], $titles );

				if ( empty( $match['title'] ) ) { 
					$titles = $this->getMetaElement( $results, 'subtitle' );
					$match['title'] = $this->naiveStringSearch( $diff['title'], $titles );
				}
			}

			if ( isset( $diff['author'] ) ) {

				$authors = $this->getMetaElement( $results, 'authors' );
				$match['author'] = $this->naiveStringSearch( $diff['author'], $authors );
			}

			if ( isset( $diff['abstract'] ) ) {

				$summaries = $this->getMetaElement( $results, 'summary' );
				$match['abstract'] = $this->naiveStringSearch( $diff['abstract'], $summaries );
				
				if ( empty( $match['abstract'] ) ) { 
					$summaries = $this->getMetaElement( $results, 'short_summary' );
					$match['abstract'] = $this->naiveStringSearch( $diff['abstract'], $summaries );
				}
			}

			if ( isset( $diff['date'] ) ) {
				
				$diff['date'] = str_replace( '-', '/', $diff['date'] ); // reformat
				$date = $this->getMetaElement( $results, 'publication_date' );
				$match['date'] = $this->naiveStringSearch( $diff['date'], $date );
			}

			if ( isset( $diff['discipline'] ) ) {

				$disciplines = $this->getTaxonomyElement( $results, 'gei_discipline' );
				$match['discipline'] = $this->naiveStringSearch( $diff['discipline'], $disciplines );
			}

			if ( isset( $diff['module'] ) ) {

				$modules = $this->getTaxonomyElement( $results, 'gei_module' );
				$match['module'] = $this->naiveStringSearch( $diff['module'], $modules );
			}

			if ( isset( $diff['region'] ) ) {

				$regions = $this->getTaxonomyElement( $results, 'gei_region' );
				$match['region'] = $this->naiveStringSearch( $diff['region'], $regions );
			}

			if ( isset( $diff['skill'] ) ) {

				$skills = $this->getTaxonomyElement( $results, 'gei_skill' );
				$match['skill'] = $this->naiveStringSearch( $diff['skill'], $skills );
			}
			
			if ( isset( $diff['topic'] ) ) {

				$topics = $this->getTaxonomyElement( $results, 'gei_topic' );
				$match['topic'] = $this->naiveStringSearch( $diff['topic'], $topics );
			}
			
			if ( isset( $diff['type'] ) ) {

				$types = $this->getTaxonomyElement( $results, 'gei_type' );
				$match['type'] = $this->naiveStringSearch( $diff['type'], $types );
			}
			
			// evaluate matches 
			$matches = $this->intersectArrays( $match );

			if ( ! empty( $matches ) ) {
				$filtered_resources = array_flip( $matches );

				// preserve only the post_ids that made it through each of the filters
				$results = array_intersect_key( $results, $filtered_resources );

				// return empty if there is nothing else to process	
			} elseif ( empty( $matches ) && ( ! isset( $diff['limit'] ) && ! isset( $diff['offset'] )) ) {
				// bail if no matches
				return $this->apiErrors( 'empty' );
			}

			// if the offset is bigger than the resource library
			if ( isset( $diff['offset'] ) && $diff['offset'] > count( $results ) ) {
				return $this->apiErrors( 'offset' );
			}

			// set the limit, look for unlimited requests
			if ( isset( $diff['limit'] ) ) {
				$limit = ( 0 == $diff['limit'] ) ? NULL : $diff['limit'];
				$results = array_slice( $results, $diff['offset'], $limit, true );
			}

			// safety check
			if ( empty( $results ) ) {
				return $this->apiErrors( 'empty' );
			}

			// for single records
		} elseif ( isset( $diff['id'] ) ) {

			if ( count( $diff ) == 1 ) {
				// no further processing required
				return $results;
			}

			// if the offset is bigger than the resource library
			if ( isset( $diff['offset'] ) && $diff['offset'] > count( $results ) ) {
				return $this->apiErrors( 'offset' );
			}

			// set the limit, look for unlimited requests
			$limit = ( 0 == $diff['limit'] ) ? NULL : $diff['limit'];
			$results = array_slice( $results, $diff['offset'], $limit, true );

			// safety check
			if ( empty( $results ) ) {
				return $this->apiErrors( 'empty' );
			}
		}

		return $results;
	}

	/**
	 * Keeps only arrays that are the same, used for filtering resource ids based on 
	 * arguments 
	 * 
	 * @param array $match
	 * @return array
	 */
	protected function intersectArrays( array $match ) {
		// needs to be at least two arrays to intersect
		$keys = array_keys( $match );
		$minimum = count( $keys );
		$result = array();

		if ( $minimum < 2 ) {
			return $match[$keys[0]];
		} else {

			$result = call_user_func_array( 'array_intersect', $match );
		}

		return $result;
	}

	/**
	 * Give this the name of any metadata element and it will return just those 
	 * elements with the resource_id as array( '13' => 'element' )
	 * 
	 * @param array $resources
	 * @param string $element
	 * @return array 
	 */
	protected function getMetaElement( array $resources, $element ) {
		$result = array();

		foreach ( $resources as $resource_id => $val ) {
			if ( isset( $val[$element] ) ) {
				$result[$resource_id] = $val[$element];
			}
		}

		return $result;
	}

	/**
	 * Give this the name of any taxonomy entry and it will return just those 
	 * elements with the resource_id as array( '13' => 'element' )
	 * 
	 * @param array $resources
	 * @param string $taxonomy
	 * @return array 
	 */
	protected function getTaxonomyElement( array $resources, $taxonomy ) {
		$result = array();

		foreach ( $resources as $resource_id => $val ) {
			$terms = wp_get_object_terms( $resource_id, $taxonomy, array( 'fields' => 'names' ) );
			if ( !empty( $terms ) )
				$result[$resource_id] = $terms;
		}

		return $result;
	}

	/**
	 * Give this the ID of any resource and it will return an array of the
	 * resource's metadata values.
	 * 
	 * @param string $resource_id
	 * @return array 
	 */
	protected function getMetaValues( $resource_id ) {
		$result = array();

		foreach ( $this->metadata_keys as $key => $val ) {
			if ( is_array( $val ) ) {
				if ( have_rows( $key, $resource_id ) ):
					$result[$key] = array();
				    while ( have_rows( $key, $resource_id ) ) : the_row();
				    	$row = '';
				    	foreach ( $val as $sub_field ) {
					    	$row .= get_sub_field( $sub_field ) . ' ';
				    	}
				    	$result[$key][] = rtrim( $row );
				    endwhile;
				endif;
			} else {
				if ( get_field( $val, $resource_id ) ) {
					$result[$val] = get_field( $val, $resource_id );
				}
			}
		}

		return $result;
	}

	/**
	 * Give this the ID of any resource and it will return an array of the
	 * resource's taxonomy values.
	 * 
	 * @param string $resource_id
	 * @return array 
	 */
	protected function getTaxonomyValues( $resource_id ) {
		$result = array();

		foreach ( $this->taxonomy_names as $taxonomy ) {
			$terms = wp_get_object_terms( $resource_id, $taxonomy, array( 'fields' => 'names' ) );
			if ( !empty( $terms ) ) {
				$taxonomy_name = str_replace('gei_', '', $taxonomy);
				if ( count( $terms ) > 1 ) {
					$result[$taxonomy_name] = $terms;
				} else {
					$result[$taxonomy_name] = $terms[0];
				}
			}
		}

		return $result;
	}

	/**
	 * Checks for the existence of a substring pattern within an array and returns
	 * an array of keys (blog_id) if found
	 * 
	 * @param string|array $search_words
	 * @param array $haystack in the form of blog_id => value
	 * @return array of key values 
	 */
	protected function naiveStringSearch( $search_words, array $haystack ) {
		$matches = array();

		// look for more than one search word
		if ( false !== strpos( $search_words, ',' ) ) {
			$search_words = explode( ',', $search_words );

			// prevent excessive requests ?subjects=cat,bird,dog,bat,eggs,fox,greed,hell,etc
			$search_words = array_slice( $search_words, 0, 5 );
			$count = count( $search_words );

			for ( $i = 0; $i < $count; $i ++ ) {
				foreach ( $haystack as $key => $val ) {
					if ( is_array( $val ) ) {
						foreach ( $val as $v ) {
							if ( false !== stripos( $v, $search_words[$i] ) ) {
								$matches[] = $key;
							}
						}
					} else {
						if ( false !== stripos( $val, $search_words[$i] ) ) {
							$matches[] = $key;
						}
					}
				}
			}

			// get rid of duplicates
			$matches = array_unique( $matches );
		} else {
			foreach ( $haystack as $key => $val ) {
				if ( is_array( $val ) ) {
					foreach ( $val as $v ) {
						if ( false !== stripos( $v, $search_words ) ) {
							$matches[] = $key;
						}
					}
				} else {
					if ( false !== stripos( $val, $search_words ) ) {
						$matches[] = $key;
					}
				}
			}
			$matches = array_unique( $matches );
		}

		return $matches;
	}

	/**
	 * Expose public information about a resource 
	 * 
	 * @param array $args
	 * @return array of resource information
	 */
	protected function getResourcesById( array $args ) {
		$resource = array();

		if ( empty( $args['id'] ) ) {

			foreach ( $this->published_resources as $resource_id ) {
				@$resource[$resource_id];
				$resource[$resource_id]['id'] = $resource_id;
				$resource[$resource_id]['url'] = get_the_permalink( $resource_id );
				$resource[$resource_id]['title'] = get_the_title( $resource_id );
				foreach ( $this->getMetaValues( $resource_id ) as $key => $value ) {
					$resource[$resource_id][$key] = $value;
				}
				foreach ( $this->getTaxonomyValues( $resource_id ) as $key => $value ) {
					$resource[$resource_id][$key] = $value;
				} 
			}
		} else {
			if ( ! in_array( $args['id'], $this->published_resources ) ) {
				return $this->apiErrors( 'empty' );
			}
			$resource[$args['id']];
			$resource[$args['id']]['id'] = $args['id'];
			$resource[$args['id']]['url'] = get_the_permalink( $args['id'] );
			$resource[$args['id']]['title'] = get_the_title( $args['id'] );
			foreach ( $this->getMetaValues( $args['id'] ) as $key => $value ) {
				$resource[$args['id']][$key] = $value;
			}
			foreach ( $this->getTaxonomyValues( $args['id'] ) as $key => $value ) {
				$resource[$args['id']][$key] = $value;
			} 
		}

		return $resource;
	}

	/**
	 * Only interested in published resources
	 * 
	 * @global global $wpdb
	 * @return array of resource_ids for resources that are published
	 */
	function getPublishedResourceIds() {
		$result = array();
		
		$resources = get_posts( array(
			'post_type' => 'gei_resource',
			'posts_per_page' => -1,
		) );
		
		foreach ( $resources as $resource ) {
			$result[] = $resource->ID;
		}

		return $result;
	}
	
}
