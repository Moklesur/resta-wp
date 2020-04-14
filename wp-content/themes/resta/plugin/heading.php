<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Heading
 *
 * @since 1.0.0
 */

class resta_Heading extends Widget_Base {

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
        return 'resta_Heading';
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
        return __( 'Heading', 'resta' );
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
        return 'eicon-site-title';
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
            'Heading_section',
            [
                'label' => __( 'Setting', 'resta' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'pre_title',
            [
                'label' => __( 'Pre Title', 'resta' ),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __( 'Title', 'resta' ),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

        $this->end_controls_section();

        // STYLE Settings
        $this->start_controls_section(
            'heading_style_section',
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
        $this->add_control(
            'pre_title_color',
            [
                'label' => __( 'Color', 'resta' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#f96a0e',
                'selectors' => [
                    '{{WRAPPER}} h5' => 'color: {{VALUE}}'
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'pre_title_typography',
                'label' => __( 'Typography', 'resta' ),
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} h5',
            ]
        );
        // Margin
        $this->add_responsive_control(
            'pre_title_margin',
            [
                'label' => __( 'Margin', 'resta' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'desktop_default' => [
                    'size' => 30,
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
                    '{{WRAPPER}} h5' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                'selector' => '{{WRAPPER}} h2',
            ]
        );
        $this->add_control(
            'title_color',
            [
                'label' => __( 'Text Color', 'resta' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000000',
                'selectors' => [
                    '{{WRAPPER}} h2' => 'color: {{VALUE}}',
                ],
            ]
        );
        // Margin
        $this->add_responsive_control(
            'margin',
            [
                'label' => __( 'Margin', 'resta' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'desktop_default' => [
                    'size' => 50,
                    'unit' => 'px',
                ],
                'tablet_default' => [
                    'size' => 50,
                    'unit' => 'px',
                ],
                'mobile_default' => [
                    'size' => 50,
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        //Shape Style


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

        ?>
        <div class="text-center">

            <?php
            if( !empty( esc_html( $settings['pre_title'] ) ) ) : ?>
                <h5 class="text-orange font-weight-light font-playball mb-30"><?php echo esc_html( $settings['pre_title'] ); ?></h5>
            <?php
            endif;

            if( !empty( esc_html( $settings['title'] ) ) ) : ?>
                <h2  class="mb-50 text-black font-weight-extra-bold "><?php echo esc_html( $settings['title'] ); ?></h2>

                <span class="black-title-shape"></span>

            <?php
            endif; ?>
        </div>
        <?php
    }

}

Plugin::instance()->widgets_manager->register_widget_type( new resta_Heading() );