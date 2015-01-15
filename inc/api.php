<?php
/**
 * API for the resource library.
 *
 * @package Global Engineering Initiative
 */
 
 function gei_api_init() {
	global $gei_api_library;

	$gei_api_library = new GEI_API_Library();
	add_filter( 'json_endpoints', array( $gei_api_library, 'register_routes' ) );
}
add_action( 'wp_json_server_before_serve', 'gei_api_init' );

class GEI_API_Library extends WP_JSON_CustomPostType{
	protected $base = '/library';
	protected $type = 'gei_resource';
	
	public function register_routes( $routes ) {
		$routes = parent::register_routes( $routes );
		$routes[ $this->base . '/topic/(?P<gei_topic>.+)'] = array(
			array( array( $this, 'get_by_topic'), WP_JSON_Server::READABLE ),
		);
		$routes[ $this->base . '/module/(?P<gei_module>.+)'] = array(
			array( array( $this, 'get_by_module'), WP_JSON_Server::READABLE ),
		);
		$routes[ $this->base . '/skill/(?P<gei_skill>.+)'] = array(
			array( array( $this, 'get_by_skill'), WP_JSON_Server::READABLE ),
		);
		$routes[ $this->base . '/discipline/(?P<gei_discipline>.+)'] = array(
			array( array( $this, 'get_by_discipline'), WP_JSON_Server::READABLE ),
		);
		$routes[ $this->base . '/type/(?P<gei_type>.+)'] = array(
			array( array( $this, 'get_by_type'), WP_JSON_Server::READABLE ),
		);
		return $routes;
	}

	/**
	 * Retrieve posts.
	 *
	 * @since 3.4.0
	 *
	 * The optional $filter parameter modifies the query used to retrieve posts.
	 * Accepted keys are 'post_type', 'post_status', 'number', 'offset',
	 * 'orderby', and 'order'.
	 *
	 * @uses wp_get_recent_posts()
	 *
	 * @param array $filter Parameters to pass through to `WP_Query`
	 * @param string $context The context; 'view' (default) or 'edit'.
	 * @param string|array $type Post type slug, or array of slugs
	 * @param int $page Page number (1-indexed)
	 * @return stdClass[] Collection of Post entities
	 */

	public function get_by_term( $context = 'view', $term = null, $tax = null ) {

		$query = array(
			'post_type' => 'gei_resource',
			'posts_per_page' => -1,
			'tax_query' => array(
				array(
					'taxonomy' => $tax,
					'field'    => 'slug',
					'terms'    => $term,
				),
			),
		);
		$post_query = new WP_Query();
		$posts_list = $post_query->query( $query );
		$response   = new WP_JSON_Response();
		$response->query_navigation_headers( $post_query );

		if ( ! $posts_list ) {
			$response->set_data( array() );
			return $response;
		}

		// holds all the posts data
		$response = array();

		foreach ( $posts_list as $post ) {
			$post = get_object_vars( $post );

			// Do we have permission to read this post?
			if ( ! $this->check_read_permission( $post ) ) {
				continue;
			}

			$post_data = $this->prepare_post( $post, $context );
			if ( is_wp_error( $post_data ) ) {
				continue;
			}

			$response[] = $post_data;
		}

		return $response;
	}

	public function get_by_topic( $context = 'view', $gei_topic = null ) {
		return $this->get_by_term( $context, $gei_topic, 'gei_topic' );
	}
	public function get_by_skill( $context = 'view', $gei_skill = null ) {
		return $this->get_by_term( $context, $gei_skill, 'gei_skill' );
	}
	public function get_by_module( $context = 'view', $gei_module = null ) {
		return $this->get_by_term( $context, $gei_module, 'gei_module' );
	}
	public function get_by_discipline( $context = 'view', $gei_discipline = null ) {
		return $this->get_by_term( $context, $gei_discipline, 'gei_discipline' );
	}
	public function get_by_type( $context = 'view', $gei_type = null ) {
		return $this->get_by_term( $context, $gei_type, 'gei_type' );
	}

}