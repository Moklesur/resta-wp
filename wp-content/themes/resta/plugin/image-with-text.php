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
class resta_image_with_text extends Widget_Base
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
        return 'resta-image-with-text';
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
        return __('Image With Text', 'resta');
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
        return 'fa fa-file-image-o';
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
            'resta_image_with_text_section',
            [
                'label' => __('Setting', 'resta'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // Content Alignment
        $this->add_control(
            'content_alignment',
            [
                'label' => __( 'Content Alignment', 'resta' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'left',
                'options' => [
                    'left' => __( 'Left', 'resta' ),
                    'right'  => __( 'Right', 'resta' ),
                ],
            ]
        );
        $this->add_control(
            'hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        // Image Banner
        $this->add_control(
            'feature_image',
            [
                'label' => __( 'Feature Image', 'resta' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        // Batch Banner

        $this->add_control(
            'batch_enable',
            [
                'label' => __( 'Batch Enable', 'resta' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'yes'
            ]
        );
        $this->add_control(
            'batch_image',
            [
                'label' => __( 'Batch Image', 'resta' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );

        // Burger Banner

        $this->add_control(
            'burger_enable',
            [
                'label' => __( 'Burger Enable', 'resta' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'yes'
            ]
        );
        $this->add_control(
            'burger_image',
            [
                'label' => __( 'Burger Image', 'resta' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );

        $this->add_control(
            'offer_enable',
            [
                'label' => __( 'Offer Enable', 'resta' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'yes'
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'offer_title',
            [
                'label' => __( 'Offer Title', 'resta' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Beef Burger Meal', 'resta' ),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'offer_url',
            [
                'label' => __( 'offer_url', 'resta' ),
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
        // Repeater
        $this->add_control(
            'offer_list',
            [
                'label' => __( 'Add Offer Item', 'resta' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ offer_title }}}',
            ]
        );

        $this->add_control(
            'hr',
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
                'default' => __( 'Some words about us!', 'resta' )
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
                'default' => __( 'We have 35 years food services experience.', 'resta' )
            ]
        );
        // Paragraph
        $this->add_control(
            'paragraph',
            [
                'label' => __( 'Paragraph', 'resta' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Consectetur adipiscing elit, eiusmod tempor incididunt magna aliqu aenim ad minim veniam nostrud exercitat aliquip commodo consequat.', 'resta' )
            ]
        );
        // Button Text
        $this->add_control(
            'btn_txt',
            [
                'label' => __( 'Button Text', 'resta' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Book a Table', 'resta' )
            ]
        );
        // Button URL
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
        $this->end_controls_section();

        // Style
        $this->start_controls_section(
            'resta_image_with_text_style',
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
                'selector' => '{{WRAPPER}} h2',
            ]
        );
        $this->add_control(
            'title_color',
            [
                'label' => __( 'Text Color', 'resta' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#222222',
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
                'default' => '#989898',
                'selectors' => [
                    '{{WRAPPER}} p' => 'color: {{VALUE}}',
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
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .btn' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'button_bg_color',
            [
                'label' => __( 'background Color', 'resta' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#f96a0e',
                'selectors' => [
                    '{{WRAPPER}} .btn' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'border',
                'label' => __( 'Border', 'resta' ),
                'selector' => '{{WRAPPER}} .btn',
            ]
        );
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'button_shadow',
                'label' => __( 'Shadow', 'resta' ),
                'selector' => '{{WRAPPER}} .btn',
            ]
        );

        //Specila Offer Style
        $this->add_control(
            'offer_style',
            [
                'label' => __( 'Offer Style', 'resta' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'offer_typography',
                'label' => __( 'Typography', 'resta' ),
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .offer',
            ]
        );
        $this->add_control(
            'offer_color',
            [
                'label' => __( 'Text Color', 'resta' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000000',
                'selectors' => [
                    '{{WRAPPER}} .offer' => 'color: {{VALUE}}',
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

        $target = $settings['btn_url']['is_external'] ? ' target="_blank"' : '';
        $nofollow = $settings['btn_url']['nofollow'] ? ' rel="nofollow"' : '';
        $content_alignment = $settings['content_alignment'];
        if ($content_alignment == 'left'){
            $left_class = 'mr-auto order-1';
            $right_class = 'order-2';
        }else{
            $left_class = 'ml-auto order-2';
            $right_class = 'order-1';
        }

            ?>
            <!--/.image-with-text-section start-->
            <section class="image-with-text-section">
                <div class="container">
                    <div class="row align-items-center">

                        <aside class="col-lg-5 col-md-5 col-sm-12 <?php echo esc_html($left_class); ?>">
                            <header>
                                <h5 class="font-playball mb-30"><?php echo esc_html( $settings['pretitle'] ); ?></h5>
                                <h2 class="mb-40"><?php
                                    echo wp_kses(
                                        $settings['title'],
                                        array(
                                            'span' => array()
                                        )
                                    );
                                    ?></h2>
                                <p class="mb-30"><?php echo esc_html( $settings['paragraph'] ) ?></p>

                                <?php
                                if ($settings['offer_enable'] === 'yes' && !empty($settings['offer_list'])):
                                ?>
                                <nav class="mb-40">
                                    <ul class="list-unstyled special-offer">
                                        <?php
                                    foreach ($settings['offer_list'] as $item) :
                                        ?>
                                        <li><a class="offer" href="<?php echo esc_url($item['offer_url']['url']) ?>"><?php echo esc_html($item['offer_title']) ?></a></li>
                                        <?php
                                    endforeach;
                                        ?>
                                    </ul>
                                </nav>
                                    <?php
                                endif;
                                    ?>

                                <a href="<?php echo esc_url( $settings['btn_url']['url'] ); ?>" <?php echo esc_attr( $target ) .' '. esc_attr( $nofollow ); ?>  class="btn"><?php echo esc_html( $settings['btn_txt'] ); ?><i class="icofont-arrow-right ml-5"></i></a>
                            </header>
                        </aside>
                        <article class="col-lg-6 col-md-6 col-sm-12 <?php echo esc_html($right_class); ?>">
                            <figure class="about-us-img">
                                <a href="<?php echo esc_url( $settings['feature_image']['url'] ); ?>" class="d-block"> <img src="<?php echo esc_url( $settings['feature_image']['url'] ); ?>"
                                                                                                                            class="img-fill"
                                                                                                                            alt="about"></a>

                                <?php
                                if ($settings['batch_enable'] === 'yes'):
                                    ?>
                                    <figure class="batch">
                                        <img src="<?php echo esc_url( $settings['batch_image']['url'] ); ?>" alt="batch">
                                    </figure>
                                <?php
                                endif;
                                ?>
                            </figure>

                        </article>
                        <?php
                        if ($settings['burger_enable'] === 'yes'):
                            ?>
                            <figure class="burger-img">
                                <img src="<?php echo esc_url( $settings['burger_image']['url'] ); ?>" alt="burger">
                            </figure>
                        <?php
                        endif;
                        ?>
                    </div>
                </div>

            </section>
            <!--/.image-with-text-section end-->
        <?php

    }

    protected function _content_template()
    {
    }

}

Plugin::instance()->widgets_manager->register_widget_type(new resta_image_with_text());