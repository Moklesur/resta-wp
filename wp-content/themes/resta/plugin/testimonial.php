<?php

namespace Elementor;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Support
 *
 * @since 1.0.0
 */
class resta_testimonial extends Widget_Base
{

    /**
     * Get widget name.
     *
     * Retrieve oEmbed widget name.
     *
     * @return string Widget name.
     * @since 1.0.0
     * @access public
     *
     */

    public function get_name()
    {
        return 'resta-testimonial';
    }

    /**
     * Get widget title.
     *
     * Retrieve oEmbed widget title.
     *
     * @return string Widget title.
     * @since 1.0.0
     * @access public
     *
     */

    public function get_title()
    {
        return __('Testimonials', 'resta');
    }

    /**
     * Get widget icon.
     *
     * Retrieve oEmbed widget icon.
     *
     * @return string Widget icon.
     * @since 1.0.0
     * @access public
     *
     */

    public function get_icon()
    {
        return 'fa fa-star-half-alt';
    }

    /**
     * Get widget categories.
     *
     * Retrieve the list of categories the oEmbed widget belongs to.
     *
     * @return array Widget categories.
     * @since 1.0.0
     * @access public
     *
     */

    public function get_categories()
    {
        return ['resta_elementor_categories'];
    }

    /**
     * Register oEmbed widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 1.0.0
     * @access protected
     */

