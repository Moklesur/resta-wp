<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Hero Banner
 *
 * @since 1.0.0
 */

class resta_heroBanner extends Widget_Base {

    /**
     * Get widget name.
     *
     * Retrieve oEmbed widget name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */

    public function get_name() {
        return 'resta-heroBanner';
    }

    /**
     * Get widget title.
     *
     * Retrieve oEmbed widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */

    public function get_title() {
        return __( 'Hero Banner', 'resta' );
    }

    /**
     * Get widget icon.
     *
     * Retrieve oEmbed widget icon.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget icon.
     */

    public function get_icon() {
        return 'fa fa-file-image-o';
    }

    /**
     * Get widget categories.
     *
     * Retrieve the list of categories the oEmbed widget belongs to.
     *
     * @since 1.0.0
     * @access public
     *
     * @return array Widget categories.
     */

    public function get_categories() {
        return [ 'resta_elementor_categories' ];
    }

    /**
     * Register oEmbed widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 1.0.0
     * @access protected
     */

    protected function _register_controls() {

        $this->start_controls_section(
            'resta_heroBanner_section',
            [
                'label' => __( 'Setting', 'resta' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        // Big Banner
        $this->add_control(
            'banner',
            [
                'label' => __( 'Select BG Image', 'resta' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        // Pre Title
        $this->add_control(
            'pretitle',
            [
                'label' => __( 'Pre Title', 'resta' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Welcome To Resta.', 'resta' )
            ]
        );
        // Title
        $this->add_control(
            'title',
            [
                'label' => __( 'Title', 'resta' ),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXT,
                'description' => __( 'HTML span tag support', 'resta' ),
                'default' => __( 'We provide best food for our customers.', 'resta' )
            ]
        );
        // Paragraph
        $this->add_control(
            'paragraph',
            [
                'label' => __( 'Paragraph', 'resta' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Consectetur adipiscing elit, eiusmod tempor incididunt magna aliqu aenim ad minim veniam nostrud exercitat aliquip commodo consequat.', 'resta' )
            ]
        );
        // Button Text
        $this->add_control(
            'btn_txt',
            [
                'label' => __( 'Button Text', 'resta' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Book a Table', 'resta' )
            ]
        );
        // Button URL
        $this->add_control(
            'btn_url',
            [
                'label' => __( 'Button URL', 'resta' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __( 'https://your-link.com', 'resta' ),
                'show_external' => true,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );
        $this->end_controls_section();

        // Style
        $this->start_controls_section(
            'resta_heroBanner_style',
            [
                'label' => __( 'Style', 'resta' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        //Pre Title Style
        $this->add_control(
            'pre_title_style',
            [
                'label' => __( 'Pre Title', 'resta' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'pre_title_typography',
                'label' => __( 'Typography', 'resta' ),
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}}  h5',
            ]
        );
        $this->add_control(
            'pre_title_color',
            [
                'label' => __( 'Text Color', 'resta' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#f96a0e',
                'selectors' => [
                    '{{WRAPPER}} h5' => 'color: {{VALUE}}',
                ],
            ]
        );

        //Title Style
        $this->add_control(
            'title_style',
            [
                'label' => __( 'Title', 'resta' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => __( 'Typography', 'resta' ),
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} h1',
            ]
        );
        $this->add_control(
            'title_color',
            [
                'label' => __( 'Text Color', 'resta' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} h1' => 'color: {{VALUE}}',
                ],
            ]
        );
        //Content Style
        $this->add_control(
            'content_style',
            [
                'label' => __( 'Content', 'resta' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'content_typography',
                'label' => __( 'Typography', 'resta' ),
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} p',
            ]
        );
        $this->add_control(
            'content_color',
            [
                'label' => __( 'Text Color', 'resta' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#d3d3d3',
                'selectors' => [
                    '{{WRAPPER}} p' => 'color: {{VALUE}}',
                ],
            ]
        );
        //Button Style
        $this->add_control(
            'button_style',
            [
                'label' => __( 'Button', 'resta' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'button_color',
            [
                'label' => __( 'Text Color', 'resta' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .btn' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'button_bg_color',
            [
                'label' => __( 'background Color', 'resta' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#f96a0e',
                'selectors' => [
                    '{{WRAPPER}} .btn' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'border',
                'label' => __( 'Border', 'resta' ),
                'selector' => '{{WRAPPER}} .btn',
            ]
        );
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'button_shadow',
                'label' => __( 'Shadow', 'resta' ),
                'selector' => '{{WRAPPER}} .btn',
            ]
        );
        $this->end_controls_section();
    }

    /**
     * Render oEmbed widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */

    protected function render() {
        $settings = $this->get_settings_for_display();

        $target = $settings['btn_url']['is_external'] ? ' target="_blank"' : '';
        $nofollow = $settings['btn_url']['nofollow'] ? ' rel="nofollow"' : '';
        ?>


        <!--/.hero-banner start-->
        <section class="hero-banner" style="background-image: url('<?php echo esc_url( $settings['banner']['url'] ); ?>')">
            <div class="container">
                <div class="row align-content-center">
                    <article class="col-lg-5 col-md-6 col-sm-12">
                        <h5 class="font-weight-light font-playball mb-30"><?php echo esc_html( $settings['pretitle'] ); ?></h5>
                        <h1 class="mb-50 text-white"><?php
                            echo wp_kses(
                                $settings['title'],
                                array(
                                    'span' => array()
                                )
                            );
                            ?>
                        </h1>
                        <p class="mb-55"><?php echo esc_html( $settings['paragraph'] ) ?></p>
                        <a href="<?php echo esc_url( $settings['btn_url']['url'] ); ?>" <?php echo esc_attr( $target ) .' '. esc_attr( $nofollow ); ?>  class="btn"><?php echo esc_html( $settings['btn_txt'] ); ?><i class="icofont-arrow-right ml-5"></i></a>
                    </article>
                </div>
            </div>
        </section>
        <!--/.hero-banner end-->
        <?php
    }

    protected function _content_template() {}

}

Plugin::instance()->widgets_manager->register_widget_type( new resta_heroBanner() );