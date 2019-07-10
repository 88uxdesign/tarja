<?php
/**
 * tarja Theme Customizer.
 *
 * @package tarja
 */

if ( ! class_exists( 'Kirki' ) ) {
	global $wp_customize;

	$wp_customize->add_setting(
		'kirki_installer_setting',
		array(
			'sanitize_callback' => '__return_true',
		)
	);
	$wp_customize->add_control( 'kirki_installer_control', array(
		'section'  => 'kirki_installer',
		'settings' => 'kirki_installer_setting',
	) );
}

/**
 *  Section information
 */
tarja_Kirki::add_field( 'tarja_theme', array(
	'settings' => 'tarja_frontpage_settings',
	'label'    => esc_html__( 'Front Page Settings', 'tarja' ),
	'section'  => 'frontpage_settings',
	'type'     => 'custom',
	'default'  => '<div style="padding: 30px;">' . esc_html__( 'You can enter custom markup in this control and use it however you want', 'tarja' ) . '</div>',
	'priority' => 11,
) );

tarja_Kirki::add_field( 'tarja_theme', array(
	'settings' => 'tarja_color_scheme',
	'label'    => esc_html__( 'Color Scheme', 'tarja' ),
	'section'  => 'colors',
	'type'     => 'palette',
	'default'  => 'red',
	'choices'  => array(
		'red'       => array(
			'#f66249',
			'#25262b',
			'#717171',
		),
		'beige'     => array(
			'#eaab76',
			'#25262b',
			'#717171',
		),
		'black'     => array(
			'#252525',
			'#25262b',
			'#717171',
		),
		'green'     => array(
			'#99ca45',
			'#25262b',
			'#717171',
		),
		'blue'      => array(
			'#263585',
			'#25262b',
			'#717171',
		),
		'lightblue' => array(
			'#2279d3',
			'#25262b',
			'#717171',
		),
		'orange'    => array(
			'#ffab1a',
			'#25262b',
			'#717171',
		),
	),
) );

/**
 * Theme Options Panel
 */
tarja_Kirki::add_field( 'tarja_theme', array(
	'type'     => 'toggle',
	'settings' => 'tarja_enable_top_bar',
	'label'    => esc_html__( 'Enable Header Top Bar', 'tarja' ),
	'section'  => 'theme_options_general',
	'default'  => true,
	'priority' => 10,
) );

tarja_Kirki::add_field( 'tarja_theme', array(
	'type'     => 'toggle',
	'settings' => 'tarja_enable_post_breadcrumbs',
	'label'    => esc_html__( 'Enable Breadcrumbs', 'tarja' ),
	'section'  => 'theme_options_general',
	'default'  => true,
	'priority' => 12,
) );

tarja_Kirki::add_field( 'tarja_theme', array(
	'type'     => 'radio-buttonset',
	'settings' => 'tarja_shop_layout',
	'label'    => esc_html__( 'Shop Layout', 'tarja' ),
	'section'  => 'theme_options_general',
	'default'  => 'fullwidth',
	'priority' => 13,
	'choices'  => array(
		'left'      => esc_attr__( 'Left Sidebar', 'tarja' ),
		'fullwidth' => esc_attr__( 'Full Width', 'tarja' ),
		'right'     => esc_attr__( 'Right Sidebar', 'tarja' ),
	),
) );


tarja_Kirki::add_field( 'tarja_theme', array(
	'type'     => 'text',
	'settings' => 'tarja_contact_phone',
	'label'    => esc_html__( 'Contact Phone', 'tarja' ),
	'section'  => 'theme_options_contact_page',
	'default'  => '',
	'priority' => 10,
) );

tarja_Kirki::add_field( 'tarja_theme', array(
	'type'     => 'text',
	'settings' => 'tarja_contact_address',
	'label'    => esc_html__( 'Contact Address', 'tarja' ),
	'section'  => 'theme_options_contact_page',
	'default'  => '',
	'priority' => 11,
) );

