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

class resta_Slideshow extends Widget_Base {

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
        return 'resta-slideshow';
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
        return 'fa fa-sliders-h';
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
            'slideshow_section',
            [
                'label' => __( 'Setting', 'resta' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        // Content width
        $repeater->add_control(
            'SliderWidth',
            [
                'label' => __( 'Content Width', 'resta' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1170,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 650,
                ],
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}}' => 'max-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // Content Alignment
        $repeater->add_control(
            'content_alignment',
            [
                'label' => __( 'Content Alignment', 'resta' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'justify-content-center',
                'options' => [
                    'justify-content-start'  => __( 'Start', 'resta' ),
                    'justify-content-center' => __( 'Middle', 'resta' ),
                    'justify-content-end' => __( 'End', 'resta' )
                ],
            ]
        );

        // Text Alignment
        $repeater->add_control(
            'text_alignment',
            [
                'label' => __( 'Text Alignment', 'resta' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'text-left' => [
                        'title' => __( 'Left', 'resta' ),
                        'icon' => 'fa fa-align-left',
                    ],
                    'text-center' => [
                        'title' => __( 'Center', 'resta' ),
                        'icon' => 'fa fa-align-center',
                    ],
                    'text-right' => [
                        'title' => __( 'Right', 'resta' ),
                        'icon' => 'fa fa-align-right',
                    ],
                ],
                'default' => 'text-center',
                'toggle' => true,
            ]
        );

        // Slider Image
        $repeater->add_control(
            'divImage',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $repeater->add_control(
            'sliderImage',
            [
                'label' => __( 'Choose Slider Image', 'resta' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'description' => __( 'Recommended size of image: 1920x1000 ', 'resta' ),
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        // Title
        $repeater->add_control(
            'divTitle',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $repeater->add_control(
            'title',
            [
                'label' => __( 'Title', 'resta' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Grow your business.', 'resta' ),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'title_animation',
            [
                'label' => __( 'Animation', 'resta' ),
                'type' => \Elementor\Controls_Manager::ANIMATION,
                'prefix_class' => 'animated ',
            ]
        );
        // Content
        $repeater->add_control(
            'divContent',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $repeater->add_control(
            'content',
            [
                'label' => __( 'Content', 'resta' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Having a proper appearance devices tablets more and smartphone can eportant.', 'resta' )
            ]
        );
        $repeater->add_control(
            'content_animation',
            [
                'label' => __( 'Animation', 'resta' ),
                'type' => \Elementor\Controls_Manager::ANIMATION,
                'prefix_class' => 'animated ',
            ]
        );
        // Button
        $repeater->add_control(
            'divButton',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $repeater->add_control(
            'button_label',
            [
                'label' => __( 'Button Label', 'resta' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Get Started', 'resta' )
            ]
        );
        $repeater->add_control(
            'button_url',
            [
                'label' => __( 'Link', 'resta' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __( 'https://www.themetim.com', 'resta' ),
                'show_external' => true,
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );
        $repeater->add_control(
            'button_animation',
            [
                'label' => __( 'Animation', 'resta' ),
                'type' => \Elementor\Controls_Manager::ANIMATION,
                'prefix_class' => 'animated ',
            ]
        );
        // Repeater
        $this->add_control(
            'slider_list',
            [
                'label' => __( 'Add Slider', 'resta' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ title }}}',
            ]
        );

        $this->end_controls_section();

        // Slider Settings

        $this->start_controls_section(
            'slider_settings',
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
            'slideshow_style_section',
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


        if ( $settings['slider_list'] ) {

            $autoplay = 'false';
            if( esc_attr( $settings['autoplay'] ) === 'true' ){
                $autoplay = 'true';
            }
            $fade = 'false';
            if( esc_attr( $settings['fade'] ) === 'true' ){
                $fade = 'true';
            }
            $infinite = 'false';
            if( esc_attr( $settings['infinite'] ) === 'true' ){
                $infinite = 'true';
            }
            $adaptiveHeight = 'false';
            if( esc_attr( $settings['adaptiveHeight'] ) === 'true' ){
                $adaptiveHeight = 'true';
            }
            $arrows = 'false';
            if( esc_attr( $settings['arrows'] ) === 'true' ){
                $arrows = 'true';
            }
            $dot = 'false';
            if( esc_attr( $settings['dot'] ) === 'true' ){
                $dot = 'true';
            }
            $speed = '5000';
            if( esc_attr( $settings['speed']) ){
                $speed = esc_attr( $settings['speed'] );
            }



            ?>
            <div class="bb-slideshow" data-slick='{"autoplay": <?php echo esc_attr( $autoplay );?>, "arrows": <?php echo esc_attr( $arrows ); ?>, "dots": <?php echo esc_attr( $dot ); ?>, "fade": <?php echo esc_attr( $fade ); ?>, "infinite": <?php echo esc_attr( $infinite ); ?>, "speed": <?php echo esc_attr( $speed ); ?>, "adaptiveHeight": <?php echo esc_attr( $adaptiveHeight ); ?> }'>
                <?php

                foreach ( $settings['slider_list'] as $item ) {

                    // Variable
                    $title_animation = $item['title_animation'];
                    $content_animation = $item['content_animation'];
                    $button_animation = $item['button_animation'];
                    $textAlignment = $item['text_alignment'];
                    $contentAlignment = $item['content_alignment'];
                    $sliderImageURL = $item['sliderImage']['url'];
                    $title = $item['title'];
                    $content = $item['content'];
                    $button_label = $item['button_label'];
                    $button_url = $item['button_url']['url'];
                    $target = $settings['website_link']['is_external'] ? ' target="_blank"' : '';
                    $nofollow = $settings['website_link']['nofollow'] ? ' rel="nofollow"' : '';
                    ?>
                    <div class="bb-slideshow-items slideshow-items-<?php echo esc_attr( $item['_id'] ); ?>">
                        <div class="position-relative">

                            <?php
                            if ( ! empty( $sliderImageURL ) ) {
                                ?>
                                <img class="bb-slider-img img-fluid m-auto" src="<?php echo esc_url( $sliderImageURL ); ?>" alt="<?php echo Control_Media::get_image_alt( $item['sliderImage'] ); ?>">
                                <?php
                            }
                            ?>
                            <div class="d-flex <?php echo $sliderImageURL ? ' has-bb-slider-content' : 'bb-slider-content';  ?>">
                                <div class="container d-flex align-items-center <?php esc_attr_e( $contentAlignment . ' ' . $textAlignment ); ?>">
                                    <div class="row">
                                        <div class="col-12 elementor-repeater-item-<?php echo esc_attr( $item['_id'] ); ?>">
                                            <?php
                                            if ( ! empty( $title ) ) {
                                                ?>
                                                <h2 class="bb-slider-title <?php echo esc_attr( $title_animation ); ?>"><?php esc_html_e( $title ); ?></h2>
                                                <?php
                                            }
                                            if ( ! empty( $content ) ) {
                                                ?>
                                                <p class="bb-slider-content animated <?php echo esc_attr( $content_animation ); ?>">
                                                    <?php echo $content; ?>
                                                </p>
                                                <?php
                                            }
                                            if ( ! empty( $button_label ) ) {
                                                ?>
                                                <a class="mt-4 bb-slider-btn btn <?php echo esc_attr( $button_animation ); ?>" href="<?php echo esc_url( $button_url ); ?>" <?php echo $target. ' ' .$nofollow; ?>><?php esc_html_e( $button_label ); ?></a>
                                                <?php

                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
            <?php

        }

    }
}

Plugin::instance()->widgets_manager->register_widget_type( new resta_Slideshow() );