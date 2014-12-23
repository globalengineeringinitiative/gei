<?php
	
	if ( file_exists( get_template_directory() . '/gei.tsv' ) ) {
		$file = file_get_contents( get_template_directory() . '/gei.tsv' );
		$rows = preg_split ( '/$\R?^/m', $file ); // split on newlines
		$array = array();
		$i = 0;
		foreach( $rows as $row ) {
			$columns = explode( "\t", $row ); // split on tabs
			$array[$i]['post_title'] = $columns[0];
			if ( $columns[1] )
				$array[$i]['subtitle'] = $columns[1];
			if ( $columns[2] )
				$array[$i]['summary'] =	 $columns[2];
			if ( $columns[3] ) {
				$authors = str_replace( ';', ',', $columns[3] );
				$rows = explode( ',', $authors );
				$authors = array();
				$a = 0;
				foreach ( $rows as $author ) {
					$author = ltrim( $author );
					$authors[$a] = explode( ' ', $author, 2 );
					$a++;
				}
				$array[$i]['authors'] = $authors;
			}
			if ( $columns[4] )
				$array[$i]['source'] = $columns[4];
			if ( $columns[5] ) {
				$date = explode( '/', $columns[5] );
				$array[$i]['publication_date'] = $date[2] . $date[1] . $date[0];
			}
			if ( $columns[6] )
				$array[$i]['file_download_url'] = $columns[6];
			if ( $columns[7] )
				$array[$i]['language'] = $columns[7];
			if ( $columns[8] )
				$array[$i]['file_format'] = $columns[8];
			if ( $columns[9] )
				$array[$i]['media_type'] = str_replace( ' ', '-', $columns[9] );
			if ( $columns[10] ) {
				$disciplines = explode( ',', strtolower( $columns[10] ) );
				foreach ( $disciplines as $key => $value )
					$disciplines[$key] = str_replace( ' ', '-', $value );
				$array[$i]['disciplines'] = $disciplines;
			}
			if ( $columns[11] ) {
				$modules = explode( ',', strtolower( $columns[11] ) );
				foreach ( $modules as $key => $value )
					$modules[$key] = str_replace( ' ', '-',  $value );
				$array[$i]['modules'] = $modules;
			}
			if ( $columns[12] ) {
				$regions = explode( ',', strtolower( $columns[12] ) );
				foreach ( $regions as $key => $value )
					$regions[$key] = str_replace( ' ', '-',  $value );
				$array[$i]['regions'] = $regions;
			}
			if ( $columns[13] ) {
				$skills = explode( ',', strtolower( $columns[13] ) );
				foreach ( $skills as $key => $value )
					$skills[$key] = str_replace( ' ', '-',  $value );
				$array[$i]['skills'] = $skills;
			}
			if ( $columns[14] ) {
				$topics = explode( ',', strtolower( $columns[14] ) );
				foreach ( $topics as $key => $value )
					$topics[$key] = str_replace( ' ', '-',  $value );
				$array[$i]['topics'] = $topics;
			}
			if ( $columns[15] )
				$array[$i]['recommended_citation'] = $columns[15];
			$i++;
		}
				
		foreach ( $array as $resource ) {
			$post = array(
				'post_title'		=> $resource['post_title'],
				'post_status'		=> 'draft',
				'post_type'			=> 'gei_resource',
				'ping_status'		=> 'closed',
				'comment_status'	=> 'closed',
			);
			$post_id = wp_insert_post( $post );
			if ( $resource['subtitle'] ) {
				update_post_meta( $post_id, 'subtitle', $resource['subtitle'] );
				update_post_meta( $post_id, '_subtitle', 'field_5493bcf20f7c1' );
			}
			if ( $resource['authors'] ) {
				update_post_meta( $post_id, 'authors', count( $resource['authors'] ) );
				update_post_meta( $post_id, '_authors', 'field_5493bd060f7c3' );
				$i = 0;
				foreach ( $resource['authors'] as $author ) {
					add_post_meta( $post_id, 'authors_' . $i . '_first_name', $author[0] );
					add_post_meta( $post_id, '_authors_' . $i . '_first_name', 'field_5493bfe053b7e' );
					add_post_meta( $post_id, 'authors_' . $i . '_last_name', $author[1] );
					add_post_meta( $post_id, '_authors_' . $i . '_last_name', 'field_5493bfe853b7f' );
				}
			}
			if ( $resource['summary'] ) {
				update_post_meta( $post_id, 'summary', $resource['summary'] );
				update_post_meta( $post_id, '_summary', 'field_5493bcfa0f7c2' );
			}
			if ( $resource['source'] ) {
				update_post_meta( $post_id, 'source', $resource['source'] );
				update_post_meta( $post_id, '_source', 'field_5493bd470f7c6' );
			}
			if ( $resource['publication_date'] ) {
				update_post_meta( $post_id, 'publication_date', $resource['publication_date'] );
				update_post_meta( $post_id, '_publication_date', 'field_5493bd560f7c7' );
			}
			if ( $resource['file_download_url'] ) {
				update_post_meta( $post_id, 'file_download_url', $resource['file_download_url'] );
				update_post_meta( $post_id, '_file_download_url', 'field_5493bd960f7c9' );
			}
			if ( $resource['language'] ) {
				update_post_meta( $post_id, 'language', $resource['language'] );
				update_post_meta( $post_id, '_language', 'field_5493c364da787' );
			}
			if ( $resource['file_format'] ) {
				update_post_meta( $post_id, 'file_format', $resource['file_format'] );
				update_post_meta( $post_id, '_file_format', 'field_5493bdab0f7ca' );
			}
			if ( $resource['recommended_citation'] ) {
				update_post_meta( $post_id, 'recommended_citation', $resource['recommended_citation'] );
				update_post_meta( $post_id, '_recommended_citation', 'field_5493be9e0f7ce' );
			}
			if ( $resource['media_type'] ) {
				wp_set_object_terms( $post_id, $resource['media_type'], 'gei_type' );
				$term = get_term_by( 'slug', $resource['media_type'], 'gei_type' );
				update_post_meta( $post_id, 'media_type', $term->term_id );
				update_post_meta( $post_id, '_media_type', 'field_5493bdbc0f7cb' );
			}
			if ( $resource['disciplines'] ) {
				wp_set_object_terms( $post_id, $resource['disciplines'], 'gei_discipline' );
				foreach ( $resource['disciplines'] as $discipline ) {
					$term = get_term_by( 'slug', $discipline, 'gei_type' );
					update_post_meta( $post_id, 'disciplines', $term->term_id );
					update_post_meta( $post_id, '_disciplines', 'field_54949ab19cd76' );
				}
			}
			if ( $resource['modules'] ) {
				wp_set_object_terms( $post_id, $resource['modules'], 'gei_module' );
				foreach ( $resource['modules'] as $module ) {
					$term = get_term_by( 'slug', $module, 'gei_module' );
					update_post_meta( $post_id, 'modules', $term->term_id );
					update_post_meta( $post_id, '_modules', 'field_54988e077e084' );
				}
			}
			if ( $resource['regions'] ) {
				wp_set_object_terms( $post_id, $resource['regions'], 'gei_region' );
				foreach ( $resource['regions'] as $region ) {
					$term = get_term_by( 'slug', $region, 'gei_region' );
					update_post_meta( $post_id, 'regions', $term->term_id );
					update_post_meta( $post_id, '_regions', 'field_5498ebde9b896' );
				}
			}
			if ( $resource['skills'] ) {
				wp_set_object_terms( $post_id, $resource['skills'], 'gei_skill' );
				foreach ( $resource['skills'] as $skill ) {
					$term = get_term_by( 'slug', $skill, 'gei_skill' );
					update_post_meta( $post_id, 'skills', $term->term_id );
					update_post_meta( $post_id, '_skills', 'field_54949ad09cd77' );
				}
			}
			if ( $resource['topics'] ) {
				wp_set_object_terms( $post_id, $resource['topics'], 'gei_topic' );
				foreach ( $resource['topics'] as $topic ) {
					$term = get_term_by( 'slug', $topic, 'gei_topic' );
					update_post_meta( $post_id, 'topics', $term->term_id );
					update_post_meta( $post_id, '_topics', 'field_54949ade9cd78' );
				}
			}
		}
	}
?>