tarja_Kirki::add_field( 'tarja_theme', array(
	'type'              => 'text',
	'settings'          => 'tarja_contact_page_shortcode_form',
	'label'             => esc_html__( 'Contact Form Shortcode', 'tarja' ),
	'section'           => 'theme_options_contact_page',
	'default'           => '',
	'priority'          => 12,
	'sanitize_callback' => array( 'tarja_Kirki', 'unfiltered' ),
) );

tarja_Kirki::add_field( 'tarja_theme', array(
	'type'              => 'text',
	'settings'          => 'tarja_contact_page_shortcode_map',
	'label'             => esc_html__( 'Google Map Shortcode', 'tarja' ),
	'section'           => 'theme_options_contact_page',
	'default'           => '',
	'priority'          => 13,
	'sanitize_callback' => array( 'tarja_Kirki', 'unfiltered' ),
) );

tarja_Kirki::add_field( 'tarja_theme', array(
	'type'     => 'toggle',
	'settings' => 'tarja_show_banner',
	'label'    => esc_html__( 'Enable Banner in Header', 'tarja' ),
	'section'  => 'theme_options_general',
	'default'  => true,
	'priority' => 13,
) );

tarja_Kirki::add_field( 'tarja_theme', array(
	'type'     => 'radio',
	'settings' => 'tarja_banner_type',
	'label'    => esc_html__( 'Banner Type', 'tarja' ),
	'section'  => 'theme_options_general',
	'default'  => 'image',
	'priority' => 14,
	'choices'  => array(
		'image'   => esc_attr__( 'Image', 'tarja' ),
		'adsense' => esc_attr__( 'AdSense', 'tarja' ),
	),
) );

tarja_Kirki::add_field( 'tarja_theme', array(
	'type'     => 'image',
	'settings' => 'tarja_banner_image',
	'label'    => esc_html__( 'Banner Image', 'tarja' ),
	'section'  => 'theme_options_general',
	'default'  => get_template_directory_uri() . '/assets/images/banner.jpg',
	'priority' => 15,
	'required' => array(
		array(
			'setting'  => 'tarja_banner_type',
			'value'    => 'image',
			'operator' => '==',
		),
	),
) );

tarja_Kirki::add_field( 'tarja_theme', array(
	'type'              => 'text',
	'settings'          => 'tarja_banner_link',
	'label'             => esc_html__( 'Banner URL', 'tarja' ),
	'section'           => 'theme_options_general',
	'default'           => 'https://colorlib.com',
	'priority'          => 16,
	'sanitize_callback' => 'esc_url_raw',
	'required'          => array(
		array(
			'setting'  => 'tarja_banner_type',
			'value'    => 'image',
			'operator' => '==',
		),
	),
) );

tarja_Kirki::add_field( 'tarja_theme', array(
	'type'        => 'code',
	'settings'    => 'tarja_banner_adsense_code',
	'label'       => esc_html__( 'AdSense Code', 'tarja' ),
	'description' => esc_html__( 'Add the code you retrieved from your AdSense account. Insert only the <ins> tag.', 'tarja' ),
	'section'     => 'theme_options_general',
	'default'     => '',
	'priority'    => 17,
	'choices'     => array(
		'language' => 'javascript',
		'theme'    => 'monokai',
		'height'   => 250,
	),
	'required'    => array(
		array(
			'setting'  => 'tarja_banner_type',
			'value'    => 'adsense',
			'operator' => '==',
		),
	),
) );

tarja_Kirki::add_field( 'tarja_theme', array(
	'type'     => 'radio-buttonset',
	'settings' => 'tarja_footer_layout',
	'label'    => esc_html__( 'Layout', 'tarja' ),
	'section'  => 'theme_options_footer',
	'default'  => '4',
	'priority' => 10,
	'choices'  => array(
		'1' => esc_attr__( '1 Column', 'tarja' ),
		'2' => esc_attr__( '2 Column', 'tarja' ),
		'3' => esc_attr__( '3 Column', 'tarja' ),
		'4' => esc_attr__( '4 Column', 'tarja' ),
	),
) );


