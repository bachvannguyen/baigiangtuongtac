<?php
/*
Widget Name: Image
Description: A very simple image widget.
Author: SiteOrigin
Author URI: https://siteorigin.com
*/

class SiteOrigin_Widget_Image_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'sow-image',
			__('SiteOrigin Image', 'so-widgets-bundle'),
			array(
				'description' => __('A simple image widget with massive power.', 'so-widgets-bundle'),
				'help' => 'https://siteorigin.com/widgets-bundle/image-widget-documentation/'
			),
			array(

			),
			false,
			plugin_dir_path(__FILE__)
		);
	}

	function get_widget_form() {

		return array(
			'image' => array(
				'type' => 'media',
				'label' => __('Image file', 'so-widgets-bundle'),
				'library' => 'image',
				'fallback' => true,
			),

			'size' => array(
				'type' => 'image-size',
				'label' => __('Image size', 'so-widgets-bundle'),
			),

			'align' => array(
				'type' => 'select',
				'label' => __('Image alignment', 'so-widgets-bundle'),
				'default' => 'default',
				'options' => array(
					'default' => __('Default', 'so-widgets-bundle'),
					'left' => __('Left', 'so-widgets-bundle'),
					'right' => __('Right', 'so-widgets-bundle'),
					'center' => __('Center', 'so-widgets-bundle'),
				),
			),

			'title' => array(
				'type' => 'text',
				'label' => __('Title text', 'so-widgets-bundle'),
			),

			'title_position' => array(
				'type' => 'select',
				'label' => __('Title position', 'so-widgets-bundle'),
				'default' => 'hidden',
				'options' => array(
					'hidden' => __( 'Hidden', 'so-widgets-bundle' ),
					'above' => __( 'Above', 'so-widgets-bundle' ),
					'below' => __( 'Below', 'so-widgets-bundle' ),
				),
			),

			'alt' => array(
				'type' => 'text',
				'label' => __('Alt text', 'so-widgets-bundle'),
			),

			'url' => array(
				'type' => 'link',
				'label' => __('Destination URL', 'so-widgets-bundle'),
			),
			'new_window' => array(
				'type' => 'checkbox',
				'default' => false,
				'label' => __('Open in new window', 'so-widgets-bundle'),
			),

			'bound' => array(
				'type' => 'checkbox',
				'default' => true,
				'label' => __('Bound', 'so-widgets-bundle'),
				'description' => __("Make sure the image doesn't extend beyond its container.", 'so-widgets-bundle'),
			),
			'full_width' => array(
				'type' => 'checkbox',
				'default' => false,
				'label' => __('Full Width', 'so-widgets-bundle'),
				'description' => __("Resize image to fit its container.", 'so-widgets-bundle'),
			),

		);
	}

	function get_style_hash($instance) {
		return substr( md5( serialize( $this->get_less_variables( $instance ) ) ), 0, 12 );
	}

	public function get_template_variables( $instance, $args ) {
		// Workout the image title
		if ( ! empty( $instance['title'] ) ) {
			$title = $instance['title'];
		} else {
			// We do not want to use the default image titles as they're based on the file name without the extension
			$file_name = pathinfo( get_post_meta( $instance['image'], '_wp_attached_file', true ), PATHINFO_FILENAME );
			$title = get_the_title( $instance['image'] );
			if ( $title == $file_name ) {
				$title = '';
			}
		}
		return array(
			'title' => $title,
			'title_position' => $instance['title_position'],
			'image' => $instance['image'],
			'size' => $instance['size'],
			'image_fallback' => ! empty( $instance['image_fallback'] ) ? $instance['image_fallback'] : false,
			'alt' => !empty( $instance['alt'] ) ? $instance['alt'] : get_post_meta( $instance['image'], '_wp_attachment_image_alt', true ),
			'url' => $instance['url'],
			'new_window' => $instance['new_window'],
		);
	}


	function get_less_variables($instance){
		return array(
			'image_alignment' => $instance['align'],
			'image_display' => $instance['align'] == 'default' ? 'block' : 'inline-block',
			'image_max_width' => ! empty( $instance['bound'] ) ? '100%' : '',
			'image_height' => ! empty( $instance['bound'] ) ? 'auto' : '',
			'image_width' => ! empty( $instance['full_width'] ) ? '100%' : '',
		);
	}
}

siteorigin_widget_register('sow-image', __FILE__, 'SiteOrigin_Widget_Image_Widget');
