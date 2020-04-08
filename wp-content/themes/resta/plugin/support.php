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
class resta_support extends Widget_Base
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
        return 'resta-support';
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
        return __('Support Area', 'resta');
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
        return 'fa fa-support';
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
            'resta_support_area_section',
            [
                'label' => __('Setting', 'resta'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
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
            'delivery_image',
            [
                'label' => __('Select Delivery Image', 'resta'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $repeater->add_control(
            'title',
            [
                'label' => __('Title', 'resta'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Fast Delivery', 'resta'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'title_animation',
            [
                'label' => __('Animation', 'resta'),
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
                'label' => __('Content', 'resta'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Classic greek sala barrel aute reprieheat voluptate nulla pariatur.', 'resta')
            ]
        );
        $repeater->add_control(
            'content_animation',
            [
                'label' => __('Animation', 'resta'),
                'type' => \Elementor\Controls_Manager::ANIMATION,
                'prefix_class' => 'animated ',
            ]
        );

        // Repeater
        $this->add_control(
            'support_list',
            [
                'label' => __('Add New Support', 'resta'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ title }}}',
            ]
        );

        $this->end_controls_section();

        // STYLE Settings
        $this->start_controls_section(
            'support_style_section',
            [
                'label' => __('Style', 'resta'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        //Title Style
        $this->add_control(
            'title_style',
            [
                'label' => __('Title', 'resta'),
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
                'selector' => '{{WRAPPER}} .support-title',
            ]
        );
        $this->add_control(
            'title_color',
            [
                'label' => __('Text Color', 'resta'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .support-title' => 'color: {{VALUE}}',
                ],
            ]
        );
        //Content Style
        $this->add_control(
            'content_style',
            [
                'label' => __('Content', 'resta'),
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
                'selector' => '{{WRAPPER}} .support-content',
            ]
        );
        $this->add_control(
            'content_color',
            [
                'label' => __('Text Color', 'resta'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'scheme' => [
                    'type' => \Elementor\Scheme_Color::get_type(),
                    'value' => \Elementor\Scheme_Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .support-content' => 'color: {{VALUE}}',
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
        if (!empty($settings['support_list'])):
        ?>
        <!--/.support-area start-->
        <section class="support-area">
            <div class="container">
                <div class="row no-gutters">
                    <nav class="col-12 p-0">
                        <ul class="list-inline support-list">
                            <?php
                            foreach ($settings['support_list'] as $item) :
                                $delivery_image = $item['delivery_image']['url'];
                                $textAlignment = $item['text_alignment'];
                                $content_animation = $item['content_animation'];
                                $title = $item['title'];
                                $content = $item['content'];
                                $margin = '0 auto 20px auto';
                                if ($textAlignment == 'center'):
                                    $margin = '0 auto 20px auto';
                                    elseif ($textAlignment == 'left'):
                                        $margin = '0 auto 20px 0';
                                    elseif ($textAlignment == 'right'):
                                        $margin = '0 0 20px auto';
                                    endif;
                                ?>
                                <li class="list-inline-item support-item" style="text-align:<?php echo esc_attr_e($textAlignment);?>">
                                    <figure>
                                        <?php
                                        if (!empty($delivery_image)):
                                            ?>
                                            <span class="feature-icon d-block" style="margin:<?php echo esc_attr_e($margin);?>">
                                                 <img src="<?php echo esc_url($delivery_image); ?>" alt="<?php echo esc_html($title); ?>">
                                              </span>
                                        <?php
                                        endif;
                                        if (!empty($title)):
                                            ?>
                                            <figcaption class="animated <?php echo esc_attr( $content_animation ); ?>">
                                                <h5 class="mb-25 font-weight-extra-bold support-title"><?php echo esc_html($title); ?></h5>
                                                <p class="support-content"><?php echo esc_html($content); ?></p>
                                            </figcaption>
                                        <?php
                                        endif;
                                        ?>
                                    </figure>
                                </li>
                            <?php
                            endforeach;
                            ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </section>
        <!--/.support-area end-->
        <?php
     endif;
    }

    protected function _content_template()
    {
    }

}

Plugin::instance()->widgets_manager->register_widget_type(new resta_support());