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
        return __( 'Rest Gallery', 'resta' );
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
        $this->add_control(
            'g_slider_enable',
            [
                'label' => __( 'Gallery Slider Enable', 'resta' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'yes'
            ]
        );
        $repeater = new \Elementor\Repeater();
        // Slider Image
        $repeater->add_control(
            'divImage',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );

        $repeater->add_control(
            'title',
            [
                'label' => __('Gallery Image Title', 'resta'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Pizza', 'resta'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'g_sliderImage',
            [
                'label' => __( 'Choose Slider Image', 'resta' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'description' => __( 'Recommended size of image: 1920x1000 ', 'resta' ),
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        // Repeater
        $this->add_control(
            'gallery_list',
            [
                'label' => __( 'Add New Image', 'resta' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ title }}}',
            ]
        );
        $this->end_controls_section();

        // STYLE Settings
        $this->start_controls_section(
            'resta_gellary_style_section',
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
                'selector' => '{{WRAPPER}} h3',
            ]
        );
        $this->add_control(
            'title_color',
            [
                'label' => __( 'Text Color', 'resta' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} h3' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'title_color',
            [
                'label' => __( 'Background Color', 'resta' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} h3' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        // Slider Settings
        //Title Style
        $this->add_control(
            'slider_style',
            [
                'label' => __( 'Slider Settings', 'resta' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
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
//        echo "<pre>";
//        var_dump($settings);

        if ( $settings['gallery_list'] ) {

            $autoplay = 'false';
            if( esc_attr( $settings['autoplay'] ) === 'true' ){
                $autoplay = 'true';
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
            <section class="resta-gallery">
                <div class="container-fluid no-gutters ">
                    <div class="row <?php echo !empty($settings['g_slider_enable'] === 'yes') ? esc_html('gallery-slider') : null; ?> resta-gallery-grid" data-slick='{"autoplay": <?php echo esc_attr( $autoplay );?>, "arrows": <?php echo esc_attr( $arrows ); ?>, "dots": <?php echo esc_attr( $dot ); ?>, "infinite": <?php echo esc_attr( $infinite ); ?>, "speed": <?php echo esc_attr( $speed ); ?>, "adaptiveHeight": <?php echo esc_attr( $adaptiveHeight ); ?> }'>
            <?php
            foreach ( $settings['gallery_list'] as $item ) {
                $g_sliderImageURL = $item['g_sliderImage']['url'];
                $title = $item['title'];

                ?>
                <figure class="col-lg-3 col-md-4 col-sm-6 p-0 g-item">
                    <a href="<?php echo esc_url($g_sliderImageURL);?>"><img
                                src="<?php echo esc_url($g_sliderImageURL);?>" alt="<?php echo esc_html($title);?>">
                        <figcaption class="g-overlay">
                            <i class="icofont-search-1"></i>
                            <h3 class="g-title"><?php echo esc_html($title);?></h3>
                        </figcaption>
                    </a>
                </figure>

                <?php
            }
            ?>
                    </div>
                </div>
            </section>
            <?php
        }


    }
}

Plugin::instance()->widgets_manager->register_widget_type( new resta_Gallery() );