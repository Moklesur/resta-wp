<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Team
 *
 * @since 1.0.0
 */

class resta_Team extends Widget_Base {

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
        return 'resta-team';
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
        return __( 'Team', 'resta' );
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
        return 'eicon-user-circle-o';
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

    protected function _register_controls()
    {

        $this->start_controls_section(
            'team_section',
            [
                'label' => __('Setting', 'resta'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        // Title
        $repeater->add_control(
            'divTitle',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $repeater->add_control(
            'image',
            [
                'label' => __('Select Staff Image', 'resta'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        // Image
        $repeater->add_control(
            'title',
            [
                'label' => __('Name', 'resta'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Jono', 'resta'),
                'label_block' => true,
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
                'label' => __('Position', 'resta'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'default' => __('Designer', 'resta')
            ]
        );
        // Social Links
        $repeater->add_control(
            'divSocial',
            [
                'label' => __( 'Social Links', 'resta' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        // Social Links 1
        $repeater->add_control(
            'icon1',
            [
                'label' => __( 'Icon', 'text-domain' ),
                'type' => \Elementor\Controls_Manager::ICONS
            ]
        );
        $repeater->add_control(
            'icon_link1',
            [
                'label' => __( 'Link', 'resta' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __( 'https://your-link.com', 'resta' )
            ]
        );
        $repeater->add_control(
            'divlink1',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        // Social Links 2
        $repeater->add_control(
            'icon2',
            [
                'label' => __( 'Icon', 'text-domain' ),
                'type' => \Elementor\Controls_Manager::ICONS
            ]
        );
        $repeater->add_control(
            'icon_link2',
            [
                'label' => __( 'Link', 'resta' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __( 'https://your-link.com', 'resta' )
            ]
        );
        $repeater->add_control(
            'divlink2',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        // Social Links 3
        $repeater->add_control(
            'icon3',
            [
                'label' => __( 'Icon', 'text-domain' ),
                'type' => \Elementor\Controls_Manager::ICONS
            ]
        );
        $repeater->add_control(
            'icon_link3',
            [
                'label' => __( 'Link', 'resta' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __( 'https://your-link.com', 'resta' )
            ]
        );

        // Repeater
        $this->add_control(
            'list',
            [
                'label' => __('Add New Team', 'resta'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ title }}}',
            ]
        );

        $this->end_controls_section();

        // STYLE Settings
        $this->start_controls_section(
            'team_style_section',
            [
                'label' => __('Style', 'resta'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        // Text Alignment
        $this->add_control(
            'text_alignment',
            [
                'label' => __('Text Alignment', 'resta'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'resta'),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'resta'),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => __('Right', 'resta'),
                        'icon' => 'fa fa-align-right',
                    ],
                ],
                'default' => 'center',
                'toggle' => true,
            ]
        );
        // Padding
        $this->add_responsive_control(
            'padding',
            [
                'label' => __( 'Padding', 'resta' ),
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
                    '{{WRAPPER}} .our-team-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        // Border Radius
        $this->add_responsive_control(
            'team_container_border_radius',
            [
                'label' => __( 'Border Radius', 'resta' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'desktop_default' => [
                    'size' => 20,
                    'unit' => 'px',
                ],
                'tablet_default' => [
                    'size' => 20,
                    'unit' => 'px',
                ],
                'mobile_default' => [
                    'size' => 20,
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .chef-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        //Image Style
        $this->add_control(
            'image_style',
            [
                'label' => __('Image', 'resta'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        // Image Dimension
        $this->add_control(
            'image_dimension',
            [
                'label' => __( 'Image Dimension', 'resta' ),
                'type' => \Elementor\Controls_Manager::IMAGE_DIMENSIONS,
                'description' => __( 'Crop the original image size to any custom size. Set custom width or height to keep the original size ratio.', 'plugin-name' ),
                'default' => [
                    'width' => '158',
                    'height' => '158',
                ],
            ]
        );
        // Border Radius
        $this->add_responsive_control(
            'team_border_radius',
            [
                'label' => __( 'Border Radius', 'resta' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'desktop_default' => [
                    'size' => 50,
                    'unit' => '%',
                ],
                'tablet_default' => [
                    'size' => 50,
                    'unit' => '%',
                ],
                'mobile_default' => [
                    'size' => 50,
                    'unit' => '%',
                ],
                'selectors' => [
                    '{{WRAPPER}} .chef-profile img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        //Title Style
        $this->add_control(
            'title_style',
            [
                'label' => __('Name', 'resta'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => __('Typography', 'resta'),
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} h4',
            ]
        );
        $this->add_control(
            'title_color',
            [
                'label' => __('Text Color', 'resta'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#222222',
                'selectors' => [
                    '{{WRAPPER}} h4' => 'color: {{VALUE}}',
                ],
            ]
        );
        //Content Style
        $this->add_control(
            'content_style',
            [
                'label' => __('Position', 'resta'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'content_typography',
                'label' => __('Typography', 'resta'),
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} p',
            ]
        );
        $this->add_control(
            'content_color',
            [
                'label' => __('Text Color', 'resta'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#626262',
                'selectors' => [
                    '{{WRAPPER}} p' => 'color: {{VALUE}}',
                ],
            ]
        );
        //Icon Style
        $this->add_control(
            'icon_style',
            [
                'label' => __('Icons', 'resta'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'icon_color',
            [
                'label' => __('Color', 'resta'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#222222',
                'selectors' => [
                    '{{WRAPPER}} i' => 'color: {{VALUE}}',
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

        if ( $settings['list'] ) {
            ?>
            <div class="chefs">
                <div class="maker-slider">
                    <?php
                    foreach ( $settings['list'] as $item ) {
                        ?>

                        <article class="col-12 col-lg-12">
                            <div class="chef-item text-<?php echo esc_attr( $settings['text_alignment'] ); ?>">
                                <?php
                                if ( ! empty( $item['image']['url'] ) ) {
                                    ?>
                                    <figure class="chef-profile">
                                        <img width="<?php echo esc_attr( $settings['image_dimension']['width'] ); ?>" height="<?php echo esc_attr( $settings['image_dimension']['height'] ); ?>"  class="img-circle m-auto" src="<?php echo esc_url( $item['image']['url'] ); ?>" alt="<?php echo Control_Media::get_image_alt( $item['sliderImage'] ); ?>">
                                    </figure>
                                    <?php
                                }
                                ?>
                                <?php
                                if ( ! empty( $item['title'] ) ) {
                                    ?>
                                    <h4 class="mb-30"><?php echo esc_html( $item['title'] ); ?></h4>
                                    <?php
                                }
                                ?>
                                <?php
                                if ( ! empty( $item['content'] ) ) {
                                    ?>
                                    <p class="mb-20"><?php echo esc_html( $item['content'] ); ?></p>
                                    <?php
                                }
                                ?>
                                <ul class="list-inline social-list">
                                    <?php
                                    if ( ! empty( $item['icon_link1']['url'] ) ) {
                                        ?>
                                        <li class="list-inline-item">
                                            <a href="<?php echo esc_url( $item['icon_link1']['url'] ); ?>">
                                                <?php \Elementor\Icons_Manager::render_icon( $item['icon1'], [ 'aria-hidden' => 'true' ] ); ?>
                                            </a>
                                        </li>
                                        <?php
                                    }
                                    ?>
                                    <?php
                                    if ( ! empty( $item['icon_link2']['url'] ) ) {
                                        ?>
                                        <li class="list-inline-item">
                                            <a href="<?php echo esc_url( $item['icon_link2']['url'] ); ?>">
                                                <?php \Elementor\Icons_Manager::render_icon( $item['icon2'], [ 'aria-hidden' => 'true' ] ); ?>
                                            </a>
                                        </li>
                                        <?php
                                    }
                                    ?>
                                    <?php
                                    if ( ! empty( $item['icon_link3']['url'] ) ) {
                                        ?>
                                        <li class="list-inline-item">
                                            <a href="<?php echo esc_url( $item['icon_link3']['url'] ); ?>">
                                                <?php \Elementor\Icons_Manager::render_icon( $item['icon3'], [ 'aria-hidden' => 'true' ] ); ?>
                                            </a>
                                        </li>
                                        <?php
                                    }
                                    ?>
                                </ul>
                            </div>
                        </article>

                        <?php
                    }
                    ?>
                </div>
            </div>
            <?php
        }

    }
}

Plugin::instance()->widgets_manager->register_widget_type( new resta_Team() );