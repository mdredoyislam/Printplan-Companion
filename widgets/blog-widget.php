<?php
namespace printplanCompanion\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;
use Elementor\Repeater;
use Elementor\Icons_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Css_Filter;
use WP_Query;


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class blogWidgets extends Widget_Base {

	public function get_name() {
		return 'blogWidgets';
	}

	public function get_title() {
		return __( 'Blog Section', 'dvprintplan' );
	}

	public function get_icon() {
		return 'eicon-posts-grid';
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
			'blog_content', [
				'label' => esc_html__( 'Blog Content', 'dvprintplan' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'blog_title', [
				'label' => __( 'Blog Title', 'dvprintplan' ),
				'type' => Controls_Manager::TEXT,
                'default' => esc_html__( 'Blog and News.', 'dvprintplan' ),
				'placeholder' => esc_html__( 'Title here', 'dvprintplan' ),
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ],
			]
		);
		$this->add_control(
			'blog_column', [
				'label' => __( 'Blog Column', 'dvprintplan' ),
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
			'show_blog_per_pages', [
				'label' => __( 'Blog Per Pages', 'dvprintplan' ),
				'type' => Controls_Manager::NUMBER,
                'label_block' => false,
                'dynamic' => [
                    'active' => true,
                ],
			]
		);
		$this->add_control(
			'blog_order', [
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
			'blog_style', [
				'label' => esc_html__( 'Blog Style', 'dvprintplan' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'blog_title_color',
			[
				'label' => esc_html__( 'Title Color', 'dvprintplan' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} #blog-section h3.section-title' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => esc_html__( 'Title Style', 'dvprintplan' ),
				'name' => 'blog_title_style',
				'selector' => '{{WRAPPER}} #blog-section h3.section-title',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'blog_section_bg',
				'label' => esc_html__( 'Blog Section BG', 'dvprintplan' ),
				'types' => [ 'classic', 'gradient'],
				'selector' => '{{WRAPPER}} #blog-section',
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
        $this->add_control(
			'blog_post_meta_color',
			[
				'label' => esc_html__( 'Blog Post Meta Color', 'dvprintplan' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .blog-content span' => 'color: {{VALUE}}',
				],
			]
        );
        $this->add_control(
			'blog_post_meta_link_color',
			[
				'label' => esc_html__( 'Blog Post Meta Link Color', 'dvprintplan' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .blog-content ul li a' => 'color: {{VALUE}}',
				],
			]
        );
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => esc_html__( 'Blog Post Meta Style', 'dvprintplan' ),
				'name' => 'blog_post_meta_style',
				'selector' => '{{WRAPPER}} .blog-content span',
			]
		);
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => esc_html__( 'Blog Post Meta Link Style', 'dvprintplan' ),
				'name' => 'blog_post_meta_link_style',
				'selector' => '{{WRAPPER}} .blog-content ul li a',
			]
		);
        $this->add_control(
			'hr2',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
        $this->add_control(
			'blog_post_title_color',
			[
				'label' => esc_html__( 'Blog Post Title Color', 'dvprintplan' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .blog-content h4.box-title' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .blog-content h4.box-title a' => 'color: {{VALUE}}',
				],
			]
        );
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => esc_html__( 'Blog Post Title Style', 'dvprintplan' ),
				'name' => 'blog_post_title_style',
				'selector' => '{{WRAPPER}} .blog-content h4.box-title',
			]
		);
        $this->add_group_control(
			Group_Control_Css_Filter::get_type(),
			[
				'name' => 'image_css_filters',
                'label' => esc_html__( 'Image Filter', 'dvprintplan' ),
				'selector' => '{{WRAPPER}} .blog-thumbnsil img',
			]
		);
		$this->end_controls_section();
	}
	protected function render() {
	    $settings = $this->get_settings_for_display();
	    $blog_title = $settings['blog_title'];
	    $blog_column = $settings['blog_column'];
	    $show_blog_per_pages = $settings['show_blog_per_pages'];
	    $blog_order = $settings['blog_order'];

    ?>
    <section id="blog-section" class="bg-medium pt-100 pb-100">
        <div class="container">
            <div class="row mb-50">
                <div class="col-lg-12">
                    <h3 class="section-title"><?php echo esc_html($blog_title); ?></h3>
                </div>
            </div>
            <div class="row">
                <?php 
                    $args = array( 'post_type'=>'post', 'posts_per_page' => $show_blog_per_pages, 'order' => $blog_order ); 
                    $postQuery = new WP_Query($args); 
                    if($postQuery->have_posts()):
                    while ($postQuery->have_posts()): $postQuery->the_post();
                ?>
                <div class="col-lg-<?php if($blog_column == ''){echo "4";}else{echo $blog_column;} ?>">
                    <div class="blog-item">
                        <div class="blog-thumbnsil mb-30">
                            <?php the_post_thumbnail('full', array('class'=>'img-fluid')); ?>
                        </div>
                        <div class="blog-content">
                            <span><?php echo get_the_date('d M Y') ?></span> -- <?php the_category(); ?>
                            <?php esc_html( the_title('<h4 class="box-title mt-10">','</h4>') ); ?>
                        </div>
                    </div>
                </div>
                <?php endwhile; endif; wp_reset_postdata(); ?>
            </div>
        </div>
    </section>
    <?php }
/*
protected function content_template() { ?>
<?php }*/

}
?>