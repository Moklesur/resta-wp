<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Big_Banner
 *
 * @since 1.0.0
 */

class resta_Big_Banner extends Widget_Base {

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
        return 'resta-Big-Banner';
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
        return __( 'Big Banner', 'resta' );
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
        return 'eicon-banner';
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
            'Big_Banner_section',
            [
                'label' => __( 'Setting', 'resta' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'bg_content_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'contentBg1',
            [
                'label' => __( 'BG Color', 'resta' ),
                'info' => __( 'Image Background Color', 'resta' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ff8938',
                'selectors' => [
                    '{{WRAPPER}} .bb-big-content' => 'background-color: {{VALUE}}',
                ]
            ]
        );
        $this->add_responsive_control(
            'contentHeightWidth1',
            [
                'label' => __( 'Height & Width', 'resta' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 1,
                    ]
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 570,
                ],
                'selectors' => [
                    '{{WRAPPER}} .bb-big-content' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};'
                ],
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __( 'Title', 'resta' ),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Download our company app now and start free trial for 14 days.', 'resta' )
            ]
        );
        $this->add_control(
            'paragraph',
            [
                'label' => __( 'Paragraph', 'resta' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'When trying get new customers keep your visitors attention from people things when they are traveling so makes sense.', 'resta' )
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'Big_Banner_banner_section',
            [
                'label' => __( 'Banner', 'resta' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'banner',
            [
                'label' => __( 'Choose Image', 'resta' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_responsive_control(
            'transformY',
            [
                'label' => __( 'Transform Y', 'resta' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%', 'em' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 500,
                        'step' => 1,
                    ]
                ],
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'desktop_default' => [
                    'size' => 100,
                    'unit' => 'px',
                ],
                'tablet_default' => [
                    'size' => 30,
                    'unit' => 'px',
                ],
                'mobile_default' => [
                    'size' => 30,
                    'unit' => 'px',
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 100,
                ],
                'selectors' => [
                    '{{WRAPPER}} img' => 'transform: translateY( {{SIZE}}{{UNIT}});',
                ],
            ]
        );
        $this->add_control(
            'bg_banner_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'imgBg',
            [
                'label' => __( 'BG Color', 'resta' ),
                'info' => __( 'Image Background Color', 'resta' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ff8938',
                'selectors' => [
                    '{{WRAPPER}} .bb-big-img' => 'background-color: {{VALUE}}',
                ]
            ]
        );
        $this->add_responsive_control(
            'imgHeightWidth',
            [
                'label' => __( 'Height & Width', 'resta' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 1,
                    ]
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 570,
                ],
                'selectors' => [
                    '{{WRAPPER}} .bb-big-img' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};'
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'Big_Banner_button_section',
            [
                'label' => __( 'Buttons', 'resta' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'icon_1',
            [
                'label' => __( 'Icons', 'resta' ),
                'type' => \Elementor\Controls_Manager::ICONS,
            ]
        );
        $this->add_control(
            'btn_txt',
            [
                'label' => __( 'Button Text', 'resta' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Google Play', 'resta' )
            ]
        );
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
        $this->add_control(
            'hr_btn',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'icon_2',
            [
                'label' => __( 'Icons', 'resta' ),
                'type' => \Elementor\Controls_Manager::ICONS,
            ]
        );
        $this->add_control(
            'btn_txt2',
            [
                'label' => __( 'Button Text', 'resta' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'App Store', 'resta' )
            ]
        );
        $this->add_control(
            'btn_url2',
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

        // STYLE Settings
        $this->start_controls_section(
            'info_box_style_section',
            [
                'label' => __( 'Style', 'resta' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'padding',
            [
                'label' => __( 'Padding', 'resta' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'desktop_default' => [
                    'size' => 170,
                    'unit' => 'px',
                ],
                'tablet_default' => [
                    'size' => 30,
                    'unit' => 'px',
                ],
                'mobile_default' => [
                    'size' => 30,
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .bg-banner-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'hr_title',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
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
                'selector' => '{{WRAPPER}} h2',
            ]
        );
        $this->add_control(
            'title_color',
            [
                'label' => __( 'Text Color', 'resta' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} h2' => 'color: {{VALUE}}',
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
                'default' => '#fff1e7',
                'selectors' => [
                    '{{WRAPPER}} p' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();
        // STYLE Settings
        $this->start_controls_section(
            'info_box_style_button_section',
            [
                'label' => __( 'Buttons', 'resta' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        //Button 1 Style
        $this->add_control(
            'btn_color_bg',
            [
                'label' => __( 'BG Color', 'resta' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .g-play' => 'background: {{VALUE}}'
                ],
            ]
        );
        $this->add_control(
            'btn_color',
            [
                'label' => __( 'Color', 'resta' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#232323',
                'selectors' => [
                    '{{WRAPPER}} .g-play' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .g-play i' => 'color: {{VALUE}}'
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'box_shadow',
                'label' => __( 'Box Shadow', 'resta' ),
                'selector' => '{{WRAPPER}} .g-play',
            ]
        );
        //Button 2 Style
        $this->add_control(
            'btn_color_bg_2',
            [
                'label' => __( 'BG Color', 'resta' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ff9b55',
                'selectors' => [
                    '{{WRAPPER}} .apple' => 'background-color: {{VALUE}}'
                ],
            ]
        );
        $this->add_control(
            'btn_color_2',
            [
                'label' => __( 'Color', 'resta' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .apple' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .apple i' => 'color: {{VALUE}}'
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'box_shadow',
                'label' => __( 'Box Shadow', 'resta' ),
                'selector' => '{{WRAPPER}} .apple',
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

        $target2 = $settings['btn_url2']['is_external'] ? ' target="_blank"' : '';
        $nofollow2 = $settings['btn_url2']['nofollow'] ? ' rel="nofollow"' : '';
        ?>
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6 position-relative">
                    <span class="bb-big-content position-absolute"></span>
                    <div class="bg-banner-content position-relative">
                        <h2><?php echo esc_html( $settings['title'] ); ?></h2>
                        <p><?php echo esc_html( $settings['paragraph'] ); ?></p>
                        <div class="two-btn">
                            <a href="<?php echo esc_url( $settings['btn_url']['url'] ); ?>" <?php echo esc_attr( $target ) .' '. esc_attr( $nofollow ); ?> class="btn g-play mt-3 mr-3">
                                <?php \Elementor\Icons_Manager::render_icon( $settings['icon_1'], [ 'aria-hidden' => 'true' ] );
                                echo esc_html( $settings['btn_txt'] ); ?>
                            </a>

                            <a href="<?php echo esc_url( $settings['btn_url2']['url'] ); ?>" <?php echo esc_attr( $target2 ) .' '. esc_attr( $nofollow2 ); ?> class="btn apple mt-3">
                                <?php \Elementor\Icons_Manager::render_icon( $settings['icon_2'], [ 'aria-hidden' => 'true' ] );
                                echo esc_html( $settings['btn_txt2'] ); ?></a>

                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 d-flex align-items-end position-relative">
                    <span class="bb-big-img position-absolute"></span>
                    <img src="<?php echo esc_url( $settings['banner']['url'] ); ?>" class="img-fluid m-auto">
                </div>
            </div>
        </div>
        <?php
    }

}

Plugin::instance()->widgets_manager->register_widget_type( new resta_Big_Banner() );