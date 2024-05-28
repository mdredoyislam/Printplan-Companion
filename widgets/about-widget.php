<?php
namespace printplanCompanion\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;
use Elementor\Repeater;
use Elementor\Icons_Manager;
use \Elementor\Group_Control_Typography;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class AboutWidgets extends Widget_Base {

	public function get_name() {
		return 'about-widget';
	}

	public function get_title() {
		return __( 'About Section', 'dvprintplan' );
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

		//About Section Tab Content
        $this->start_controls_section(
			'about_content', [
				'label' => esc_html__( 'About Content', 'dvprintplan' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'about_title', [
				'label' => __( 'About Title', 'dvprintplan' ),
				'type' => Controls_Manager::TEXT,
                'default' => esc_html__( 'Hello, I’m Iqbal Ahmed', 'dvprintplan' ),
				'placeholder' => esc_html__( 'Type your title here', 'dvprintplan' ),
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ],
			]
		);
        $this->add_control(
			'about_description', [
				'label' => __( 'About Description', 'dvprintplan' ),
				'type' => Controls_Manager::WYSIWYG,
				'placeholder' => esc_html__( 'Type your descreption here', 'dvprintplan' ),
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ],
			]
		);
        $this->add_control(
			'hr1',
			[
				'type' => Controls_Manager::DIVIDER,
			]
		);

        /*About Buttons*/
        $this->start_controls_tabs(
            'about_buttons'
        );

            $this->start_controls_tab(
                'about_download_btn',
                [
                    'label' => esc_html__( 'Download BTN', 'dvprintplan' ),
                ]
            );
            $this->add_control(
                'about_download_btn_label', [
                    'label' => __( 'Button Label', 'dvprintplan' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => esc_html__( 'Download', 'dvprintplan' ),
                    'label_block' => true,
                    'dynamic' => [
                        'active' => true,
                    ],
                ]
            );
            $this->add_control(
                'about_download_btn_link',
                [
                    'label' => esc_html__( 'Choose File', 'dvprintplan' ),
                    'type' => Controls_Manager::MEDIA,
                    'media_types' => [ 'application/pdf' ],
                ]
            );
            $this->end_controls_tab();

            $this->start_controls_tab(
                'about_btn',
                [
                    'label' => esc_html__( 'Experience BTN', 'dvprintplan' ),
                ]
            );
            $this->add_control(
                'about_ex_btn_label', [
                    'label' => __( 'Button Label', 'dvprintplan' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => esc_html__( 'Download', 'dvprintplan' ),
                    'label_block' => true,
                    'dynamic' => [
                        'active' => true,
                    ],
                ]
            );
            $this->add_control(
                'about_ex_btn_link',
                [
                    'label' => esc_html__( 'Button Link', 'dvprintplan' ),
                    'type' => Controls_Manager::URL,
                    'label_block' => true,
                    'dynamic' => [
                        'active' => true,
                    ],
                ]
            );
            $this->end_controls_tab();
        
        $this->end_controls_tabs();
        /*About Buttons*/

        $this->add_control(
			'hr2',
			[
				'type' => Controls_Manager::DIVIDER,
			]
		);
        $this->add_control(
			'about_image',
			[
				'label' => esc_html__( 'About Image', 'dvprintplan' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);
        $this->add_group_control(
			\Elementor\Group_Control_Image_Size::get_type(),
			[
				'name' => 'thumbnail',
				'exclude' => [ 'custom' ],
				'include' => [],
				'default' => 'large',
			]
		);
		$this->end_controls_section();
		
		//Start About Content Style
		$this->start_controls_section(
			'about_content_style', [
				'label' => esc_html__( 'About Content Style', 'dvprintplan' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'about_title_size',
			[
				'label' => esc_html__( 'About Title Font Size', 'dvprintplan' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => '',
				],
				'selectors' => [
					'{{WRAPPER}} .section-text-wrap .section-title' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'about_desc_font_size',
			[
				'label' => esc_html__( 'About Desc Font Size', 'dvprintplan' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => '',
				],
				'selectors' => [
					'{{WRAPPER}} .section-text-wrap p' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'about_btn_font_size',
			[
				'label' => esc_html__( 'About Button Font Size', 'dvprintplan' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => '',
				],
				'selectors' => [
					'{{WRAPPER}} .section-text-wrap a.btn' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'about_skill_font_size',
			[
				'label' => esc_html__( 'About Skills Font Size', 'dvprintplan' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => '',
				],
				'selectors' => [
					'{{WRAPPER}} .progress-inner h3.box-title2' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'about_progress_font_size',
			[
				'label' => esc_html__( 'Progress title Size', 'dvprintplan' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => '',
				],
				'selectors' => [
					'{{WRAPPER}} .progress-box h5.box-title3' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();
		//End About Content Style

        //Start Skills Loop Section
        $this->start_controls_section(
			'about_content_skills', [
				'label' => esc_html__( 'About Skills', 'dvprintplan' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
        $repeater = new Repeater();
        $repeater->add_control(
			'skill_title',
			[
				'label' => esc_html__( 'Skills Title', 'dvprintplan' ),
				'type' => Controls_Manager::TEXT,
				'default' => 'Skills Title Here',
                'label_block' => true,
				'dynamic' => [
					'active' => true,
				],
			]
		);
        $repeater->add_control(
			'skill_percents',
			[
				'label' => esc_html__( 'Skills Percents', 'dvprintplan' ),
				'type' => Controls_Manager::SLIDER,
                'size_units' => ['%'],
                'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => '%',
					'size' => 50,
				],
			]
		);
        $this->add_control(
			'skills_lists',
			[
				'label' => esc_html__( 'Skills Items', 'dvprintplan' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'skill_title' => esc_html__( 'Skills Title #1', 'dvprintplan' ),
					],
					[
						'skill_title' => esc_html__( 'Skills Title #2', 'dvprintplan' ),
					],
				],
				'title_field' => '{{{ skill_title }}}',
			]
		);
        $this->end_controls_section();
        //End Skills Loop Section

        //Start Services Section
        $this->start_controls_section(
			'about_content_services', [
				'label' => esc_html__( 'Services', 'dvprintplan' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
        $this->add_control(
			'services_title', [
				'label' => __( 'Services Title', 'dvprintplan' ),
				'type' => Controls_Manager::TEXT,
                'default' => esc_html__( 'What I Do.', 'dvprintplan' ),
				'placeholder' => esc_html__( 'Title here', 'dvprintplan' ),
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ],
			]
		);
        $this->add_control(
			'services_description', [
				'label' => __( 'Services Description', 'dvprintplan' ),
				'type' => Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__( 'Title here', 'dvprintplan' ),
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ],
			]
		);
        $this->add_control(
			'services_btn_label', [
				'label' => __( 'BTN Label', 'dvprintplan' ),
				'type' => Controls_Manager::TEXT,
                'default' => esc_html__( 'Message', 'dvprintplan' ),
				'placeholder' => esc_html__( 'Title here', 'dvprintplan' ),
                'label_block' => false,
                'dynamic' => [
                    'active' => true,
                ],
			]
		);
        $this->add_control(
			'services_btn_link', [
				'label' => __( 'Link', 'dvprintplan' ),
				'type' => Controls_Manager::URL,
                'label_block' => false,
                'dynamic' => [
                    'active' => true,
                ],
			]
		);
        $repseritems = new Repeater();
		$repseritems->add_control(
			'active_status',
			[
				'label' => esc_html__( 'Active', 'dvprintplan' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'On', 'dvprintplan' ),
				'label_off' => esc_html__( 'Off', 'dvprintplan' ),
				'return_value' => 'On',
				'default' => 'Off',
			]
		);
        $repseritems->add_control(
			'service_item_icon',
			[
				'label' => esc_html__( 'Services Icon', 'dvprintplan' ),
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
        $repseritems->add_control(
			'service_item_title',
			[
				'label' => esc_html__( 'Title', 'dvprintplan' ),
				'type' => Controls_Manager::TEXT,
				'default' => 'Title Here',
                'label_block' => true,
				'dynamic' => [
					'active' => true,
				],
			]
		);
        $repseritems->add_control(
			'services_item_desc', [
				'label' => __( 'Services Item Desctiption', 'dvprintplan' ),
				'type' => Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__( 'Description Here', 'dvprintplan' ),
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ],
			]
		);
        $this->add_control(
			'services_items',
			[
				'label' => esc_html__( 'Services Items', 'dvprintplan' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repseritems->get_controls(),
				'default' => [
					[
						'service_item_title' => esc_html__( 'Services Title #1', 'dvprintplan' ),
					],
					[
						'service_item_title' => esc_html__( 'Services Title #2', 'dvprintplan' ),
					],
				],
				'title_field' => '{{{ service_item_title }}}',
			]
		);        
        $this->end_controls_section();
        //End Services Section

		$this->start_controls_section(
			'services_section_style', [
				'label' => esc_html__( 'Services Style', 'dvprintplan' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'servies_title_font_size',
			[
				'label' => esc_html__( 'Services Title', 'dvprintplan' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => '',
				],
				'selectors' => [
					'{{WRAPPER}} .services-sec-title' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'servies_desc_font_size',
			[
				'label' => esc_html__( 'Services Description', 'dvprintplan' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => '',
				],
				'selectors' => [
					'{{WRAPPER}} .services-sec-wrap p' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'servies_btn_font_size',
			[
				'label' => esc_html__( 'Services Button', 'dvprintplan' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => '',
				],
				'selectors' => [
					'{{WRAPPER}} .services-sec-wrap a.btn' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'servies_box_icon_size',
			[
				'label' => esc_html__( 'Services Box Icon', 'dvprintplan' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => '',
				],
				'selectors' => [
					'{{WRAPPER}} .services-item .service-icon svg' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'servies_box_title_size',
			[
				'label' => esc_html__( 'Services Box Title', 'dvprintplan' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => '',
				],
				'selectors' => [
					'{{WRAPPER}} .services-item .services-text .box-title2' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'servies_box_text_size',
			[
				'label' => esc_html__( 'Services Box Text', 'dvprintplan' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => '',
				],
				'selectors' => [
					'{{WRAPPER}} .services-item .services-text p' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();

	}
	protected function render() {
	    $settings = $this->get_settings_for_display();
	    $about_title = $settings['about_title'];
	    $about_description = $settings['about_description'];
	    $about_download_btn_label = $settings['about_download_btn_label'];
	    $about_download_btn_link = $settings['about_download_btn_link'];
	    $about_ex_btn_label = $settings['about_ex_btn_label'];
	    $about_ex_btn_link = $settings['about_ex_btn_link'];
	    $about_image = $settings['about_image'];
	    $skills_lists = $settings['skills_lists'];

	    $services_title = $settings['services_title'];
	    $services_description = $settings['services_description'];
	    $services_btn_label = $settings['services_btn_label'];
	    $services_btn_link = $settings['services_btn_link'];
	    $services_items = $settings['services_items'];
    ?>
<section id="about-section" class="pb-100 pt-100">
    <div class="container">
        <div class="row align-items-center mb-150">
            <div class="col-lg-7">
                <div class="about-wrapper">
                    <div class="user-img">
                        <?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings, 'thumbnail', 'about_image' ); ?>
                    </div>
                    <div class="progress-inner">
                        <div class="about-icons">
                            <img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/assets/images/iconcog.png" alt="" srcset="">
                        </div>
                        <h3 class="box-title2 mb-25"><?php echo __('My Skills','dvprintplan') ?></h3>
                        <?php foreach($skills_lists as $skills_item): ?>
                        <div class="progress-box mb-20">
                            <h5 class="box-title3 mb-2"><?php echo esc_html($skills_item['skill_title']) ?> - <?php echo esc_html($skills_item['skill_percents']['size']. $skills_item['skill_percents']['unit']) ?></h5>
                            <?php  ?>
                            <div class="count-text item_value">0%</div>
                            <div class="bar item_bar"><div class="bar-inner count-bar progress" data-progress="<?php echo esc_attr($skills_item['skill_percents']['size']); ?>"></div></div>
                        </div>
                        <?php endforeach; ?>

                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="section-text-wrap pl-45">
                    <h3 class="section-title mb-20"><?php echo esc_html($about_title); ?></h3>
                    <?php echo __($about_description, 'dvprintplan') ?>
                    <a href="<?php echo esc_attr($about_download_btn_link['url']); ?>" download="download" class="btn common-btn common-btn-color d-inline-block"><?php echo esc_html($about_download_btn_label); ?></a>
                    <a href="<?php echo esc_url($about_ex_btn_link['url']); ?>" class="btn common-btn d-inline-block"><?php echo esc_html($about_ex_btn_label); ?></a>
                </div>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="section-text-wrap services-sec-wrap mr-60">
                    <h3 class="section-title services-sec-title mb-20"><?php echo esc_html($services_title); ?></h3>
                    <p><?php echo esc_html($services_description); ?></p>
                    <a href="<?php esc_url($services_btn_link['url']); ?>" class="btn common-btn common-btn-color d-inline-block"><?php echo esc_html($services_btn_label); ?></a>
                </div>
            </div>
            <div class="col-lg-6">
                <?php foreach($services_items as $services_item): ?>
					<div class="services-box <?php if('On' == $services_item['active_status']){ echo 'active'; } ?>">
						<div class="services-item d-flex align-items-center">
							<div class="service-icon">
								<?php Icons_Manager::render_icon(  $services_item['service_item_icon'], [ 'aria-hidden' => 'true' ] ); ?>
							</div>
							<div class="services-text ml-30">
								<h4 class="box-title2 mb-10"><?php echo esc_html($services_item['service_item_title']); ?></h4>
								<p><?php echo esc_html($services_item['services_item_desc']); ?></p>
							</div>
						</div>
					</div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
<?php }/*
protected function content_template() { ?>
<?php }*/
}
?>