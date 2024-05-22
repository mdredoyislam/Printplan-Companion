<?php
namespace printplanCompanion\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class AboutWidgets extends Widget_Base {

	public function get_name() {
		return 'about-widget';
	}

	public function get_title() {
		return __( 'About Section', 'dvprintplan' );
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
			'about_content', [
				'label' => esc_html__( 'About Content', 'dvprintplan' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
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
		$this->end_controls_section();

		$this->start_controls_section(
			'about_section_style', [
				'label' => esc_html__( 'About Style', 'dvprintplan' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->end_controls_section();

	}
	protected function render() {
	    $settings = $this->get_settings_for_display();
    ?>
<section id="about-section" class="pb-100 pt-100">
    <div class="container">
        <div class="row align-items-center mb-150">
            <div class="col-lg-7">
                <div class="about-wrapper">
                    <div class="user-img">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/about-img.png" alt="" srcset="">
                    </div>
                    <div class="progress-inner">
                        <div class="about-icons">
                            <img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/assets/images/iconcog.png" alt="" srcset="">
                        </div>
                        <h3 class="box-title2 mb-25">My Skills</h3>
                        <div class="progress-box mb-20">
                            <h5 class="box-title3 mb-2">Photoshop - 90%</h5>
                            <div class="count-text item_value">0%</div>
                            <div class="bar item_bar"><div class="bar-inner count-bar progress" data-progress="90"></div></div>
                        </div>
                        <div class="progress-box mb-20">
                            <h5 class="box-title3 mb-2">Web Design - 70%</h5>
                            <div class="count-text item_value">0%</div>
                            <div class="bar item_bar"><div class="bar-inner count-bar progress" data-progress="70"></div></div>
                        </div>
                        <div class="progress-box mb-20">
                            <h5 class="box-title3 mb-2">HTML - 80%</h5>
                            <div class="count-text item_value">0%</div>
                            <div class="bar item_bar"><div class="bar-inner count-bar progress" data-progress="80"></div></div>
                        </div>
                        <div class="progress-box mb-20">
                            <h5 class="box-title3 mb-2">Illustrator - 60%</h5>
                            <div class="count-text item_value">0%</div>
                            <div class="bar item_bar"><div class="bar-inner count-bar progress" data-progress="60"></div></div>
                        </div>
                        <div class="progress-box mb-20">
                            <h5 class="box-title3 mb-2">Premiere pro - 50%</h5>
                            <div class="count-text item_value">0%</div>
                            <div class="bar item_bar"><div class="bar-inner count-bar progress" data-progress="50"></div></div>
                        </div>
                        <div class="progress-box">
                            <h5 class="box-title3 mb-2">InDesign - 85%</h5>
                            <div class="count-text item_value">0%</div>
                            <div class="bar item_bar"><div class="bar-inner count-bar progress" data-progress="85"></div></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="section-text-wrap pl-45">
                    <h3 class="section-title mb-20">About me.</h3>
                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
                    <p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p> 
                    <p class="mb-50">All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.</p>
                    <a href="#" download="download" class="btn common-btn common-btn-color d-inline-block">download cv</a>
                    <a href="#" class="btn common-btn d-inline-block">job experience</a>
                </div>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="section-text-wrap mr-60">
                    <h3 class="section-title mb-20">What I Do.</h3>
                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
                    <p class="mb-50">If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
                    <a href="#" class="btn common-btn common-btn-color d-inline-block">message</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="services-box">
                    <div class="services-item d-flex align-items-center">
                        <div class="service-icon">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/service1.png" alt="" srcset="">
                        </div>
                        <div class="services-text ml-30">
                            <h4 class="box-title2 mb-10">Web Design.</h4>
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour.</p>
                        </div>
                    </div>
                </div>
                <div class="services-box">
                    <div class="services-item d-flex align-items-center">
                        <div class="service-icon">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/service1.png" alt="" srcset="">
                        </div>
                        <div class="services-text ml-30">
                            <h4 class="box-title2 mb-10">Web Design.</h4>
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour.</p>
                        </div>
                    </div>
                </div>
                <div class="services-box">
                    <div class="services-item d-flex align-items-center">
                        <div class="service-icon">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/service1.png" alt="" srcset="">
                        </div>
                        <div class="services-text ml-30">
                            <h4 class="box-title2 mb-10">Web Design.</h4>
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    <?php } 
    protected function content_template() { ?>
        <div class="title">
        {{{ settings.about_title }}}
        </div>
    <?php }
}