tarja_Kirki::add_field( 'tarja_theme', array(
	'type'     => 'toggle',
	'settings' => 'tarja_enable_copyright',
	'label'    => esc_html__( 'Enable Copyright', 'tarja' ),
	'section'  => 'theme_options_footer',
	'default'  => true,
	'priority' => 11,
) );

tarja_Kirki::add_field( 'tarja_theme', array(
	'type'     => 'text',
	'settings' => 'tarja_copyright_contents',
	'label'    => esc_html__( 'Copyright Contents', 'tarja' ),
	'section'  => 'theme_options_footer',
	'default'  => 'Copyright &copy; ' . date( 'Y' ) . ' | Powered by WordPress.',
	'priority' => 12,
) );

/**
 * Frontpage settings
 */
tarja_Kirki::add_field( 'tarja_theme', array(
	'type'     => 'toggle',
	'settings' => 'tarja_enable_main_slider',
	'label'    => esc_html__( 'Enable Front Page Slider', 'tarja' ),
	'section'  => 'frontpage_sections_general',
	'default'  => true,
	'priority' => 10,
) );

tarja_Kirki::add_field( 'tarja_theme', array(
	'settings' => 'tarja_frontpage_sections',
	'label'    => esc_html__( 'Enable / Disable sections', 'tarja' ),
	'section'  => 'frontpage_sections_general',
	'type'     => 'sortable',
	'default'  => array(
		'content-area-1',
		'content-area-2',
		'content-area-3',
		'content-area-4',
		'content-area-5',
	),
	'priority' => 11,
	'choices'  => array(
		'content-area-1' => esc_attr__( 'Content Widget Area #1', 'tarja' ),
		'content-area-2' => esc_attr__( 'Content Widget Area #2', 'tarja' ),
		'content-area-3' => esc_attr__( 'Content Widget Area #3', 'tarja' ),
		'content-area-4' => esc_attr__( 'Content Widget Area #4', 'tarja' ),
		'content-area-5' => esc_attr__( 'Content Widget Area #5', 'tarja' ),
	),
) );

tarja_Kirki::add_field( 'tarja_theme', array(
	'settings' => 'tarja_slider_layout',
	'type'     => 'radio-buttonset',
	'label'    => esc_html__( 'Layout', 'tarja' ),
	'section'  => 'frontpage_sections_bigtitle_images',
	'default'  => 'left',
	'priority' => 10,
	'choices'  => array(
		'left'   => esc_attr__( 'Align Left', 'tarja' ),
		'center' => esc_attr__( 'Align Center', 'tarja' ),
		'right'  => esc_attr__( 'Align Right', 'tarja' ),
	),
) );

tarja_Kirki::add_field( 'tarja_theme', array(
	'type'      => 'repeater',
	'label'     => esc_attr__( 'Slider Backgrounds', 'tarja' ),
	'section'   => 'frontpage_sections_bigtitle_images',
	'priority'  => 10,
	'row_label' => array(
		'type'  => 'text',
		'value' => esc_attr__( 'Background Image', 'tarja' ),
	),
	'default'   => array(
		'image_bg'        => get_template_directory_uri() . '/assets/images/hero.jpg',
		'cta_text'        => '2016',
		'cta_subtext'     => 'Autumn Collection',
		'button_one_text' => 'Shop Now',
		'button_two_text' => 'Learn More',
		'button_one_url'  => 'https://88ux.pro',
		'button_two_url'  => 'https://colorlib.com',
	),
	'settings'  => 'tarja_slider_bg',
	'fields'    => array(
		'image_bg'        => array(
			'type'    => 'image',
			'label'   => esc_attr__( 'Image', 'tarja' ),
			'default' => '',
		),
		'cta_text'        => array(
			'type'    => 'text',
			'label'   => esc_html__( 'CTA Text', 'tarja' ),
			'default' => '2016',
		),
		'cta_subtext'     => array(
			'type'    => 'text',
			'label'   => esc_html__( 'CTA Subtext', 'tarja' ),
			'default' => 'Autumn Collection',
		),
		'button_one_text' => array(
			'type'    => 'text',
			'label'   => esc_html__( 'Button #1 Text', 'tarja' ),
			'default' => 'Shop Now',
		),
		'button_one_url'  => array(
			'type'    => 'text',
			'label'   => esc_html__( 'Button #1 URL', 'tarja' ),
			'default' => 'https://colorlib.com',
		),
		'button_two_text' => array(
			'type'    => 'text',
			'label'   => esc_html__( 'Button #2 Text', 'tarja' ),
			'default' => 'Learn More',
		),
		'button_two_url'  => array(
			'type'    => 'text',
			'label'   => esc_html__( 'Button #2 URL', 'tarja' ),
			'default' => 'https://colorlib.com',
		),
	),
) );

