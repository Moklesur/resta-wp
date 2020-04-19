<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Info_Box
 *
 * @since 1.0.0
 */

class resta_Page_Title extends Widget_Base {

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
        return 'resta-Page-Title';
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
        return __( 'Resta Page Title', 'resta' );
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
        return 'fa fa-crown';
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


        // STYLE Settings
        $this->start_controls_section(
            'resta_page_title_style_section',
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
                'selector' => '{{WRAPPER}} h1',
            ]
        );
        $this->add_control(
            'title_color',
            [
                'label' => __( 'Text Color', 'resta' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '232323',
                'selectors' => [
                    '{{WRAPPER}} h1' => 'color: {{VALUE}}',
                ],
            ]
        );
        //Content Style
        $this->add_control(
            'sub_title_style',
            [
                'label' => __( 'Sub Title', 'resta' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'sub_title_typography',
                'label' => __( 'Typography', 'resta' ),
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} h5',
            ]
        );
        $this->add_control(
            'sub_title_color',
            [
                'label' => __( 'Text Color', 'resta' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '78787c',
                'selectors' => [
                    '{{WRAPPER}} h5' => 'color: {{VALUE}}',
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

    protected function render() {
        $settings = $this->get_settings_for_display();

        ?>

        <!--/.inner-banner start-->
        <section class="inner-banner">
            <div class="container">

                <header class="text-center">

                    <?php
                    global $post;
                    if(is_page()){
                        $parent = get_post($post->post_parent);
                        $parent_title = get_the_title($parent);
                        $parent_permalink = get_the_permalink($parent);
                        $grandparent = $parent->post_parent;
                        $grandparent_title = get_the_title($grandparent);
                        $grandparent_permalink = get_the_permalink($grandparent);
                        if ($parent) {
                            if ($grandparent) {
                                ?>
                                <h1 class='text-black mb-20'><?php echo wp_title(' '); ?></h1>
                                <h5 class='text-black'><a href="<?php echo esc_url($grandparent_permalink)?>"><?php echo esc_html($grandparent_title)?></a> <i class='icofont-restaurant text-orange mr-2 ml-2'></i><a href="<?php echo esc_url($parent_permalink)?>"><?php echo esc_html($parent_title)?></a> <i class='icofont-restaurant text-orange mr-2 ml-2'></i> <?php echo wp_title(' '); ?> </h5>
                                <?php

                            }
                            else {
                                echo  "<h1 class='text-black mb-20 '>".esc_html($grandparent_title) . " </h1> ";
                                echo  "<h5> <a href=".esc_url($parent_permalink).">".esc_html($parent_title) ."</a>" . "<i class='icofont-restaurant text-orange mr-2 ml-2'></i> <span
                                class='last text-orange'>".esc_html($grandparent_title) . "</span> </h5> ";
                            }
                        }
                        else {
                            echo wp_title('') . " - ";
                        }
                    }

                    ?>
                </header>
            </div>
        </section>
        <!--/.inner-banner end-->

        <?php
    }

}

Plugin::instance()->widgets_manager->register_widget_type( new resta_Page_Title() );