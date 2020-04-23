<?php
/**
 * resta
 * Social Widget
 *
 */

class resta_Social extends WP_Widget {

    public function __construct() {
        $widget_ops = array(
            'classname' => 'resta-social-widget',
            'customize_selective_refresh' => true,
        );

        parent::__construct( 'resta-social-widget', __( 'Resta Social', 'resta' ), $widget_ops );
        $this->alt_option_name = 'resta_Social';
    }

    public function widget( $args, $instance )
    {
        if ( !isset( $args['widget_id'] ) ) {
            $args['widget_id'] = $this->id;
        }
        echo esc_attr($args['before_widget']);

        ?>
        <ul class="social-list list-inline">
            <?php do_action( 'resta_social' ); ?>
        </ul>
        <?php

        echo esc_attr($args['after_widget']);
    }
    public function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        return $instance;
    }
    public function form( $instance ) { ?>
        <div class="resta-wrap">
            <h2><?php esc_html_e( 'Social links options in Appearance -> Customize -> Social Media', 'resta' ); ?></h2>
        </div>
        <?php
    }
}