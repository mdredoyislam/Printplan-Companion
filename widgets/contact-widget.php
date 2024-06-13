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
//use do_shortcode;


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class contactWidgets extends Widget_Base {

	public function get_name() {
		return 'contactWidgets';
	}

	public function get_title() {
		return __( 'Contact Section', 'dvprintplan' );
	}

	public function get_icon() {
		return 'eicon-form-horizontal';
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
			'contact_content', [
				'label' => esc_html__( 'Contact Section', 'dvprintplan' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'contact_title', [
				'label' => __( 'Contact Title', 'dvprintplan' ),
				'type' => Controls_Manager::TEXT,
                'default' => esc_html__( 'Let\'s get in touch <br />with me.', 'dvprintplan' ),
				'placeholder' => esc_html__( 'Title here', 'dvprintplan' ),
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ],
			]
		);
        $contactitems = new Repeater();
		$contactitems->add_control(
			'services_active_status',
			[
				'label' => esc_html__( 'Active', 'dvprintplan' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'On', 'dvprintplan' ),
				'label_off' => esc_html__( 'Off', 'dvprintplan' ),
				'return_value' => 'On',
				'default' => 'Off',
			]
		);
        $contactitems->add_control(
			'contact_item_icon',
			[
				'label' => esc_html__( 'Contact Icon', 'dvprintplan' ),
				'type' => Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-phone',
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
        $contactitems->add_control(
			'contact_item_title',
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
        $contactitems->add_control(
			'contact_number', [
				'label' => __( 'Contact Number', 'dvprintplan' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => esc_html__( '+670000009012', 'dvprintplan' ),
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ],
			]
		);
        $contactitems->add_control(
			'contact_number_link', [
				'label' => __( 'Link', 'dvprintplan' ),
				'type' => Controls_Manager::URL,
				'placeholder' => esc_html__( 'tel:+670000009012', 'dvprintplan' ),
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ],
			]
		);

        $this->add_control(
			'contact_lists',
			[
				'label' => esc_html__( 'Contact Lists', 'dvprintplan' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $contactitems->get_controls(),
				'default' => [
					[
						'contact_item_title' => esc_html__( 'Contact Items #1', 'dvprintplan' ),
					],
					[
						'contact_item_title' => esc_html__( 'Contact Items #2', 'dvprintplan' ),
					],
				],
				'title_field' => '{{{ contact_item_title }}}',
			]
		);     
		$this->add_control(
			'contact_form', [
				'label' => __( 'Contact Form Shortcode', 'dvprintplan' ),
				'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__( '[contact-form-7 id="21943eb" title="Contact form"]', 'dvprintplan' ),
				'placeholder' => esc_html__( 'Contact Form 7 Shortcode', 'dvprintplan' ),
                'label_block' => true,
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
		
		$this->end_controls_section();
	}
	protected function render() {
	    $settings = $this->get_settings_for_display();
	    $contact_title = $settings['contact_title'];
        $contact_lists = $settings['contact_lists'];
        $contact_form = $settings['contact_form'];

    ?>
    <section id="contact-section" class="pt-100 pb-100" style="background: url(<?php echo get_template_directory_uri(); ?>/assets/images/shape.png);">
        <div class="container">
            <div class="row mb-70">
                <div class="col-lg-8 offset-lg-2 col-md-12 col-sm-12">
                    <h3 class="section-title text-center mb-30"><?php echo esc_html($contact_title); ?></h3>
                    <div class="form-wrap">
                        <?php echo do_shortcode($contact_form); ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 text-center">

                    <?php foreach($contact_lists as $contact_list): ?>
                        <div class="services-box d-inline-block <?php if('On' == $contact_list['services_active_status']){ echo 'active'; } ?> mr-20">
                            <div class="services-item d-flex align-items-center">
                                <div class="service-icon">
                                    <?php Icons_Manager::render_icon(  $contact_list['contact_item_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                </div>
                                <div class="services-text ml-30 text-start">
                                    <p><?php echo esc_html($contact_list['contact_item_title']); ?></p>
                                    <h4 class="box-title3"><a href="<?php echo esc_url($contact_list['contact_number_link']['url']); ?>"><?php echo esc_html($contact_list['contact_number']); ?></a></h4>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>
    </section>
    <?php }
/*
protected function content_template() { ?>
<?php }*/

}
?>