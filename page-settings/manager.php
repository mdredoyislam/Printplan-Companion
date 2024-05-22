<?php
namespace printplanCompanion\PageSettings;

use Elementor\Controls_Manager;
use Elementor\Core\DocumentTypes\PageBase;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Page_Settings {

	const PANEL_TAB = 'new-tab';

	public function __construct() {
		add_action( 'elementor/init', [ $this, 'add_panel_tab' ] );
		add_action( 'elementor/documents/register_controls', [ $this, 'register_document_controls' ] );
	}

	/**
	 * Register a panel tab slug, in order to allow adding controls to this tab.
	 */
	public function add_panel_tab() {
		Controls_Manager::add_tab( self::PANEL_TAB, __( 'New Tab', 'elementor-hello-world' ) );
	}

	/**
	 * Resister additional document controls.
	 *
	 * @param PageBase $document
	 */
	public function register_document_controls( $document ) {
		if ( ! $document instanceof PageBase || ! $document::get_property( 'has_elements' ) ) {
			return;
		}
	}
}
