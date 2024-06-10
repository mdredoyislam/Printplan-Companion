<?php
namespace printplanCompanion\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;
use Elementor\Repeater;
use Elementor\Icons_Manager;
use \Elementor\Group_Control_Typography;
use WP_Query;

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
		$this->add_control(
			'project_link_icon', [

				'label' => esc_html__( 'Project Link Icon', 'dvprintplan' ),
				'type' => Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-link',
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
		$this->add_control(
			'show_column', [
				'label' => __( 'Project Column', 'dvprintplan' ),
				'type' => Controls_Manager::SELECT,
				'default' => '',
				'options' => [
					'' => esc_html__( 'Default', 'dvprintplan' ),
					'12' => esc_html__( 'Column 1', 'dvprintplan' ),
					'6'  => esc_html__( 'Column 2', 'dvprintplan' ),
					'4'  => esc_html__( 'Column 3', 'dvprintplan' ),
					'3'  => esc_html__( 'Column 4', 'dvprintplan' ),
					'2'  => esc_html__( 'Column 6', 'dvprintplan' ),
				],
                'label_block' => false,
                'dynamic' => [
                    'active' => true,
                ],
			]
		);
		$this->add_control(
			'show_project_per_pages', [
				'label' => __( 'Post Per Pages', 'dvprintplan' ),
				'type' => Controls_Manager::NUMBER,
                'label_block' => false,
                'dynamic' => [
                    'active' => true,
                ],
			]
		);
		$this->add_control(
			'project_order', [
				'label' => __( 'ORDER', 'dvprintplan' ),
				'type' => Controls_Manager::SELECT,
				'default' => '',
				'options' => [
					'' => esc_html__( 'Default', 'dvprintplan' ),
					'asc' => esc_html__( 'ASC', 'dvprintplan' ),
					'desc'  => esc_html__( 'DESC', 'dvprintplan' ),
				],
                'label_block' => false,
                'dynamic' => [
                    'active' => true,
                ],
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'project_style', [
				'label' => esc_html__( 'Project Style', 'dvprintplan' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'project_title_color',
			[
				'label' => esc_html__( 'Title Color', 'dvprintplan' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .project-wrapper h3' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => esc_html__( 'Title Style', 'dvprintplan' ),
				'name' => 'project_title_style',
				'selector' => '{{WRAPPER}} .project-wrapper h3',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'project_linker_bg',
				'label' => esc_html__( 'Link Overlay', 'dvprintplan' ),
				'types' => [ 'classic', 'gradient'],
				'selector' => '{{WRAPPER}} .project-linker',
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
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'project_linker_btn',
				'label' => esc_html__( 'Link BTN BG', 'dvprintplan' ),
				'types' => [ 'classic', 'gradient'],
				'selector' => '{{WRAPPER}} .project-linker a',
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
		$this->add_responsive_control(
			'project_linker_btn_width',
			[
				'label' => esc_html__( 'Size', 'dvprintplan' ),
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
					'{{WRAPPER}} .project-linker a' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'project_linker_btn_height',
			[
				'label' => esc_html__( 'Size', 'dvprintplan' ),
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
					'{{WRAPPER}} .project-linker a' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'project_linker_btn_line_height',
			[
				'label' => esc_html__( 'Size', 'dvprintplan' ),
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
					'size' => 55,
				],
				'selectors' => [
					'{{WRAPPER}} .project-linker a' => 'line-height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'project_icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'dvprintplan' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .project-linker a svg' => 'fill: {{VALUE}}',
				],
			]
		);
		$this->add_responsive_control(
			'project_icon_size',
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
					'size' => 20,
				],
				'selectors' => [
					'{{WRAPPER}} .project-linker a svg' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'hero_icon_border',
				'selector' => '{{WRAPPER}} .project-linker a',
				'separator' => 'before',
			]
		);
		$this->end_controls_section();
	}
	protected function render() {
	    $settings = $this->get_settings_for_display();
	    $project_title = $settings['project_title'];
	    $project_link_icon = $settings['project_link_icon'];
	    $show_column = $settings['show_column'];
	    $show_project_per_pages = $settings['show_project_per_pages'];
	    $project_order = $settings['project_order'];

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
            <div class="row project-row">
				<?php
					$args = array( 'post_type'=>'project', 'posts_per_page' => $show_project_per_pages, 'order' => $project_order ); 
					$projectQuery = new WP_Query($args);
					if($projectQuery->have_posts()):
					while($projectQuery->have_posts()): $projectQuery->the_post();
				?>
					<div class="col-lg-<?php if($show_column == ''){echo "4";}else{echo $show_column;} ?>">
						<div class="grid-item">
							<?php the_post_thumbnail( 'full', array('class'=>'img-fluid') ) ?>
							<div class="project-linker d-flex align-items-center justify-content-center">
								<a href="<?php esc_url(the_permalink()); ?>" class="btn common-btn common-btn-color">
									<?php Icons_Manager::render_icon($project_link_icon, [ 'aria-hidden' => 'true' ] ); ?>
								</a>
							</div>
						</div>
					</div>
				<?php endwhile; wp_reset_postdata(); endif; ?>

                <a href="#" class="btn common-btn mt-60 project-btn">See all projects</a>
            </div>
        </div>
    </section>
    <?php }
/*
protected function content_template() { ?>
<?php }*/

}
?>