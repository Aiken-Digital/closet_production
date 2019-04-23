<?php
/*
Plugin Name: Kona Instagram Widget
Plugin URI: http://spab-rice.com/wordpress/kona
Description: A Simple widget for displaying latest Instagram photos.
Version: 2.0.3
Author: SpabRice
Author URI: http://themeforest.net/user/SpabRice
Text Domain: kona
License: GNU General Public License v2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A modified verison of the WP Instagram Widget by Scott Evans
*/

function kona_widget() {
	register_widget( 'kona_instagram_widget' );
}
add_action( 'widgets_init', 'kona_widget' );

Class kona_instagram_widget extends WP_Widget {

	function __construct() {
		parent::__construct(
			'kona-instagram-feed',
			__( 'Kona -- Instagram', 'kona' ),
			array(
				'classname' => 'kona-instagram-feed',
				'description' => esc_html__( 'Displays the latest Instagram photos', 'kona' ),
				'customize_selective_refresh' => true,
			)
		);
	}

	function widget( $args, $instance ) {

		$title = empty( $instance['title'] ) ? '' : apply_filters( 'widget_title', $instance['title'] );
		$username = empty( $instance['username'] ) ? '' : $instance['username'];
		$limit = empty( $instance['number'] ) ? 9 : $instance['number'];
		$size = empty( $instance['size'] ) ? 'large' : $instance['size'];
		$columns = empty( $instance['columns'] ) ? '6' : $instance['columns'];
		$spacing = empty( $instance['spacing'] ) ? 'mini' : $instance['spacing'];
		$link = empty( $instance['link'] ) ? '' : $instance['link'];

		echo $args['before_widget'];

		if ( ! empty( $title ) ) { echo $args['before_title'] . wp_kses_post( $title ) . $args['after_title']; };

		do_action( 'kona_before_widget', $instance );

		if ( '' !== $username ) {

			$media_array = $this->scrape_instagram( $username );

			if ( is_wp_error( $media_array ) ) {

				echo wp_kses_post( $media_array->get_error_message() );

			} else {

				// filter for images only?
				if ( $images_only = apply_filters( 'kona_images_only', false ) ) {
					$media_array = array_filter( $media_array, array( $this, 'images_only' ) );
				}

				// slice list down to required limit.
				$media_array = array_slice( $media_array, 0, $limit );

				// filters for custom classes.
				$ulclass = apply_filters( 'kona_list_class', 'instagram-pics instagram-col-'.$columns.' instagram-spaced-'.$spacing.' instagram-size-' . $size );
				$liclass = apply_filters( 'kona_item_class', '' );
				$aclass = apply_filters( 'kona_a_class', '' );
				$imgclass = apply_filters( 'kona_img_class', '' );
				$template_part = apply_filters( 'kona_template_part', 'parts/kona.php' );

				?><ul class="<?php echo esc_attr( $ulclass ); ?>"><?php
				foreach( $media_array as $item ) {
					// copy the else line into a new file (parts/kona.php) within your theme and customise accordingly.
					if ( locate_template( $template_part ) !== '' ) {
						include locate_template( $template_part );
					} else {
						echo '<li class="' . esc_attr( $liclass ) . '"><a href="' . esc_url( $item['link'] ) . '" target="_blank"  class="' . esc_attr( $aclass ) . '"><img src="' . esc_url( $item[$size] ) . '"  alt="' . esc_attr( $item['description'] ) . '" title="' . esc_attr( $item['description'] ) . '"  class="' . esc_attr( $imgclass ) . '"/></a></li>';
					}
				}
				?></ul><?php
			}
		}

		$linkclass = apply_filters( 'kona_link_class', 'clear' );
		$linkaclass = apply_filters( 'kona_linka_class', '' );

		switch ( substr( $username, 0, 1 ) ) {
			case '#':
				$url = '//instagram.com/explore/tags/' . str_replace( '#', '', $username );
				break;

			default:
				$url = '//instagram.com/' . str_replace( '@', '', $username );
				break;
		}

		if ( '' !== $link ) {
			?><p class="<?php echo esc_attr( $linkclass ); ?>"><a href="<?php echo trailingslashit( esc_url( $url ) ); ?>" rel="me" target="_blank" class="<?php echo esc_attr( $linkaclass ); ?>"><?php echo wp_kses_post( $link ); ?></a></p><?php
		}

		do_action( 'kona_after_widget', $instance );

		echo $args['after_widget'];
	}

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array(
			'title' => __( 'Instagram', 'kona' ),
			'username' => '',
			'size' => 'large',
			'link' => __( 'Follow Me!', 'kona' ),
			'columns' => 4,
			'number' => 9
		) );
		$title = $instance['title'];
		$username = $instance['username'];
		$number = absint( $instance['number'] );
		$size = $instance['size'];
		$columns = $instance['columns'];
		$spacing = $instance['spacing'];
		$link = $instance['link'];
		?>
		<p><label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title', 'kona' ); ?>: <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" /></label></p>
		<p><label for="<?php echo esc_attr( $this->get_field_id( 'username' ) ); ?>"><?php esc_html_e( '@username or #tag', 'kona' ); ?>: <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'username' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'username' ) ); ?>" type="text" value="<?php echo esc_attr( $username ); ?>" /></label></p>
		<p><label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"><?php esc_html_e( 'Number of photos', 'kona' ); ?>: <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" /></label></p>
		<p><label for="<?php echo esc_attr( $this->get_field_id( 'size' ) ); ?>"><?php esc_html_e( 'Photo size', 'kona' ); ?>:</label>
			<select id="<?php echo esc_attr( $this->get_field_id( 'size' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'size' ) ); ?>" class="widefat">
				<option value="thumbnail" <?php selected( 'thumbnail', $size ); ?>><?php esc_html_e( 'Thumbnail', 'kona' ); ?></option>
				<option value="small" <?php selected( 'small', $size ); ?>><?php esc_html_e( 'Small', 'kona' ); ?></option>
				<option value="large" <?php selected( 'large', $size ); ?>><?php esc_html_e( 'Large', 'kona' ); ?></option>
				<!--<option value="original" <?php selected( 'original', $size ); ?>><?php esc_html_e( 'Original', 'kona' ); ?></option>-->
			</select>
		</p>
		<p><label for="<?php echo esc_attr( $this->get_field_id( 'columns' ) ); ?>"><?php esc_html_e( 'Number of Columns', 'kona' ); ?>:</label>
			<select id="<?php echo esc_attr( $this->get_field_id( 'columns' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'columns' ) ); ?>" class="widefat">
				<option value="2" <?php selected( '2', $columns ) ?>>2</option>
				<option value="3" <?php selected( '3', $columns ) ?>>3</option>
				<option value="4" <?php selected( '4', $columns ) ?>>4</option>
				<option value="5" <?php selected( '5', $columns ) ?>>5</option>
				<option value="6" <?php selected( '6', $columns ) ?>>6</option>
				<option value="7" <?php selected( '7', $columns ) ?>>7</option>
				<option value="8" <?php selected( '8', $columns ) ?>>8</option>
				<option value="9" <?php selected( '9', $columns ) ?>>9</option>
				<option value="10" <?php selected( '10', $columns ) ?>>10</option>
			</select>
		</p>
		<p><label for="<?php echo esc_attr( $this->get_field_id( 'spacing' ) ); ?>"><?php esc_html_e( 'Spacing', 'kona' ); ?>:</label>
			<select id="<?php echo esc_attr( $this->get_field_id( 'spacing' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'spacing' ) ); ?>" class="widefat">
				<option value="none" <?php selected( 'none', $spacing ) ?>><?php esc_html_e( 'None', 'kona' ); ?></option>
				<option value="mini" <?php selected( 'mini', $spacing ) ?>><?php esc_html_e( 'Mini', 'kona' ); ?></option>
				<option value="small" <?php selected( 'small', $spacing ) ?>><?php esc_html_e( 'Small', 'kona' ); ?></option>
				<option value="medium" <?php selected( 'medium', $spacing ) ?>><?php esc_html_e( 'Medium', 'kona' ); ?></option>
			</select>
		</p>
		<p><label for="<?php echo esc_attr( $this->get_field_id( 'link' ) ); ?>"><?php esc_html_e( 'Link text', 'kona' ); ?>: <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'link' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'link' ) ); ?>" type="text" value="<?php echo esc_attr( $link ); ?>" /></label></p>
		<?php

	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['username'] = trim( strip_tags( $new_instance['username'] ) );
		$instance['number'] = ! absint( $new_instance['number'] ) ? 9 : $new_instance['number'];
		$instance['size'] = ( ( 'thumbnail' === $new_instance['size'] || 'large' === $new_instance['size'] || 'small' === $new_instance['size'] || 'original' === $new_instance['size'] ) ? $new_instance['size'] : 'large' );
		$instance['columns'] = ( ( '2' === $new_instance['columns'] || '3' === $new_instance['columns'] || '4' === $new_instance['columns'] || '5' === $new_instance['columns'] || '6' === $new_instance['columns'] || '7' === $new_instance['columns'] || '8' === $new_instance['columns'] || '9' === $new_instance['columns'] || '10' === $new_instance['columns']  ) ? $new_instance['columns'] : '4' );
		$instance['spacing'] = ( ( 'none' === $new_instance['spacing'] || 'mini' === $new_instance['spacing'] || 'small' === $new_instance['spacing'] || 'medium' === $new_instance['spacing'] ) ? $new_instance['spacing'] : 'small' );
		$instance['link'] = strip_tags( $new_instance['link'] );
		return $instance;
	}

	// based on https://gist.github.com/cosmocatalano/4544576.
	function scrape_instagram( $username ) {

		$username = trim( strtolower( $username ) );

		switch ( substr( $username, 0, 1 ) ) {
			case '#':
				$url              = 'https://instagram.com/explore/tags/' . str_replace( '#', '', $username );
				$transient_prefix = 'h';
				break;

			default:
				$url              = 'https://instagram.com/' . str_replace( '@', '', $username );
				$transient_prefix = 'u';
				break;
		}

		if ( false === ( $instagram = get_transient( 'insta-a10-' . $transient_prefix . '-' . sanitize_title_with_dashes( $username ) ) ) ) {

			$remote = wp_remote_get( $url );

			if ( is_wp_error( $remote ) ) {
				return new WP_Error( 'site_down', esc_html__( 'Unable to communicate with Instagram.', 'kona' ) );
			}

			if ( 200 !== wp_remote_retrieve_response_code( $remote ) ) {
				return new WP_Error( 'invalid_response', esc_html__( 'Instagram did not return a 200.', 'kona' ) );
			}

			$shards      = explode( 'window._sharedData = ', $remote['body'] );
			$insta_json  = explode( ';</script>', $shards[1] );
			$insta_array = json_decode( $insta_json[0], true );

			if ( ! $insta_array ) {
				return new WP_Error( 'bad_json', esc_html__( 'Instagram has returned invalid data.', 'kona' ) );
			}

			if ( isset( $insta_array['entry_data']['ProfilePage'][0]['graphql']['user']['edge_owner_to_timeline_media']['edges'] ) ) {
				$images = $insta_array['entry_data']['ProfilePage'][0]['graphql']['user']['edge_owner_to_timeline_media']['edges'];
			} elseif ( isset( $insta_array['entry_data']['TagPage'][0]['graphql']['hashtag']['edge_hashtag_to_media']['edges'] ) ) {
				$images = $insta_array['entry_data']['TagPage'][0]['graphql']['hashtag']['edge_hashtag_to_media']['edges'];
			} else {
				return new WP_Error( 'bad_json_2', esc_html__( 'Instagram has returned invalid data.', 'kona' ) );
			}

			if ( ! is_array( $images ) ) {
				return new WP_Error( 'bad_array', esc_html__( 'Instagram has returned invalid data.', 'kona' ) );
			}

			$instagram = array();

			foreach ( $images as $image ) {
				if ( true === $image['node']['is_video'] ) {
					$type = 'video';
				} else {
					$type = 'image';
				}

				$caption = __( 'Instagram Image', 'kona' );
				if ( ! empty( $image['node']['edge_media_to_caption']['edges'][0]['node']['text'] ) ) {
					$caption = wp_kses( $image['node']['edge_media_to_caption']['edges'][0]['node']['text'], array() );
				}

				$instagram[] = array(
					'description' => $caption,
					'link'        => trailingslashit( '//instagram.com/p/' . $image['node']['shortcode'] ),
					'time'        => $image['node']['taken_at_timestamp'],
					'comments'    => $image['node']['edge_media_to_comment']['count'],
					'likes'       => $image['node']['edge_liked_by']['count'],
					'thumbnail'   => preg_replace( '/^https?\:/i', '', $image['node']['thumbnail_resources'][0]['src'] ),
					'small'       => preg_replace( '/^https?\:/i', '', $image['node']['thumbnail_resources'][2]['src'] ),
					'large'       => preg_replace( '/^https?\:/i', '', $image['node']['thumbnail_resources'][4]['src'] ),
					'original'    => preg_replace( '/^https?\:/i', '', $image['node']['display_url'] ),
					'type'        => $type,
				);
			} // End foreach().

			// do not set an empty transient - should help catch private or empty accounts.
			if ( ! empty( $instagram ) ) {
				$instagram = base64_encode( serialize( $instagram ) );
				set_transient( 'insta-a10-' . $transient_prefix . '-' . sanitize_title_with_dashes( $username ), $instagram, apply_filters( 'kona_instagram_cache_time', HOUR_IN_SECONDS * 2 ) );
			}
		}

		if ( ! empty( $instagram ) ) {

			return unserialize( base64_decode( $instagram ) );

		} else {

			return new WP_Error( 'no_images', esc_html__( 'Instagram did not return any images.', 'kona' ) );

		}
	}

	function images_only( $media_item ) {

		if ( 'image' === $media_item['type'] ) {
			return true;
		}

		return false;
	}
}
