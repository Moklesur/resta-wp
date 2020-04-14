<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * YouTube_Vide
 *
 * @since 1.0.0
 */

class resta_YouTube_Video extends Widget_Base {

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
        return 'resta-YouTube-Video';
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
        return __( 'YouTube Video', 'resta' );
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
        return 'eicon-youtube';
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
            'YouTube_Video_section',
            [
                'label' => __( 'Setting', 'resta' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'title',
            [
                'label' => __( 'Title', 'resta' ),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Watch This Video Presentation To Know More', 'resta' )
            ]
        );
        $this->add_control(
            'hr_youtube_icon',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
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
            'btn_url',
            [
                'label' => __( 'URL', 'resta' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __( 'www.youtube.com/themetim', 'resta' ),
                'show_external' => true
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

        //Button 1 Style
        $this->add_control(
            'btn_color_bg',
            [
                'label' => __( 'BG Color', 'resta' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#fc802a',
                'selectors' => [
                    '{{WRAPPER}} .bb-youtube-play span' => 'background: {{VALUE}}'
                ],
            ]
        );
        $this->add_control(
            'btn_color',
            [
                'label' => __( 'Color', 'resta' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .bb-youtube-play i' => 'color: {{VALUE}}'
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'box_shadow',
                'label' => __( 'Box Shadow', 'resta' ),
                'selector' => '{{WRAPPER}} .bb-youtube-play span',
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

        ?>

        <div class="bb-youtube-video text-center">
            <?php
            if( !empty( $settings['title']) ) : ?>
                <h2><?php echo esc_html( $settings['title'] ); ?></h2>
            <?php
            endif;

            if( !empty( $settings['btn_url']['url'] ) ): ?>
                <div class="bb-youtube-play mt-4">
                    <span class="youtube-play-btn">
                        <?php \Elementor\Icons_Manager::render_icon( $settings['icon_1'] ); ?>
                    </span>
                </div>
            <?php
            endif; ?>
        </div>
        <?php if( !empty( esc_url( $settings['btn_url']['url'] ) ) ) : ?>
            <div class="youtube-popup">
                <div class="container position-relative">
                    <span class="youtube-close">x</span>
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe id="video-youtube" class="embed-responsive-item" src="<?php echo esc_url( $settings['btn_url']['url'] ); ?>?rel=0" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        <?php
        endif;
    }

}

Plugin::instance()->widgets_manager->register_widget_type( new resta_YouTube_Video() );