tarja_Kirki::add_field( 'tarja_theme', array(
	'type'     => 'text',
	'settings' => 'info_section_one_text',
	'section'  => 'frontpage_sections_bigtitle_info',
	'default'  => 'FREE SHIPPING',
	'label'    => esc_html__( 'Info Section #1 Text', 'tarja' ),
	'priority' => 10,
) );

tarja_Kirki::add_field( 'tarja_theme', array(
	'type'     => 'text',
	'settings' => 'info_section_one_subtext',
	'default'  => 'On all orders over 90$',
	'section'  => 'frontpage_sections_bigtitle_info',
	'label'    => esc_html__( 'Info Section #1 Subtext', 'tarja' ),
	'priority' => 11,
) );

tarja_Kirki::add_field( 'tarja_theme', array(
	'type'     => 'dashicons',
	'settings' => 'info_section_one_icon',
	'section'  => 'frontpage_sections_bigtitle_info',
	'label'    => esc_html__( 'Info Section #1 Icon', 'tarja' ),
	'priority' => 12,
) );

tarja_Kirki::add_field( 'tarja_theme', array(
	'type'     => 'text',
	'settings' => 'info_section_two_text',
	'default'  => 'CALL US ANYTIME',
	'section'  => 'frontpage_sections_bigtitle_info',
	'label'    => esc_html__( 'Info Section #2 Text', 'tarja' ),
	'priority' => 13,
) );

tarja_Kirki::add_field( 'tarja_theme', array(
	'type'     => 'text',
	'settings' => 'info_section_two_subtext',
	'default'  => '+04786445953',
	'section'  => 'frontpage_sections_bigtitle_info',
	'label'    => esc_html__( 'Info Section #2 Subtext', 'tarja' ),
	'priority' => 14,
) );

tarja_Kirki::add_field( 'tarja_theme', array(
	'type'     => 'dashicons',
	'settings' => 'info_section_two_icon',
	'section'  => 'frontpage_sections_bigtitle_info',
	'label'    => esc_html__( 'Info Section #2 Icon', 'tarja' ),
	'priority' => 15,
) );

tarja_Kirki::add_field( 'tarja_theme', array(
	'type'     => 'text',
	'settings' => 'info_section_three_text',
	'default'  => 'OUR LOCATION',
	'section'  => 'frontpage_sections_bigtitle_info',
	'label'    => esc_html__( 'Info Section #1 Text', 'tarja' ),
	'priority' => 16,
) );

tarja_Kirki::add_field( 'tarja_theme', array(
	'type'     => 'text',
	'settings' => 'info_section_three_subtext',
	'section'  => 'frontpage_sections_bigtitle_info',
	'default'  => '557-6308 Lacinia Road. NYC',
	'label'    => esc_html__( 'Info Section #3 Subtext', 'tarja' ),
	'priority' => 17,
) );

tarja_Kirki::add_field( 'tarja_theme', array(
	'type'     => 'dashicons',
	'settings' => 'info_section_three_icon',
	'section'  => 'frontpage_sections_bigtitle_info',
	'label'    => esc_html__( 'Info Section #3 Icon', 'tarja' ),
	'priority' => 18,
) );