    protected function _register_controls()
    {

        $this->start_controls_section(
            'resta_testimonial_section',
            [
                'label' => __('Setting', 'resta'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // Content width
        $this->add_control(
            'heading_with',
            [
                'label' => __( 'Heading Content Width', 'resta' ),
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
                    'size' => 500,
                ],
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}}' => 'max-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // Text Alignment
        $this->add_control(
            'heading_alignment',
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



        $this->add_control(
            'divider',
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
                'default' => __( 'Our happy customers', 'resta' )
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
                'default' => __( 'What Clients Say About Our Services.', 'resta' )
            ]
        );

        $this->add_control(
            'divider',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );

        $repeater = new \Elementor\Repeater();


        // Text Alignment
        $repeater->add_control(
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

        // Title
        $repeater->add_control(
            'divTitle',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $repeater->add_control(
            'name',
            [
                'label' => __('Name', 'resta'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Kimberli Pounds', 'resta'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'name_animation',
            [
                'label' => __('Animation', 'resta'),
                'type' => \Elementor\Controls_Manager::ANIMATION,
                'prefix_class' => 'animated ',
            ]
        );
        // Content
        $repeater->add_control(
            'divDesignation',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $repeater->add_control(
            'designation',
            [
                'label' => __('Designation', 'resta'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Lead Of Chefs', 'resta'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'designation_animation',
            [
                'label' => __('Designation Animation', 'resta'),
                'type' => \Elementor\Controls_Manager::ANIMATION,
                'prefix_class' => 'animated ',
            ]
        );
        // Content
        $repeater->add_control(
            'divDescription',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $repeater->add_control(
            'description',
            [
                'label' => __('Description', 'resta'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Consectetur adipiscing elit sed eusmes tempor ullamco laboris aliquip commo magna aliqua enim ad minim veniam quis nostrud exercitation ullamconisi ut aliquip ex ea commodo consequ aute irure dolor iluptate .', 'resta')
            ]
        );
        $repeater->add_control(
            'description_animation',
            [
                'label' => __('Animation', 'resta'),
                'type' => \Elementor\Controls_Manager::ANIMATION,
                'prefix_class' => 'animated ',
            ]
        );
        // Review
        $repeater->add_control(
            'divReview',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        // Content Alignment
        $repeater->add_control(
            'client_review',
            [
                'label' => __('Client Review', 'resta'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '3',
                'options' => [
                    '1' => __('1 Star', 'resta'),
                    '2' => __('2 Star', 'resta'),
                    '3' => __('3 Star', 'resta'),
                    '4' => __('4 Star', 'resta'),
                    '5' => __('5 Star', 'resta')
                ],
            ]
        );

        // Repeater
        $this->add_control(
            'testimonial_list',
            [
                'label' => __('Add Testimonial', 'resta'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ name }}}',
            ]
        );

        $this->end_controls_section();

        // Slider Settings

        $this->start_controls_section(
            'slider_settings',
            [
                'label' => __('Slider Settings', 'resta'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        //Autoplay
        $this->add_control(
            'autoplay',
            [
                'label' => __('Autoplay', 'resta'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'resta'),
                'label_off' => __('Hide', 'resta'),
                'return_value' => 'true',
                'default' => 'true',
            ]
        );

        //Infinite
        $this->add_control(
            'infinite',
            [
                'label' => __('Infinite', 'resta'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('True', 'resta'),
                'label_off' => __('False', 'resta'),
                'return_value' => 'true',
                'default' => 'true',
            ]
        );
        //adaptiveHeight
        $this->add_control(
            'adaptiveHeight',
            [
                'label' => __('Adaptive Height', 'resta'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('True', 'resta'),
                'label_off' => __('False', 'resta'),
                'return_value' => 'true',
                'default' => '',
            ]
        );
        //Arrow
        $this->add_control(
            'arrows',
            [
                'label' => __('Arrows', 'resta'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('True', 'resta'),
                'label_off' => __('False', 'resta'),
                'return_value' => 'true',
                'default' => '',
            ]
        );
        //Dot
        $this->add_control(
            'dot',
            [
                'label' => __('Dots', 'resta'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('True', 'resta'),
                'label_off' => __('False', 'resta'),
                'return_value' => 'true',
                'default' => 'true',
            ]
        );

        // speed
        $this->add_control(
            'speed',
            [
                'label' => __('Speed', 'resta'),
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
            'testimonial_style_section',
            [
                'label' => __('Style', 'resta'),
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

        //Name Style
        $this->add_control(
            'name_style',
            [
                'label' => __('Name', 'resta'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'name_typography',
                'label' => __('Typography', 'resta'),
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .client-name',
            ]
        );
        $this->add_control(
            'name_color',
            [
                'label' => __('Text Color', 'resta'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .client-name' => 'color: {{VALUE}}',
                ],
            ]
        );
        //Designation Style
        $this->add_control(
            'designation_style',
            [
                'label' => __('Designation', 'resta'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'designation_typography',
                'label' => __('Typography', 'resta'),
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .designation',
            ]
        );
        $this->add_control(
            'designation_color',
            [
                'label' => __('Text Color', 'resta'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .designation' => 'color: {{VALUE}}',
                ],
            ]
        );
        //Description Style
        $this->add_control(
            'description_style',
            [
                'label' => __('Description', 'resta'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'description_typography',
                'label' => __('Typography', 'resta'),
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .description',
            ]
        );
        $this->add_control(
            'description_color',
            [
                'label' => __('Text Color', 'resta'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'scheme' => [
                    'type' => \Elementor\Scheme_Color::get_type(),
                    'value' => \Elementor\Scheme_Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .description' => 'color: {{VALUE}}',
                ],
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
        if ($settings['testimonial_list']) {

            $autoplay = 'false';
            if (esc_attr($settings['autoplay']) === 'true') {
                $autoplay = 'true';
            }
            $infinite = 'false';
            if (esc_attr($settings['infinite']) === 'true') {
                $infinite = 'true';
            }
            $adaptiveHeight = 'false';
            if (esc_attr($settings['adaptiveHeight']) === 'true') {
                $adaptiveHeight = 'true';
            }
            $arrows = 'false';
            if (esc_attr($settings['arrows']) === 'true') {
                $arrows = 'true';
            }
            $dot = 'false';
            if (esc_attr($settings['dot']) === 'true') {
                $dot = 'true';
            }
            $speed = '5000';
            if (esc_attr($settings['speed'])) {
                $speed = esc_attr($settings['speed']);
            }

            if ($settings['heading_alignment'] === 'text-left'){
                $margin = '0 auto 100px 0';
            }elseif ($settings['heading_alignment'] === 'text-center'){
                $margin = '0 auto 100px auto';
            }else{
                $margin = '0 0 100px auto';
            }


            ?>
            <!--/.testimonials start-->
            <section class="testimonials">
                <div class="container">

                    <header class="testimonial-header <?php echo esc_attr( $settings['heading_alignment'] ); ?>" style="max-width:<?php echo esc_attr( $settings['heading_with']['size'] ); ?>px; margin: <?php echo esc_attr($margin); ?>">

                        <h5 class="font-weight-light font-playball mb-30"><?php echo esc_html( $settings['pretitle'] ); ?></h5>
                        <h1><?php
                            echo wp_kses(
                                $settings['title'],
                                array(
                                    'span' => array()
                                )
                            );
                            ?>
                        </h1>
                    </header>

                    <div class="row testimonial-slider" data-slick='{"autoplay": <?php echo esc_attr( $autoplay );?>, "arrows": <?php echo esc_attr( $arrows ); ?>, "dots": <?php echo esc_attr( $dot ); ?>,"infinite": <?php echo esc_attr( $infinite ); ?>, "speed": <?php echo esc_attr( $speed ); ?>, "adaptiveHeight": <?php echo esc_attr( $adaptiveHeight ); ?> }'>
                        <?php

                        foreach ( $settings['testimonial_list'] as $item ) {
                            $name_animation = $item['name_animation'];
                            $designation_animation = $item['designation_animation'];
                            $description_animation= $item['description_animation'];
                            $textAlignment = $item['text_alignment'];
                            $name = $item['name'];
                            $designation = $item['designation'];
                            $description= $item['description'];
                            $client_review = $item['client_review'];
                            ?>
                            <article class="col-12 testimonial-items-<?php echo esc_attr( $item['_id'] ); ?>">
                                <blockquote class="testimonial-item">
                                    <figure>
                                       <span class="icon">
                                           <img src="<?php echo get_template_directory_uri() . '/img/quote.png' ?>" alt="quote">
                                           <img src="<?php echo get_template_directory_uri() . '/img/quote-hover.png' ?>"
                                                alt="quote">
                                       </span>
                                        <?php
                                        if ( ! empty( $description ) ) {
                                        ?>
                                            <figcaption class="<?php esc_attr_e( $textAlignment ); ?>">
                                                <p class="description animated <?php echo esc_attr( $description_animation ); ?>"> <?php echo esc_html($description); ?></p>
                                            </figcaption>
                                       <?php
                                        }
                                        ?>

                                    </figure>
                                    <footer class="<?php esc_attr_e( $textAlignment ); ?>">
                                        <h4 class="mb-30 client-name animated <?php echo esc_attr( $name_animation ); ?>"><?php esc_html_e( $name); ?></h4>
                                        <aside class="d-flex justify-content-between">
                                            <p class="m-0 designation animated<?php echo esc_attr( $designation_animation ); ?>"><?php esc_html_e( $designation); ?></p>
                                            <ul class="list-inline review">
                                                <?php
                                                $rev =(int)$client_review;
                                                $active_class='';
                                                for ($i=5; $i>=1; $i--){
                                                    if ($i === $rev):
                                                        $active_class='active';
                                                    endif;
                                                    ?>
                                                    <li class="list-inline-item <?php echo $active_class; ?>"><i class="icofont-star"></i></li>
                                              <?php  }
                                                ?>
                                            </ul>
                                        </aside>
                                    </footer>
                                </blockquote>
                            </article>

                            <?php
                        }
                        ?>
                    </div>
                </div>
            </section>
            <!--/.testimonials end-->
            <?php
        }
    }
    protected function _content_template()
    {
    }

}

Plugin::instance()->widgets_manager->register_widget_type(new resta_testimonial());