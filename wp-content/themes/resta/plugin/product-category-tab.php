<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Product Category
 *
 * @since 1.0.0
 */

class resta_Product_Category extends Widget_Base {

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
        return 'resta-product-category-tab';
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
        return __( 'Product Tab', 'resta' );
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
        return 'eicon-product-categories';
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
            'resta_category_post_section',
            [
                'label' => __( 'Setting', 'resta' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        // Get Product category
        $cat_ID_array = $this->prepare_cats_for_select();
        $this->add_control(
            'categories',
            [
                'label' => __( 'Product categories', 'resta' ),
                'type' => Controls_Manager::SELECT2,
                'dynamic' => [
                    'active' => true,
                ],
                'options' => $cat_ID_array,
                'label_block' => true,
                'multiple' => true
            ]
        );
        // Limit
        $this->add_control(
            'limit',
            [
                'label' => __( 'Limit', 'resta' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 32,
                'step' => 1,
                'default' => 8,
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'resta_category_STYLE_section',
            [
                'label' => __( 'STYLE', 'resta' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        // Pre Title
        $this->add_control(
            'filter_tab_style',
            [
                'label' => __( 'Filter Tab', 'resta' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        // Text Color
        $this->add_control(
            'filter_tab_text_color',
            [
                'label' => __( 'Text Color', 'resta' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} #filters li .button' => 'color: {{VALUE}}',
                ],
            ]
        );
        // Border Color
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'border',
                'label' => __( 'Border', 'resta' ),
                'selector' => '{{WRAPPER}} #filters li .button',
            ]
        );
        // Title & Content
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => __( 'Typography', 'resta' ),
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} #filters li .button',
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
                'selectors' => [
                    '{{WRAPPER}} #filters li .button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
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
        $limit = $settings['limit'];
        $cat_name_val = '';
        $get_cat_val = $settings['categories'];

        ?>

        <div class="col-12 text-center">
            <?php if( !empty ( $get_cat_val )  ) : ?>
                <ul class="list-inline mb-5" id="filters">
                    <li class="list-inline-item">
                        <button class="button is-checked" data-filter="*"><?php esc_html_e( 'show all', 'resta' ); ?></button>
                    </li>

                    <?php

                    foreach ( $get_cat_val as $value ) {
                        $cat_name = get_term_by( 'id', $value, 'product_cat' );
                        $cat_name_val .= $cat_name->name.',';

                        ?>
                        <li class="list-inline-item">
                            <button class="button" data-filter=".product_cat-<?php echo esc_attr( $cat_name->slug )?>"><?php echo esc_html( $cat_name->name ); ?></button>
                        </li>
                        <?php

                    }
                    $cat_name_val = substr( $cat_name_val, 0, strlen( $cat_name_val )-1 );
                    ?>

                </ul>
            <?php endif; ?>
        </div>
        <?php if( !empty ( $get_cat_val )  ) : ?>
            <div class="product-grid">
                <?php
                echo do_shortcode( '[products class="category-filter" limit="' . absint( $limit ) . '"  columns="2" category="' .esc_html( $cat_name_val ). '"]' );
                ?>
            </div>
        <?php endif;

    }

    /**
     * Prepare posts to be used in the SELECT2 field
     */
    private function prepare_cats_for_select() {

        $orderby = 'name';
        $order = 'asc';
        $hide_empty = false;
        $cat_args = array(
            'orderby'    => $orderby,
            'order'      => $order,
            'hide_empty' => $hide_empty,
        );
        $product_categories = get_terms( 'product_cat', $cat_args );
        $options = ['' => ''];
        if( !empty($product_categories) ){
            foreach ($product_categories as $cat) {
                $options[$cat->term_id] = $cat->name;
            }
        }
        return $options;
    }
}

Plugin::instance()->widgets_manager->register_widget_type( new resta_Product_Category() );