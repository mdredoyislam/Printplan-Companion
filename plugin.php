<?php

namespace printplanCompanion;

use printplanCompanion\PageSettings\Page_Settings;
class Plugin {

	private static $_instance = null;
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	public function pricing_editor_assets() {
		add_filter( 'script_loader_tag', [ $this, 'editor_scripts_as_a_module' ], 10, 2 );
		
	}

	public function editor_scripts_as_a_module( $tag, $handle ) {
		if ( 'elementor-hello-world-editor' === $handle ) {
			$tag = str_replace( '<script', '<script type="module"', $tag );
		}

		return $tag;
	}

	public function register_widgets( $widgets_manager ) {
		// Its is now safe to include Widgets files
		require_once( __DIR__ . '/widgets/hero-widget.php' );
		require_once( __DIR__ . '/widgets/about-widget.php' );
		require_once( __DIR__ . '/widgets/project-widget.php' );
		require_once( __DIR__ . '/widgets/testimonial-widget.php' );
		require_once( __DIR__ . '/widgets/blog-widget.php' );
		require_once( __DIR__ . '/widgets/contact-widget.php' );

		// Register Widgets
		$widgets_manager->register( new Widgets\HeroWidgets() );
		$widgets_manager->register( new Widgets\AboutWidgets() );
		$widgets_manager->register( new Widgets\projectWidgets() );
		$widgets_manager->register( new Widgets\testimonialWidgets() );
		$widgets_manager->register( new Widgets\blogWidgets() );
		$widgets_manager->register( new Widgets\contactWidgets() );
	}

	public function elementor_category () {
		\Elementor\Plugin::$instance->elements_manager->add_category( 
			'desvert',
			[
				'title' => __( 'DesVert Addons', 'dvprintplan' ),
				'icon' => 'fa fa-table', //default icon
			]
		);
	
	}

	private function add_page_settings_controls() {
		require_once( __DIR__ . '/page-settings/manager.php' );
		new Page_Settings();
	}

	public function __construct() {

		// Register widgets
		add_action( 'elementor/widgets/register', [ $this, 'register_widgets' ] );
		// Register editor scripts
		add_action( 'elementor/editor/after_enqueue_scripts', [ $this, 'pricing_editor_assets' ] );

		add_action( 'elementor/elements/categories_registered', [ $this, 'elementor_category' ] );
		
		$this->add_page_settings_controls();
	}
	
}

// Instantiate Plugin Class
Plugin::instance();
