<?php
namespace printplanCompanion\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;
use Elementor\Repeater;
use Elementor\Icons_Manager;
use \Elementor\Group_Control_Typography;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class projectWidgets extends Widget_Base {

	public function get_name() {
		return 'project-widget';
	}

	public function get_title() {
		return __( 'Project Section', 'dvprintplan' );
	}

	public function get_icon() {
		return 'eicon-gallery-justified';
	}

	public function get_categories() {
		return [ 'desvert' ];
	}

	public function get_script_depends() {
		return [ 'dvprintplan' ];
	}

	protected function register_controls() {

		//About Section Tab Content
        $this->start_controls_section(
			'project_content', [
				'label' => esc_html__( 'Project Content', 'dvprintplan' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'project_title', [
				'label' => __( 'Project Title', 'dvprintplan' ),
				'type' => Controls_Manager::TEXT,
                'default' => esc_html__( 'Past Projects.', 'dvprintplan' ),
				'placeholder' => esc_html__( 'Title here', 'dvprintplan' ),
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ],
			]
		);
		$this->end_controls_section();

	}
	protected function render() {
	    $settings = $this->get_settings_for_display();
	    $project_title = $settings['project_title'];
    ?>
    <section id="project-section" class="pb-100 pt-100 bg-medium">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="project-wrapper text-center">
                        <h3 class="section-title text-center pb-30"><?php echo esc_html($project_title); ?></h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="grid-item">
                        <img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/assets/images/project/1.png" />
                        <div class="project-linker d-flex align-items-center justify-content-center">
                            <a href="#" class="btn common-btn common-btn-color"><i class="fas fa-link"></i></a>
                        </div>
                    </div>
                </div>
                <a href="#" class="btn common-btn mt-60">See all projects</a>
            </div>
        </div>
    </section>
    <?php }
/*
protected function content_template() { ?>
<?php }*/

}
?>