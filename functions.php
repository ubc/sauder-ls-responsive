<?php
function responsive_sauder_customize_register( $wp_customize ) {
	$wp_customize->add_setting( 'banner_image', array(
		'default' => '',
	) );

	$wp_customize->add_section( 'sauder_section' , array(
		'title'      => __( 'Sauder Options', 'responsive-sauder' ),
		'priority'   => 30,
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'link_color', array(
		'label'    => __( 'Banner', 'responsive-sauder' ),
		'section'  => 'sauder_section',
		'settings' => 'banner_image',
		'type'     => 'select',
		'choices'  => array(
			// Modify this array to add new banner options
			''     => "None",
			'bcom' => "BComm",
			'mba'  => "MBA",
		),
	) ) );
}

function responsive_sauder_get_banner_image( $type ) {
	// Modify this array to map banner options to image files.
	$banner_images = array(
		'bcom' => 'bcom_banner.jpg',
		'mba'  => 'mba_banner.jpeg',
	);

	return array_key_exists( $type, $banner_images ) ? $banner_images[$type] : '';
}


add_action( 'customize_register', 'responsive_sauder_customize_register' );