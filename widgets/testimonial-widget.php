<?php
namespace printplanCompanion\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;
use Elementor\Repeater;
use Elementor\Icons_Manager;
use \Elementor\Group_Control_Typography;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class testimonialWidgets extends Widget_Base {

	public function get_name() {
		return 'testimonial-widget';
	}

	public function get_title() {
		return __( 'Testimonial Section', 'dvprintplan' );
	}

	public function get_icon() {
		return 'eicon-site-identity';
	}

	public function get_categories() {
		return [ 'desvert' ];
	}

	public function get_script_depends() {
		return [ 'dvprintplan' ];
	}

	protected function register_controls() {

		//Testimonial Section Tab Content
        $this->start_controls_section(
			'testimonial_content', [
				'label' => esc_html__( 'Testimonial Content', 'dvprintplan' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'testimonial_title', [
				'label' => __( 'Testimonial Title', 'dvprintplan' ),
				'type' => Controls_Manager::TEXT,
                'default' => esc_html__( 'What People Talk \n About me.', 'dvprintplan' ),
				'placeholder' => esc_html__( 'Title here', 'dvprintplan' ),
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ],
			]
		);
        $testrepeater = new Repeater();
        $testrepeater->add_control(
			'review_icon',
			[
				'label' => esc_html__( 'Review Icon', 'dvprintplan' ),
				'type' => Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-user',
					'library' => 'fa-solid',
				],
				'recommended' => [
					'fa-solid' => [
						'circle',
						'dot-circle',
						'square-full',
					],
					'fa-regular' => [
						'circle',
						'dot-circle',
						'square-full',
					],
				],
			]
		);
        $testrepeater->add_control(
			'review_title',
			[
				'label' => esc_html__( 'Review Title', 'dvprintplan' ),
				'type' => Controls_Manager::TEXT,
				'default' => 'Their support is so cool',
                'label_block' => true,
				'dynamic' => [
					'active' => true,
				],
			]
		);
        $testrepeater->add_control(
			'review_text',
			[
				'label' => esc_html__( 'Review Text', 'dvprintplan' ),
				'type' => Controls_Manager::TEXTAREA,
				'placeholder' => 'Message Here',
                'label_block' => true,
				'dynamic' => [
					'active' => true,
				],
			]
		);
        $testrepeater->add_control(
			'client_name',
			[
				'label' => esc_html__( 'Client Name', 'dvprintplan' ),
				'type' => Controls_Manager::TEXT,
				'default' => 'Shanelle Blake',
                'label_block' => true,
				'dynamic' => [
					'active' => true,
				],
			]
		);
        $testrepeater->add_control(
			'user_profile',
			[
				'label' => esc_html__( 'User Profile', 'dvprintplan' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);
        $this->add_control(
			'review_lists',
			[
				'label' => esc_html__( 'Clients Review', 'dvprintplan' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $testrepeater->get_controls(),
				'default' => [
					[
						'client_name' => esc_html__( 'Client Name #1', 'dvprintplan' ),
					],
					[
						'client_name' => esc_html__( 'Client Name #2', 'dvprintplan' ),
					],
				],
				'title_field' => '{{{ client_name }}}',
			]
		);
        $this->end_controls_section();

        //Expreance Section Tab Content
        $this->start_controls_section(
			'expreance_content', [
				'label' => esc_html__( 'Expreance Content', 'dvprintplan' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
        $expRepeater = new Repeater();
        $expRepeater->add_control(
			'exp_number',
			[
				'label' => esc_html__( 'Exp Number', 'dvprintplan' ),
				'type' => Controls_Manager::NUMBER,
				'default' => '10',
                'label_block' => true,
				'dynamic' => [
					'active' => true,
				],
			]
		);
        $expRepeater->add_control(
			'exp_title',
			[
				'label' => esc_html__( 'Exp Title', 'dvprintplan' ),
				'type' => Controls_Manager::TEXTAREA,
				'placeholder' => 'Your Experience Here',
                'label_block' => true,
				'dynamic' => [
					'active' => true,
				],
			]
		);
        $this->add_control(
			'review_lists',
			[
				'label' => esc_html__( 'Clients Review', 'dvprintplan' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $expRepeater->get_controls(),
				'default' => [
					[
						'client_name' => esc_html__( 'Client Name #1', 'dvprintplan' ),
					],
					[
						'client_name' => esc_html__( 'Client Name #2', 'dvprintplan' ),
					],
				],
				'title_field' => '{{{ client_name }}}',
			]
		);
        $this->end_controls_section();

    
	}
	protected function render() {
	    $settings = $this->get_settings_for_display();
	    $testimonial_title = $settings['testimonial_title'];
	    $review_lists = $settings['review_lists'];
    ?>
<section id="testimonial-section" class="pb-100 pt-100">
    <div class="container">
        <div class="testimonial-wrap">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="section-title text-center mb-50"><?php echo __($testimonial_title); ?></h3>
                    <div class="testimonial-slide owl-carousel owl-theme owl-loaded">
                        <div class="owl-stage-outer">
                            <div class="owl-stage">
                                <?php foreach($review_lists as $review_list): ?>
                                    <div class="owl-item text-center">
                                        <div class="owl-item-wrap text-center">
                                            <div class="quote-icon mb-35">
                                                <?php Icons_Manager::render_icon(  $review_list['review_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                            </div>
                                            <h4 class="box-title3 mb-15"><?php echo esc_html__($review_list['review_title']); ?></h4>
                                            <p><?php echo esc_html__($review_list['review_text']); ?></p>
                                            <h4 class="box-title3 client-name mt-25"><?php echo esc_html__($review_list['client_name']); ?></h4>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="owl-dots mt-50">
                            <?php foreach($review_lists as $review_list): ?>
                                <button role="button" class="owl-dot">
                                    <img class="review-img" src="<?php echo esc_url($review_list['user_profile']['url']); ?>" alt="slide">
                                </button>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="counter-wrap mt-60 pt-70">
            <div class="row">
                <div class="col-lg-12">
                    <div class="counter-boxes d-flex justify-content-between">
                        <div class="counter-item d-inline-block">
                            <h4 class="counter box-title mb-10">12</h4>
                            <h5>Years of experience</h5>
                        </div>
                        <div class="counter-item d-inline-block">
                            <h4 class="counter box-title mb-10">10</h4>
                            <h5>Completed projects</h5>
                        </div>
                        <div class="counter-item d-inline-block">
                            <h4 class="counter box-title mb-10">250</h4>
                            <h5>Client's worked with</h5>
                        </div>
                        <div class="counter-item d-inline-block">
                            <h4 class="counter box-title mb-10">100</h4>
                            <h5>Positive feedback</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php }/*
protected function content_template() { ?>
<?php }*/
}
?>