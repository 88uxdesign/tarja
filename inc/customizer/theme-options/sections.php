<?php
/**
 * tarja Theme Customizer.
 *
 * @package tarja
 */

if ( ! class_exists( 'Kirki' ) ) {
	global $wp_customize;
	$wp_customize->add_section( new Kirki_Installer_Section( $wp_customize, 'kirki_installer', array(
		'title'      => '',
		'capability' => 'install_plugins',
		'priority'   => 0,
	) ) );
}

tarja_Kirki::add_section( 'theme_options_general', array(
	'title'      => esc_html__( 'General', 'tarja' ),
	'panel'      => 'theme_options',
	'priority'   => 0,
	'capability' => 'edit_theme_options',
) );

tarja_Kirki::add_section( 'theme_options_footer', array(
	'title'      => esc_html__( 'Footer', 'tarja' ),
	'panel'      => 'theme_options',
	'priority'   => 12,
	'capability' => 'edit_theme_options',
) );

tarja_Kirki::add_section( 'theme_options_contact_page', array(
	'title'      => esc_html__( 'Contact Page', 'tarja' ),
	'panel'      => 'theme_options',
	'priority'   => 13,
	'capability' => 'edit_theme_options',
) );

tarja_Kirki::add_section( 'frontpage_sections_general', array(
	'title'      => esc_html__( 'Frontpage Section Ordering and Visibility', 'tarja' ),
	'panel'      => 'frontpage_sections',
	'capability' => 'edit_theme_options',
) );

tarja_Kirki::add_section( 'frontpage_sections_bigtitle_images', array(
	'title'      => esc_html__( 'Slider Section Images', 'tarja' ),
	'panel'      => 'frontpage_sections',
	'capability' => 'edit_theme_options',
) );

tarja_Kirki::add_section( 'frontpage_sections_bigtitle_info', array(
	'title'      => esc_html__( 'Slider Section Info', 'tarja' ),
	'panel'      => 'frontpage_sections',
	'capability' => 'edit_theme_options',
) );

global $tarja_required_actions, $tarja_recommended_plugins;
$wp_customize->add_section(
	new Epsilon_Section_Recommended_Actions(
		$wp_customize,
		'epsilon_recommended_section',
		array(
			'title'                        => esc_html__( 'Recomended Actions', 'tarja' ),
			'social_text'                  => esc_html__( 'We are social :', 'tarja' ),
			'plugin_text'                  => esc_html__( 'Recomended Plugins :', 'tarja' ),
			'actions'                      => $tarja_required_actions,
			'plugins'                      => $tarja_recommended_plugins,
			'theme_specific_option'        => 'tarja_show_required_actions',
			'theme_specific_plugin_option' => 'tarja_show_required_plugins',
			'facebook'                     => 'https://www.facebook.com/colorlib',
			'twitter'                      => 'https://twitter.com/colorlib',
			'wp_review'                    => true,
			'theme_slug'                   => 'tarja',
			'priority'                     => 0,
		)
	)
);
