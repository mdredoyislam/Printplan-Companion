<?php
namespace printplanCompanion\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class HeroWidgets extends Widget_Base {

	public function get_name() {
		return 'hero-widget';
	}

	public function get_title() {
		return __( 'Hero Section', 'dvprintplan' );
	}

	public function get_icon() {
		return 'eicon-call-to-action';
	}

	public function get_categories() {
		return [ 'desvert' ];
	}

	public function get_script_depends() {
		return [ 'dvprintplan' ];
	}

	protected function register_controls() {

		//Hero Section Tab Content
        $this->start_controls_section(
			'content_section', [
				'label' => esc_html__( 'Hero Content', 'dvprintplan' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'hero_section_title', [
				'label' => __( 'Hero Section Title', 'dvprintplan' ),
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
			'hero_section_description', [
				'label' => __( 'Hero Section Description', 'dvprintplan' ),
				'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'Description Here', 'dvprintplan' ),
				'placeholder' => esc_html__( 'Place your Description here', 'dvprintplan' ),
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ],
			]
		);
		$this->add_control(
			'hr',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
        $this->add_control(
			'hero_btn_text', [
				'label' => __( 'Button Text', 'dvprintplan' ),
				'type' => Controls_Manager::TEXT,
                'default' => esc_html__( 'hire me', 'dvprintplan' ),
				'placeholder' => esc_html__( 'hire me', 'dvprintplan' ),
                'label_block' => false,
                'dynamic' => [
                    'active' => true,
                ],
			]
		);
        $this->add_control(
			'hero_btn_link', [
				'label' => __( 'Button Link', 'dvprintplan' ),
				'type' => Controls_Manager::URL,
                'default' => esc_html__( '#', 'dvprintplan' ),
				'placeholder' => esc_html__( '#', 'dvprintplan' ),
                'options' => [ 'url', 'is_external', 'nofollow' ],
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ],
			]
		);
        $this->add_control(
			'hero_btn_id', [
				'label' => __( 'Button ID', 'dvprintplan' ),
				'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'dynamic' => [
                    'active' => true,
                ],
			]
		);
		$this->end_controls_section();
		/*--------------------------
		End Hero Content Section 
		----------------------------*/

		/*--------------------------
		Start Hero Content Style Tabs 
		----------------------------*/
        $this->start_controls_section(
			'style_section', [
				'label' => esc_html__( 'Hero Title Style', 'dvprintplan' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'hero-title-align',
			[
				'label' => esc_html__( 'Alignment', 'dvprintplan' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left'    => [
						'title' => esc_html__( 'Left', 'dvprintplan' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'dvprintplan' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'dvprintplan' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'prefix_class' => 'e-grid-align%s-',
				'default' => 'left',
				'selectors' => [
					'{{WRAPPER}} .hero-title' => 'text-align: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'hero_title_color',
			[
				'label' => esc_html__( 'Hero Title Color', 'dvprintplan' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hero-title' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'selector' => '{{WRAPPER}} .hero-title',
			]
		);
		$this->add_responsive_control(
			'hero_title_margin',
			[
				'label' => esc_html__( 'Margin', 'dvprintplan' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .hero-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);
		$this->end_controls_section();

		//Hero Description Style Tabs
        $this->start_controls_section(
			'style_description', [
				'label' => esc_html__( 'Hero Description Style', 'dvprintplan' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'hero-desc-align',
			[
				'label' => esc_html__( 'Alignment', 'dvprintplan' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left'    => [
						'title' => esc_html__( 'Left', 'dvprintplan' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'dvprintplan' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'dvprintplan' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'prefix_class' => 'e-grid-align%s-',
				'default' => 'left',
				'selectors' => [
					'{{WRAPPER}} .hero-section-wrap p' => 'text-align: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'hero_description_color',
			[
				'label' => esc_html__( 'Hero Description Color', 'dvprintplan' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hero-section-wrap p' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'description_typography',
				'selector' => '{{WRAPPER}} .hero-section-wrap p',
			]
		);
		$this->add_responsive_control(
			'hero_description_margin',
			[
				'label' => esc_html__( 'Margin', 'dvprintplan' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .hero-section-wrap p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);
		$this->end_controls_section();

		//Hero Button Style Tabs
        $this->start_controls_section(
			'style_hero_button', [
				'label' => esc_html__( 'Hero Button Style Style', 'dvprintplan' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'hero_btn_typography',
				'selector' => '{{WRAPPER}} .hero-section-wrap .hero-btn',
			]
		);

		//Start BTN Tabs
		$this->start_controls_tabs(
			'style_tabs'
		);

		//Normal BTN
		$this->start_controls_tab(
			'style_hero_btn_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'dvprintplan' ),
			]
		);
		$this->add_control(
			'hero_btn_text_color',
			[
				'label' => esc_html__( 'BTN Text Color', 'dvprintplan' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hero-section-wrap .hero-btn' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'hero_btn_bg',
				'types' => [ 'classic', 'gradient'],
				'selector' => '{{WRAPPER}} .hero-section-wrap .hero-btn',
				'fields_options' => [
					'background' => [
						'default' => 'classic',
					],
				],
				'dynamic' => [
                    'active' => true,
                ],
			]
		);
		$this->add_control(
			'hr',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'hero_btn_border',
				'selector' => '{{WRAPPER}} .hero-section-wrap .hero-btn',
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'hero_btn_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'dvprintplan' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .hero-section-wrap .hero-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'hero_btn_box_shadow',
				'selector' => '{{WRAPPER}} .hero-section-wrap .hero-btn',
			]
		);

		$this->end_controls_tab();

		//Hover BTN
		$this->start_controls_tab(
			'hero_btn_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'dvprintplan' ),
			]
		);
		$this->add_control(
			'hero_btn_hover_text_color',
			[
				'label' => esc_html__( 'BTN Hover Color', 'dvprintplan' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hero-section-wrap .hero-btn:hover' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'hero_hover_btn_bg',
				'types' => [ 'classic', 'gradient'],
				'selector' => '{{WRAPPER}} .hero-section-wrap .hero-btn:hover',
				'fields_options' => [
					'background' => [
						'default' => 'classic',
					],
				],
				'dynamic' => [
                    'active' => true,
                ],
			]
		);
		$this->add_control(
			'hr',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'hero_btn_hover_border',
				'selector' => '{{WRAPPER}} .hero-section-wrap .hero-btn:hover',
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'hero_btn_hover_border_radius',
			[
				'label' => esc_html__( 'Hover Border Radius', 'dvprintplan' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .hero-section-wrap .hero-btn:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'hero_btn_hover_box_shadow',
				'selector' => '{{WRAPPER}} .hero-section-wrap .hero-btn:hover',
			]
		);
		$this->end_controls_tab();
		//End BTN Hover
		$this->end_controls_tabs();
		//End BTN Tabs

		$this->add_responsive_control(
			'hero_btn_text_padding',
			[
				'label' => esc_html__( 'Padding', 'dvprintplan' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .hero-section-wrap .hero-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);

		$this->end_controls_section();

		/*--------------------------
		End Hero Content Style Tabs 
		----------------------------*/

        $this->start_controls_section(
			'section_social_icon',
			[
				'label' => esc_html__( 'Hero Social Icons', 'dvprintplan' ),
			]
		);
		$this->add_control(
			'hero_social_title', [
				'label' => __( 'Social Title', 'dvprintplan' ),
				'type' => Controls_Manager::TEXT,
                'default' => esc_html__( 'Check out my:', 'dvprintplan' ),
				'placeholder' => esc_html__( 'Check out my:', 'dvprintplan' ),
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ],
			]
		);
		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'social_icon',
			[
				'label' => esc_html__( 'Icon', 'dvprintplan' ),
				'type' => Controls_Manager::ICONS,
				'fa4compatibility' => 'social',
				'default' => [
					'value' => 'fab fa-wordpress',
					'library' => 'fa-brands',
				],
				'recommended' => [
					'fa-brands' => [
						'android',
						'apple',
						'behance',
						'bitbucket',
						'codepen',
						'delicious',
						'deviantart',
						'digg',
						'dribbble',
						'elementor',
						'facebook',
						'flickr',
						'foursquare',
						'free-code-camp',
						'github',
						'gitlab',
						'globe',
						'houzz',
						'instagram',
						'jsfiddle',
						'linkedin',
						'medium',
						'meetup',
						'mix',
						'mixcloud',
						'odnoklassniki',
						'pinterest',
						'product-hunt',
						'reddit',
						'shopping-cart',
						'skype',
						'slideshare',
						'snapchat',
						'soundcloud',
						'spotify',
						'stack-overflow',
						'steam',
						'telegram',
						'thumb-tack',
						'threads',
						'tripadvisor',
						'tumblr',
						'twitch',
						'twitter',
						'viber',
						'vimeo',
						'vk',
						'weibo',
						'weixin',
						'whatsapp',
						'wordpress',
						'xing',
						'x-twitter',
						'yelp',
						'youtube',
						'500px',
					],
					'fa-solid' => [
						'envelope',
						'link',
						'rss',
					],
				],
			]
		);

		$repeater->add_control(
			'link',
			[
				'label' => esc_html__( 'Link', 'dvprintplan' ),
				'type' => Controls_Manager::URL,
				'default' => [
					'is_external' => 'true',
				],
				'dynamic' => [
					'active' => true,
				],
			]
		);

		$repeater->add_control(
			'item_icon_color',
			[
				'label' => esc_html__( 'Color', 'dvprintplan' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'default',
				'options' => [
					'default' => esc_html__( 'Official Color', 'dvprintplan' ),
					'custom' => esc_html__( 'Custom', 'dvprintplan' ),
				],
			]
		);

		$repeater->add_control(
			'item_icon_primary_color',
			[
				'label' => esc_html__( 'Primary Color', 'dvprintplan' ),
				'type' => Controls_Manager::COLOR,
				'condition' => [
					'item_icon_color' => 'custom',
				],
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}} .hero-social-icon' => 'background-color: {{VALUE}};',
				],
			]
		);

		$repeater->add_control(
			'item_icon_secondary_color',
			[
				'label' => esc_html__( 'Secondary Color', 'dvprintplan' ),
				'type' => Controls_Manager::COLOR,
				'condition' => [
					'item_icon_color' => 'custom',
				],
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}} .hero-social-icon i' => 'color: {{VALUE}};',
					'{{WRAPPER}} {{CURRENT_ITEM}} .hero-social-icon svg' => 'fill: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'hero_icon_list',
			[
				'label' => esc_html__( 'Social Icons', 'dvprintplan' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'social_icon' => [
							'value' => 'fab fa-facebook',
							'library' => 'fa-brands',
						],
					],
					[
						'social_icon' => [
							'value' => 'fab fa-twitter',
							'library' => 'fa-brands',
						],
					],
					[
						'social_icon' => [
							'value' => 'fab fa-youtube',
							'library' => 'fa-brands',
						],
					],
				],
				'title_field' => '<# var migrated = "undefined" !== typeof __fa4_migrated, social = ( "undefined" === typeof social ) ? false : social; #>{{{ elementor.helpers.getSocialNetworkNameFromIcon( social_icon, social, true, migrated, true ) }}}',
			]
		);
		$this->end_controls_section();

		/*--------------------------
		Start Hero Social Style 
		----------------------------*/
		$this->start_controls_section(
			'hero_social_section_style', [
				'label' => esc_html__( 'Hero Social Style', 'dvprintplan' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'hero_btn_width',
			[
				'label' => esc_html__( 'Width', 'dvprintplan' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
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
					'size' => 50,
				],
				'selectors' => [
					'{{WRAPPER}} .hero-icons a' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'hero_btn_height',
			[
				'label' => esc_html__( 'Height', 'dvprintplan' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
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
					'size' => 50,
				],
				'selectors' => [
					'{{WRAPPER}} .hero-icons a' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'hero_btn_line_height',
			[
				'label' => esc_html__( 'Line Height', 'dvprintplan' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
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
					'size' => 50,
				],
				'selectors' => [
					'{{WRAPPER}} .hero-icons a' => 'line-height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'hero_btn_icon_size',
			[
				'label' => esc_html__( 'Size', 'dvprintplan' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
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
					'size' => 16,
				],
				'selectors' => [
					'{{WRAPPER}} .hero-icons a' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);
		//Hero Icon Tabs Tabs
		$this->start_controls_tabs(
			'hero_icon_tabs'
		);

		//Hero Icon Normal
		$this->start_controls_tab(
			'style_hero_icon_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'dvprintplan' ),
			]
		);
		$this->add_control(
			'hero_icon_color',
			[
				'label' => esc_html__( 'Icon Hover Color', 'dvprintplan' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hero-icons a' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'hero_icon_bg',
				'types' => [ 'classic', 'gradient'],
				'selector' => '{{WRAPPER}} .hero-icons a',
				'fields_options' => [
					'background' => [
						'default' => 'classic',
					],
				],
				'dynamic' => [
                    'active' => true,
                ],
			]
		);
		$this->add_control(
			'hr',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'hero_icon_border',
				'selector' => '{{WRAPPER}} .hero-icons a',
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'hero_icon_border_radius',
			[
				'label' => esc_html__( 'Icon Border Radius', 'dvprintplan' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .hero-icons a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'hero_icon_box_shadow',
				'selector' => '{{WRAPPER}} .hero-icons a',
			]
		);
		$this->end_controls_tab();

		//Hover Icon
		$this->start_controls_tab(
			'style_hero_icon_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'dvprintplan' ),
			]
		);
		$this->add_control(
			'hero_icon_hover_color',
			[
				'label' => esc_html__( 'Icon Hover Color', 'dvprintplan' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hero-icons a:hover' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'hero_icon_hover_bg',
				'types' => [ 'classic', 'gradient'],
				'selector' => '{{WRAPPER}} .hero-icons a:hover',
				'fields_options' => [
					'background' => [
						'default' => 'classic',
					],
				],
				'dynamic' => [
                    'active' => true,
                ],
			]
		);
		$this->add_control(
			'hr',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'hero_icon_hover_border',
				'selector' => '{{WRAPPER}} .hero-icons a:hover',
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'hero_icon_hover_border_radius',
			[
				'label' => esc_html__( 'Icon Border Radius', 'dvprintplan' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .hero-icons a:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'hero_icon_hover_box_shadow',
				'selector' => '{{WRAPPER}} .hero-icons a:hover',
			]
		);
		$this->end_controls_tab();

		//Hero Icon Hover
		$this->end_controls_tabs();

		$this->end_controls_section();


		$this->start_controls_section(
			'content_hero_image', [
				'label' => esc_html__( 'Hero Image', 'dvprintplan' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'image',
			[
				'label' => esc_html__( 'Choose Image', 'dvprintplan' ),
				'type' => Controls_Manager::MEDIA,
				'dynamic' => [
					'active' => true,
				],
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Image_Size::get_type(),
			[
				'name' => 'image',
				'default' => 'large',
				'condition' => [
					'image[url]!' => '',
				],
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'hero_image_section_style', [
				'label' => esc_html__( 'Hero Image Style', 'dvprintplan' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'hero-image-width',
			[
				'label' => esc_html__( 'Width', 'dvprintplan' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
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
					'unit' => '%',
					'size' => 100,
				],
				'selectors' => [
					'{{WRAPPER}} .hero-section-image img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'hero-image-max-width',
			[
				'label' => esc_html__( 'Max Width', 'dvprintplan' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
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
					'unit' => '%',
					'size' => 100,
				],
				'selectors' => [
					'{{WRAPPER}} .hero-section-image img' => 'max-width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'hero-image-height',
			[
				'label' => esc_html__( 'Height', 'dvprintplan' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
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
					'unit' => '%',
					'size' => 100,
				],
				'selectors' => [
					'{{WRAPPER}} .hero-section-image img' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		//Hero Icon Tabs Tabs
			$this->start_controls_tabs(
				'hero_img_tabs'
			);
			
				$this->start_controls_tab(
					'hero_img_normal_tab',
					[
						'label' => esc_html__( 'Normal', 'dvprintplan' ),
					]
				);

				$this->add_group_control(
					\Elementor\Group_Control_Css_Filter::get_type(),
					[
						'name' => 'hero_image_filters',
						'selector' => '{{WRAPPER}} hero-section-image img',
					]
				);
				$this->add_control(
					'hero-image-opaciry',
					[
						'label' => esc_html__( 'Opacity', 'dvprintplan' ),
						'type' => \Elementor\Controls_Manager::SLIDER,
						'range' => [
							'px' => [
								'min' => 0,
								'max' => 100,
								'step' => 5,
							],
							'%' => [
								'min' => 0,
								'max' => 100,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .hero-section-image img' => 'opacity: {{SIZE}};',
						],
					]
				);
				$this->add_group_control(
					\Elementor\Group_Control_Border::get_type(),
					[
						'name' => 'hero_image_border',
						'selector' => '{{WRAPPER}} .hero-section-image img',
						'separator' => 'before',
					]
				);
				$this->add_responsive_control(
					'hero_image_border_radius',
					[
						'label' => esc_html__( 'Icon Border Radius', 'dvprintplan' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
						'selectors' => [
							'{{WRAPPER}} .hero-section-image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);
				$this->add_group_control(
					\Elementor\Group_Control_Box_Shadow::get_type(),
					[
						'name' => 'hero_image_box_shadow',
						'selector' => '{{WRAPPER}} .hero-section-image img',
					]
				);
				$this->end_controls_tab();
				$this->start_controls_tab(
					'hero_img_hover_tab',
					[
						'label' => esc_html__( 'Hover', 'dvprintplan' ),
					]
				);
				$this->add_group_control(
					\Elementor\Group_Control_Css_Filter::get_type(),
					[
						'name' => 'hero_image_hover_filters',
						'selector' => '{{WRAPPER}} hero-section-image img:hover',
					]
				);
				$this->add_control(
					'hero-image-hover-opaciry',
					[
						'label' => esc_html__( 'Opacity', 'dvprintplan' ),
						'type' => \Elementor\Controls_Manager::SLIDER,
						'range' => [
							'px' => [
								'min' => 0,
								'max' => 100,
								'step' => 5,
							],
							'%' => [
								'min' => 0,
								'max' => 100,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .hero-section-image img:hover' => 'opacity: {{SIZE}};',
						],
					]
				);
				$this->add_group_control(
					\Elementor\Group_Control_Border::get_type(),
					[
						'name' => 'hero_image_hover_border',
						'selector' => '{{WRAPPER}} .hero-section-image img:hover',
						'separator' => 'before',
					]
				);
				$this->add_responsive_control(
					'hero_image_hover_border_radius',
					[
						'label' => esc_html__( 'Image Border Radius', 'dvprintplan' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
						'selectors' => [
							'{{WRAPPER}} .hero-section-image img:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);
				$this->add_group_control(
					\Elementor\Group_Control_Box_Shadow::get_type(),
					[
						'name' => 'hero_image_hover_box_shadow',
						'selector' => '{{WRAPPER}} .hero-section-image img:hover',
					]
				);				
				$this->end_controls_tab();
			
			$this->end_controls_tabs();

		$this->end_controls_section();

	}
	protected function render() {
		$settings = $this->get_settings_for_display();
		$hero_section_title = $settings['hero_section_title'];
		$hero_section_desc = $settings['hero_section_description'];
		$hero_btn_text = $settings['hero_btn_text'];
		$hero_btn_link = $settings['hero_btn_link'];
		$hero_social_title = $settings['hero_social_title'];
		$hero_btn_id = $settings['hero_btn_id'];
		$fallback_defaults = [
			'fab fa-facebook',
			'fab fa-twitter',
			'fab fa-google-plus',
		];

		if ( empty( $settings['image']['url'] ) ) {
			return;
		}
		$img_link = $settings['image']['url'];
?>
<section id="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6">
                <div class="hero-section-wrap">
                    <h1 class="hero-title mb-30"><?php echo esc_html($hero_section_title); ?></h1>
                    <p class="mb-50"><?php echo esc_html($hero_section_desc); ?></p>
                    <a id="<?php echo esc_attr($hero_btn_id); ?>" href="<?php echo esc_url($hero_btn_link['url']) ?>" class="btn common-btn common-btn-color mr-25 hero-btn"><?php echo esc_html($hero_btn_text); ?> <i class="fas fa-paper-plane"></i></a>
                    <span><?php echo esc_html($hero_social_title); ?></span>
                    <div class="hero-icons d-inline-block">
						<?php
							foreach ( $settings['hero_icon_list'] as $index => $item ){
								$migrated = isset( $item['__fa4_migrated']['social_icon'] );
								$is_new = empty( $item['social'] );
								$social = '';

								// add old default
								if ( empty( $item['social'] ) ) {
									$item['social'] = isset( $fallback_defaults[ $index ] ) ? $fallback_defaults[ $index ] : 'fa fa-wordpress';
								}

								if ( ! empty( $item['social'] ) ) {
									$social = str_replace( 'fa fa-', '', $item['social'] );
								}

								if ( ( $is_new || $migrated ) && 'svg' !== $item['social_icon']['library'] ) {
									$social = explode( ' ', $item['social_icon']['value'], 2 );
									if ( empty( $social[1] ) ) {
										$social = '';
									} else {
										$social = str_replace( 'fa-', '', $social[1] );
									}
								}
								if ( 'svg' === $item['social_icon']['library'] ) {
									$social = get_post_meta( $item['social_icon']['value']['id'], '_wp_attachment_image_alt', true );
								}
								$link_key = 'link_' . $index;
								$this->add_render_attribute( $link_key, 'class', [
									'btn common-btn',
									'hero-icon',
									'hero-social-icon',
									'hero-repeater-item-' . $item['_id'],
								] );

								$this->add_link_attributes( $link_key, $item['link'] );
								?>
									<a <?php $this->print_render_attribute_string( $link_key ); ?>>
										<span class="elementor-screen-only"><?php echo esc_html( ucwords( $social ) ); ?></span>
										<i class="<?php echo esc_attr( $item['social'] ); ?>"></i>
									</a>
								<?php
							}
						?>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="hero-section-image">
                    <img class="img-fluid" src="<?php echo esc_url($img_link); ?>" alt="" srcset="">
                </div>
            </div>
        </div>
    </div>
</section>
<?php	}
	protected function content_template() {
		?>
        <section id="hero-section" style="background: url(<?php echo get_template_directory_uri(); ?>/assets/images/hero-bg.png)">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6">
                        <div class="hero-section-wrap">
                            <h1 class="hero-title mb-30">{{{ settings.hero_section_title }}}</h1>
                            <p class="mb-50">{{{ settings.hero_section_description }}}</p>
                            <a id="{{{ settings.hero_btn_id }}}" href="{{{ settings.hero_btn_link }}}" class="btn common-btn common-btn-color mr-25">{{{ settings.hero_btn_text }}} <i class="fas fa-paper-plane"></i></a>
                            <span>{{{ settings.hero_social_title }}}</span>
							<# var iconsHTML = {}; #>
							<div class="hero-icons d-inline-block">
								<# _.each( settings.hero_icon_list, function( item, index ) {
									var link = item.link ? item.link.url : '',
										migrated = elementor.helpers.isIconMigrated( item, 'social_icon' );
										social = elementor.helpers.getSocialNetworkNameFromIcon( item.social_icon, item.social, false, migrated );
									#>
										<a class="btn common-btn hero-icon hero-social-icon hero-social-icon-{{ social }} elementor-repeater-item-{{item._id}}" href="{{ link }}">
											<span class="elementor-screen-only">{{{ social }}}</span>
											<#
												iconsHTML[ index ] = elementor.helpers.renderIcon( view, item.social_icon, {}, 'i', 'object' );
												if ( ( ! item.social || migrated ) && iconsHTML[ index ] && iconsHTML[ index ].rendered ) { #>
													{{{ iconsHTML[ index ].value }}}
												<# } else { #>
													<i class="{{ item.social }}"></i>
												<# }
											#>
										</a>
								<# } ); #>
							</div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="hero-section-image">
						<# if ( settings.image.url ) {
								var image = {
									id: settings.image.id,
									url: settings.image.url,
									size: settings.image_size,
									dimension: settings.image_custom_dimension,
									model: view.getEditModel()
								};

								var image_url = elementor.imagesManager.getImageUrl( image );
								if ( ! image_url ) {
									return;
								}

								if ( 'file' === settings.link_to ) {
									link_url = settings.image.url;
								}
								var imgClass = '';

								#><img src="{{ image_url }}" class="img-fluid {{ imgClass }}" /><#
							}
						#>
                        </div>
                    </div>
                </div>
            </div>
        </section>
		<div class="title">
			{{{ settings.title }}}
		</div>
		<?php
	}
}