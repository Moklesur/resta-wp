<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Slideshow
 *
 * @since 1.0.0
 */

class resta_Gallery extends Widget_Base {

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
        return 'resta-Gallery';
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
        return __( 'Slideshow', 'resta' );
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
        return 'fa fa-glide-g';
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
            'resta_slideshow_section',
            [
                'label' => __( 'Setting', 'resta' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // Text Alignment
        $this->add_control(
            'text_alignment',
            [
                'label' => __('Text Alignment', 'resta'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'text-left' => [
                        'title' => __('Left', 'resta'),
                        'icon' => 'fa fa-align-left',
                    ],
                    'text-center' => [
                        'title' => __('Center', 'resta'),
                        'icon' => 'fa fa-align-center',
                    ],
                    'text-right' => [
                        'title' => __('Right', 'resta'),
                        'icon' => 'fa fa-align-right',
                    ],
                ],
                'default' => 'text-center',
                'toggle' => true,
            ]
        );


        // Pre Title
        $this->add_control(
            'divPreTitle',
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
                'default' => __( 'We Know !', 'resta' )
            ]
        );

        $this->add_control(
            'pretitle_animation',
            [
                'label' => __( 'Animation', 'resta' ),
                'type' => \Elementor\Controls_Manager::ANIMATION,
                'prefix_class' => 'animated ',
            ]
        );
        // Title
        $this->add_control(
            'divTitle',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'title',
            [
                'label' => __( 'Title', 'resta' ),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'What You Expect From Us', 'resta' )
            ]
        );
        $this->add_control(
            'title_animation',
            [
                'label' => __( 'Animation', 'resta' ),
                'type' => \Elementor\Controls_Manager::ANIMATION,
                'prefix_class' => 'animated ',
            ]
        );
        // Title
        $this->add_control(
            'divParagraph',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'paragraph',
            [
                'label' => __( 'Paragraph', 'resta' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'On the other hand, we denounce with righteous indignation and dislike men who
                        are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire,
                        that they cannot foresee the pain and trouble that are bound to ensue', 'resta' )
            ]
        );
        $this->add_control(
            'paragraph_animation',
            [
                'label' => __( 'Animation', 'resta' ),
                'type' => \Elementor\Controls_Manager::ANIMATION,
                'prefix_class' => 'animated ',
            ]
        );
        $this->end_controls_section();

        // Slider Settings

        $this->start_controls_section(
            'resta_slider_settings',
            [
                'label' => __( 'Slider Settings', 'resta' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        //Autoplay
        $this->add_control(
            'autoplay',
            [
                'label' => __( 'Autoplay', 'resta' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Show', 'resta' ),
                'label_off' => __( 'Hide', 'resta' ),
                'return_value' => 'true',
                'default' => 'true',
            ]
        );
        //Fade
        $this->add_control(
            'fade',
            [
                'label' => __( 'Fade', 'resta' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'True', 'resta' ),
                'label_off' => __( 'False', 'resta' ),
                'return_value' => 'true',
                'default' => 'true',
            ]
        );
        //Infinite
        $this->add_control(
            'infinite',
            [
                'label' => __( 'Infinite', 'resta' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'True', 'resta' ),
                'label_off' => __( 'False', 'resta' ),
                'return_value' => 'true',
                'default' => 'true',
            ]
        );
        //adaptiveHeight
        $this->add_control(
            'adaptiveHeight',
            [
                'label' => __( 'Adaptive Height', 'resta' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'True', 'resta' ),
                'label_off' => __( 'False', 'resta' ),
                'return_value' => 'true',
                'default' => '',
            ]
        );
        //Arrow
        $this->add_control(
            'arrows',
            [
                'label' => __( 'Arrows', 'resta' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'True', 'resta' ),
                'label_off' => __( 'False', 'resta' ),
                'return_value' => 'true',
                'default' => '',
            ]
        );
        //Dot
        $this->add_control(
            'dot',
            [
                'label' => __( 'Dots', 'resta' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'True', 'resta' ),
                'label_off' => __( 'False', 'resta' ),
                'return_value' => 'true',
                'default' => 'true',
            ]
        );

        // speed
        $this->add_control(
            'speed',
            [
                'label' => __( 'Speed', 'resta' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 100,
                'max' => 50000,
                'step' => 100,
                'default' => 1000
            ]
        );

        $this->end_controls_section();

        // STYLE Settings
        $this->start_controls_section(
            'resta_slideshow_style_section',
            [
                'label' => __( 'Style', 'resta' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
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
                'selector' => '{{WRAPPER}} .bb-slider-title',
            ]
        );
        $this->add_control(
            'title_color',
            [
                'label' => __( 'Text Color', 'resta' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bb-slider-title' => 'color: {{VALUE}}',
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
                'selector' => '{{WRAPPER}} .bb-slider-content',
            ]
        );
        $this->add_control(
            'content_color',
            [
                'label' => __( 'Text Color', 'resta' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'scheme' => [
                    'type' => \Elementor\Scheme_Color::get_type(),
                    'value' => \Elementor\Scheme_Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .bb-slider-content' => 'color: {{VALUE}}',
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
                'scheme' => [
                    'type' => \Elementor\Scheme_Color::get_type(),
                    'value' => \Elementor\Scheme_Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .bb-slider-btn' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'background',
                'label' => __( 'Background', 'resta' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .bb-slider-btn',
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'border',
                'label' => __( 'Border', 'resta' ),
                'selector' => '{{WRAPPER}} .bb-slider-btn',
            ]
        );
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'button_shadow',
                'label' => __( 'Shadow', 'resta' ),
                'selector' => '{{WRAPPER}} .bb-slider-btn',
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

    protected function render()
    {
        $settings = $this->get_settings_for_display();


            ?>

        <section class="gallery-about m--192">
            <div class="container-fluid no-gutters p-0">
                <div class="row gallery-slider">

                    <figure class="col-lg-3 col-md-4 col-sm-6 p-0 g-item"><a href="img/gallery/gallery1.png"><img
                                src="img/gallery/1.jpg" alt="">
                            <figcaption class="g-overlay">
                                <i class="icofont-search-1"></i>
                            </figcaption>
                        </a>

                    </figure>
                    <figure class="col-lg-3 col-md-4 col-sm-6 p-0 g-item"><a href="img/gallery/2.jpg"><img
                                src="img/gallery/2.jpg" alt="">
                            <figcaption class="g-overlay">
                                <i class="icofont-search-1"></i>
                            </figcaption></a>
                    </figure>
                    <figure class="col-lg-3 col-md-4 col-sm-6 p-0 g-item"><a href="img/gallery/3.jpg"><img
                                src="img/gallery/3.jpg" alt="">   <figcaption class="g-overlay"> <i class="icofont-search-1"></i></figcaption></a>
                    </figure>
                    <figure class="col-lg-3 col-md-4 col-sm-6 p-0 g-item"><a href="img/gallery/4.jpg"><img
                                src="img/gallery/4.jpg" alt=""> <figcaption class="g-overlay"> <i class="icofont-search-1"></i></figcaption> </a>
                    </figure>
                    <figure class="col-lg-3 col-md-4 col-sm-6 p-0 g-item"><a href="img/gallery/5.jpg"><img
                                src="img/gallery/5.jpg" alt=""> <figcaption class="g-overlay"> <i class="icofont-search-1"></i></figcaption> </a>
                    </figure>
                    <figure class="col-lg-3 col-md-4 col-sm-6 p-0 g-item"><a href="img/gallery/6.jpg"><img
                                src="img/gallery/6.jpg" alt=""> <figcaption class="g-overlay"> <i class="icofont-search-1"></i></figcaption></a>
                    </figure>
                    <figure class="col-lg-3 col-md-4 col-sm-6 p-0 g-item"><a href="img/gallery/7.jpg"><img
                                src="img/gallery/7.jpg" alt=""> <figcaption class="g-overlay"> <i class="icofont-search-1"></i></figcaption></a>
                    </figure>
                </div>
            </div>
        </section>
        <?php



    }
}

Plugin::instance()->widgets_manager->register_widget_type( new resta_Gallery() );