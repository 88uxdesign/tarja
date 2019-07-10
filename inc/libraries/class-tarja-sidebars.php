<?php
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Class tarja_Sidebars
 */
class tarja_Sidebars {
	/**
	 * @var array
	 */
	public $sidebars = array();

	/**
	 * MedZone_Sidebars constructor.
	 */
	public function __construct() {
		$this->collect_sidebars();
		add_action( 'widgets_init', array( $this, 'set_sidebars' ) );
		add_action( 'widgets_init', array( $this, 'initiate_widgets' ) );
	}

	/**
	 * registers sidebars
	 */
	public function set_sidebars() {
		foreach ( $this->sidebars as $sidebar ) {
			register_sidebar( $sidebar );
		}
	}

	/**
	 * Add sidebars here
	 */
	private function collect_sidebars() {
		$this->sidebars = array(
			array(
				'id'            => 'sidebar',
				'name'          => esc_html__( 'Blog Sidebar', 'tarja' ),
				'description'   => esc_html__( 'The default sidebar of the website.', 'tarja' ),
				'before_title'  => '<h5 class="widget-title"><span>',
				'after_title'   => '</span></h5>',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
			),

			array(
				'id'            => 'content-area-1',
				'name'          => esc_html__( 'Content Widget Area #1', 'tarja' ),
				'description'   => esc_html__( 'Part of the \'building blocks\' of the frontpage. It\'s a full width section', 'tarja' ),
				'before_title'  => '<h3 class="widget-title"><span>',
				'after_title'   => '</span></h3>',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
			),

			array(
				'id'            => 'content-area-2-a',
				'name'          => esc_html__( 'Content Widget Area #2 A', 'tarja' ),
				'description'   => esc_html__( 'Part of the \'building blocks\' of the frontpage. Sidebar served as a column in the content', 'tarja' ),
				'before_title'  => '<h3 class="widget-title"><span>',
				'after_title'   => '</span></h3>',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
			),

			array(
				'id'            => 'content-area-2-b',
				'name'          => esc_html__( 'Content Widget Area #2 B', 'tarja' ),
				'description'   => esc_html__( 'Part of the \'building blocks\' of the frontpage. Sidebar served as a column in the content', 'tarja' ),
				'before_title'  => '<h3 class="widget-title"><span>',
				'after_title'   => '</span></h3>',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
			),

			array(
				'id'            => 'content-area-2-c',
				'name'          => esc_html__( 'Content Widget Area #2 C', 'tarja' ),
				'description'   => esc_html__( 'Part of the \'building blocks\' of the frontpage. Sidebar served as a column in the content', 'tarja' ),
				'before_title'  => '<h3 class="widget-title"><span>',
				'after_title'   => '</span></h3>',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
			),

			array(
				'id'            => 'content-area-3',
				'name'          => esc_html__( 'Content Widget Area #3', 'tarja' ),
				'description'   => esc_html__( 'Part of the \'building blocks\' of the frontpage. It\'s a full width section', 'tarja' ),
				'before_title'  => '<h3 class="widget-title"><span>',
				'after_title'   => '</span></h3>',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
			),

			array(
				'id'            => 'content-area-4-a',
				'name'          => esc_html__( 'Content Widget Area #4 A', 'tarja' ),
				'description'   => esc_html__( 'Part of the \'building blocks\' of the frontpage. Sidebar served as a column in the content', 'tarja' ),
				'before_title'  => '<h3 class="widget-title"><span>',
				'after_title'   => '</span></h3>',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
			),

			array(
				'id'            => 'content-area-4-b',
				'name'          => esc_html__( 'Content Widget Area #4 B', 'tarja' ),
				'description'   => esc_html__( 'Part of the \'building blocks\' of the frontpage. Sidebar served as a column in the content', 'tarja' ),
				'before_title'  => '<h3 class="widget-title"><span>',
				'after_title'   => '</span></h3>',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
			),

			array(
				'id'            => 'content-area-5',
				'name'          => esc_html__( 'Content Widget Area #5', 'tarja' ),
				'description'   => esc_html__( 'Part of the \'building blocks\' of the frontpage. It\'s a full width section', 'tarja' ),
				'before_title'  => '<h3 class="widget-title"><span>',
				'after_title'   => '</span></h3>',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
			),

			array(
				'id'            => 'shop-sidebar',
				'name'          => esc_html__( 'Shop Sidebar', 'tarja' ),
				'description'   => esc_html__( 'The sidebar is displayed on WooComerce pages.', 'tarja' ),
				'before_title'  => '<h5 class="widget-title"><span>',
				'after_title'   => '</span></h5>',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
			),

			array(
				'id'            => 'footer-sidebar-1',
				'name'          => esc_html__( 'Footer Sidebar #1', 'tarja' ),
				'before_title'  => '<h5 class="widget-title"><span>',
				'after_title'   => '</span></h5>',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
			),

			array(
				'id'            => 'footer-sidebar-2',
				'name'          => esc_html__( 'Footer Sidebar #2', 'tarja' ),
				'before_title'  => '<h5 class="widget-title"><span>',
				'after_title'   => '</span></h5>',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
			),

			array(
				'id'            => 'footer-sidebar-3',
				'name'          => esc_html__( 'Footer Sidebar #3', 'tarja' ),
				'before_title'  => '<h5 class="widget-title"><span>',
				'after_title'   => '</span></h5>',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
			),
			array(
				'id'            => 'footer-sidebar-4',
				'name'          => esc_html__( 'Footer Sidebar #4', 'tarja' ),
				'before_title'  => '<h5 class="widget-title"><span>',
				'after_title'   => '</span></h5>',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
			),
		);
	}

	/**
	 * Initiate widgets
	 */
	public function initiate_widgets() {
		$widgets = array(
			'Widget_tarja_Recent_Posts',
		);

		if ( class_exists( 'WooCommerce' ) ) {
			$widgets[] = 'Widget_tarja_Products';
		}

		foreach ( $widgets as $widget ) {
			new $widget();
			register_widget( $widget );
		}
	}
}
