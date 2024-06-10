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
			'counter_before_text',
			[
				'label' => esc_html__( 'Counter Before Text', 'dvprintplan' ),
				'type' => Controls_Manager::TEXT,
				'default' => '',
				'label_block' => false,
				'dynamic' => [
					'active' => true,
				],
			]
		);
        $expRepeater->add_control(
			'exp_number',
			[
				'label' => esc_html__( 'Exp Number', 'dvprintplan' ),
				'type' => Controls_Manager::NUMBER,
				'default' => '10',
                'label_block' => false,
				'dynamic' => [
					'active' => true,
				],
			]
		);
		$expRepeater->add_control(
			'counter_after_text',
			[
				'label' => esc_html__( 'Counter After Text', 'dvprintplan' ),
				'type' => Controls_Manager::TEXT,
				'default' => '',
				'label_block' => false,
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
			'expreance_counter_list',
			[
				'label' => esc_html__( 'Counter Lists', 'dvprintplan' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $expRepeater->get_controls(),
				'default' => [
					[
						'exp_title' => esc_html__( 'Counter Title #1', 'dvprintplan' ),
					],
					[
						'exp_title' => esc_html__( 'Counter Title #2', 'dvprintplan' ),
					],
				],
				'title_field' => '{{{ exp_title }}}',
			]
		);
        $this->end_controls_section();
		$this->start_controls_section(
			'testimonial_style', [
				'label' => esc_html__( 'Testimonial Style', 'dvprintplan' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => esc_html__( 'Title Style', 'dvprintplan' ),
				'name' => 'testimonial_title_style',
				'selector' => '{{WRAPPER}} .testimonial-wrap h3',
			]
		);
		$this->add_control(
			'testimonial_title_color',
			[
				'label' => esc_html__( 'Title Color', 'dvprintplan' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .testimonial-wrap h3' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'hr1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => esc_html__( 'Review Title', 'dvprintplan' ),
				'name' => 'review_title_style',
				'selector' => '{{WRAPPER}} .owl-item-wrap h4',
			]
		);
		$this->add_control(
			'review_title_color',
			[
				'label' => esc_html__( 'Review Title Color', 'dvprintplan' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .owl-item-wrap h4' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'hr2',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => esc_html__( 'Review Text', 'dvprintplan' ),
				'name' => 'review_text_style',
				'selector' => '{{WRAPPER}} .owl-item-wrap p',
			]
		);
		$this->add_control(
			'review_text_color',
			[
				'label' => esc_html__( 'Review Text Color', 'dvprintplan' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .owl-item-wrap p' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'hr3',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => esc_html__( 'Name Style', 'dvprintplan' ),
				'name' => 'name_style',
				'selector' => '{{WRAPPER}} .client-name',
			]
		);
		$this->add_control(
			'user_name_color',
			[
				'label' => esc_html__( 'Client Name Color', 'dvprintplan' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .client-name' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'hr4',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
		$this->add_responsive_control(
			'user_image_width',
			[
				'label' => esc_html__( 'Avatar Width', 'dvprintplan' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 60,
				],
				'selectors' => [
					'{{WRAPPER}} .review-img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'user_image_height',
			[
				'label' => esc_html__( 'Avatar Height', 'dvprintplan' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 60,
				],
				'selectors' => [
					'{{WRAPPER}} .review-img' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'avatar_image_border',
				'label' => esc_html__( 'Avatar Border', 'dvprintplan' ),
				'selector' => '{{WRAPPER}} .active .review-img',
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'avatar_image_border_radius',
			[
				'label' => esc_html__( 'Avatar Border Radius', 'dvprintplan' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .active .review-img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'hr5',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => esc_html__( 'Next & Prev BTN Style', 'dvprintplan' ),
				'name' => 'next_prev_btn_style',
				'selector' => '{{WRAPPER}} .owl-nav button',
			]
		);
		$this->add_control(
			'next_prev_btn_color',
			[
				'label' => esc_html__( 'Client Name Color', 'dvprintplan' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .owl-nav button' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'next_btn_border',
				'label' => esc_html__( 'Next BTN Border', 'dvprintplan' ),
				'selector' => '{{WRAPPER}} .owl-next',
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'prev_btn_border',
				'label' => esc_html__( 'Prev BTN Border', 'dvprintplan' ),
				'selector' => '{{WRAPPER}} .owl-prev',
				'separator' => 'before',
			]
		);
		$this->add_control(
			'hr6',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
		$this->add_responsive_control(
			'counter_item_width',
			[
				'label' => esc_html__( 'Counter Items Width', 'dvprintplan' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 195,
				],
				'selectors' => [
					'{{WRAPPER}} .counter-item' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'counter_item_height',
			[
				'label' => esc_html__( 'Counter Items Height', 'dvprintplan' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 195,
				],
				'selectors' => [
					'{{WRAPPER}} .counter-item' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'counter_item_border',
				'label' => esc_html__( 'Counter Item Border', 'dvprintplan' ),
				'selector' => '{{WRAPPER}} .counter-item',
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'counter_item_border_before',
				'label' => esc_html__( 'Counter Item Border Before', 'dvprintplan' ),
				'selector' => '{{WRAPPER}} .counter-item::before',
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => esc_html__( 'Counter Number', 'dvprintplan' ),
				'name' => 'counter_number_style',
				'selector' => '{{WRAPPER}} .counter-item .box-title',
			]
		);
		$this->add_control(
			'counter_number_color',
			[
				'label' => esc_html__( 'Counter Number Color', 'dvprintplan' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .counter-item .box-title' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => esc_html__( 'Counter Title', 'dvprintplan' ),
				'name' => 'counter_title_style',
				'selector' => '{{WRAPPER}} .counter-item > h5',
			]
		);
		$this->add_control(
			'counter_title_color',
			[
				'label' => esc_html__( 'Counter Title Color', 'dvprintplan' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .counter-item > h5' => 'color: {{VALUE}}',
				],
			]
		);
		$this->end_controls_section();

    
	}
	protected function render() {
	    $settings = $this->get_settings_for_display();
	    $testimonial_title = $settings['testimonial_title'];
	    $review_lists = $settings['review_lists'];
	    $expreance_counter_list = $settings['expreance_counter_list'];
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
						<?php foreach($expreance_counter_list as $counter_list): ?>
							<div class="counter-item d-inline-block">
								<h4 class="box-title mb-10">
									<?php
										$counter_before_text = $counter_list['counter_before_text'];
										if(isset($counter_before_text) && !empty($counter_before_text)){
											echo "<span class='counter-before-text'>" . esc_html($counter_before_text) . "</span>";
										}
									?>
									<span class="counter"><?php echo esc_html__($counter_list['exp_number']); ?></span>
									<?php
										$counter_after_text = $counter_list['counter_after_text'];
										if(isset($counter_after_text) && !empty($counter_after_text)){
											echo "<span class='counter-after-text'>" . esc_html($counter_after_text) . "</span>";
										}
									?>
								</h4>
								<h5><?php echo esc_html__($counter_list['exp_title']); ?></h5>
							</div>
						<?php endforeach; ?>
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