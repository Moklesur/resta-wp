<?php
/**
 * resta Customizer.
 *
 * @package resta
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function resta_customize_register( $wp_customize ) {
    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
    $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
    $wp_customize->get_section( 'title_tagline' )->title = __('Header', 'resta');

    /**
     * Class resta Divider
     */
    class resta_divider extends WP_Customize_Control {
        public $type = 'divider';
        public $label = '';
        public function render_content() { ?>
            <h3 style="margin-top:15px; margin-bottom:0;background:#f96a0e;padding:9px 5px;color:#fff;text-transform:uppercase; text-align: center;letter-spacing: 2px;"><?php echo esc_html( $this->label ); ?></h3>
            <?php
        }
    }

    /*********************************************
     * General
     *********************************************/
    $wp_customize->add_setting('resta_options[divider]', array(
            'type'              => 'divider_control',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_attr',
        )
    );
    $wp_customize->add_panel( 'general_settings_panel', array(
        'title' => __( 'General Settings', 'resta' ),
        'priority' => 10
    ) );

    /********************* Sections ************************/

    $wp_customize->add_section( 'background_image', array(
        'title'          => __( 'Body Background Image', 'resta' ),
        'theme_supports' => 'custom-background',
        'panel' => 'general_settings_panel',
        'priority'       => 20
    ) );

    $wp_customize->add_section( 'site_width', array(
        'title'          => __( 'Site Width', 'resta' ),
        'panel' => 'general_settings_panel',
        'priority'       => 10
    ) );

    /********************* Site Layout ************************/

    $wp_customize->add_setting(
        'site_layout',
        array(
            'default'           => 'wide',
            'sanitize_callback' => 'resta_layout_sanitize',
        )
    );
    $wp_customize->add_control(
        'site_layout',
        array(
            'type'        => 'radio',
            'label'       => __( 'Site Layout', 'resta' ),
            'priority'       => 10,
            'section'     => 'site_width',
            'choices' => array(
                'wide'    => __( 'Wide', 'resta' ),
                'boxed'     => __( 'Boxed', 'resta' )
            ),
        )
    );

    /*********************************************
     * Header
     *********************************************/

    /**
     * resta Divider
     */

    $wp_customize->add_control( new resta_divider( $wp_customize, 'header_logo', array(
            'label' => __('Logo', 'resta'),
            'section' => 'title_tagline',
            'settings' => 'resta_options[divider]',
            'priority'      => 5
        ) )
    );
    $wp_customize->add_control( new resta_divider( $wp_customize, 'header_favicon', array(
            'label' => __('Favicon', 'resta'),
            'section' => 'title_tagline',
            'settings' => 'resta_options[divider]',
            'priority'      => 50
        ) )
    );

    $wp_customize->add_panel( 'header_panel', array(
        'title' => __( 'Header', 'resta' ),
        'priority' => 20
    ) );

    /********************* Sections ************************/

    $wp_customize->add_section( 'header_general_settings', array(
        'title'          => __( 'General Settings', 'resta' ),
        'panel' => 'header_panel',
        'priority'       => 5
    ) );

    $wp_customize->add_section( 'header_top_bar', array(
        'title'          => __( 'Top Bar', 'resta' ),
        'panel' => 'header_panel',
        'priority'       => 10
    ) );

    $wp_customize->add_section( 'title_tagline', array(
        'title'          => __( 'Logo & Favicon', 'resta' ),
        'panel' => 'header_panel',
        'priority'       => 15
    ) );

    $wp_customize->add_section( 'header_design', array(
        'title'          => __( 'Header Design Options', 'resta' ),
        'panel' => 'header_panel',
        'priority'       => 20
    ) );

    $wp_customize->add_section( 'menu_design', array(
        'title'          => __( 'Menu Design', 'resta' ),
        'panel' => 'header_panel',
        'priority'       => 25
    ) );

    $wp_customize->add_section( 'header_image', array(
        'title'          => __( 'Hero Area', 'resta' ),
        'panel' => 'header_panel',
        'priority'       => 30
    ) );

    /********************* Header General Settings ************************/

    // Sticky Header
    $wp_customize->add_setting( 'enable_sticky_header', array(
        'default'           => false,
        'sanitize_callback' => 'resta_sanitize_checkbox',
    ) );
    $wp_customize->add_control( 'enable_sticky_header', array(
        'label' => __( 'Enable Sticky Header?', 'resta' ),
        'type' => 'checkbox',
        'section' => 'header_general_settings'
    ) );
    // Woocommerce Icon
    if ( class_exists( 'WooCommerce' ) ) {
        $wp_customize->add_setting( 'enable_woo_cart', array(
            'default'           => false,
            'sanitize_callback' => 'resta_sanitize_checkbox',
        ) );
        $wp_customize->add_control( 'enable_woo_cart', array(
            'label' => __( 'Enable WooCommerce Cart Icon?', 'resta' ),
            'type' => 'checkbox',
            'section' => 'header_general_settings'
        ) );
    }
    // Divider
    $wp_customize->add_control( new resta_divider( $wp_customize, 'header_custom_button', array(
            'label' => __('Custom Button', 'resta'),
            'section' => 'header_general_settings',
            'settings' => 'resta_options[divider]'
        ) )
    );
    // Custom Button Label
    $wp_customize->add_setting('custom_nav_title', array(
        'default' => '',
        'sanitize_callback' => 'resta_sanitize_checkbox',
    ));
    $wp_customize->add_control('custom_nav_title', array(
        'label' => __('Button Text', 'resta'),
        'type' => 'text',
        'section' => 'header_general_settings'
    ));
    // Custom Button Link
    $wp_customize->add_setting( 'custom_nav_link', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'custom_nav_link', array(
        'label' => __( 'Button URL', 'resta' ),
        'type' => 'url',
        'section' => 'header_general_settings',
    ) );

    /********************* Site Title and Tagline Color ************************/
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'header_textcolor',
            array(
                'label'         => __('Site Title and Tagline Color', 'resta'),
                'section'       => 'title_tagline'
            )
        )
    );

    /********************* Header Design Option ************************/

    // Header BG Color
    $wp_customize->add_setting(
        'header_bg_color',
        array(
            'default'           => '#000000',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'header_bg_color',
            array(
                'label'         => __('Background Color', 'resta'),
                'section'       => 'header_design',
                'settings'      => 'header_bg_color'
            )
        )
    );
    // Header Text Color
    $wp_customize->add_setting(
        'header_text_color',
        array(
            'default'           => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'header_text_color',
            array(
                'label'         => __('Text Color', 'resta'),
                'section'       => 'header_design'
            )
        )
    );

    $wp_customize->add_setting(
        'header_border_color',
        array(
            'default'           => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'header_border_color',
            array(
                'label'         => __('Border Color', 'resta'),
                'section'       => 'header_design'
            )
        )
    );

    $wp_customize->add_setting(
        'header_border_style',
        array(
            'default'           => 'none',
            'sanitize_callback' => 'resta_border_style_sanitize',
        )
    );
    $wp_customize->add_control(
        'header_border_style',
        array(
            'type'        => 'select',
            'label'       => __( 'Header Border style', 'resta' ),
            'section'     => 'header_design',
            'choices' => array(
                'none'    => __( 'none', 'resta' ),
                'dotted'     => __( 'dotted', 'resta' ),
                'dashed'     => __( 'dashed', 'resta' ),
                'solid'     => __( 'solid', 'resta' ),
                'double'     => __( 'double', 'resta' ),
                'groove'     => __( 'groove', 'resta' ),
                'ridge'     => __( 'ridge', 'resta' )
            ),
        )
    );

    $wp_customize->add_setting( 'header_border_size', array(
        'default'           => '1',
        'sanitize_callback' => 'absint',
    ) );
    $wp_customize->add_control( 'header_border_size', array(
        'label' => __( 'Header Border Size', 'resta' ),
        'type' => 'number',
        'section' => 'header_design'
    ) );

    $wp_customize->add_setting( 'header_top_padding', array(
        'default'           => 0,
        'sanitize_callback' => 'absint',
    ) );
    $wp_customize->add_control( 'header_top_padding', array(
        'label' => __( 'Header Padding Top', 'resta' ),
        'type' => 'number',
        'section' => 'header_design'
    ) );

    $wp_customize->add_setting( 'header_bottom_padding', array(
        'default'           => 0,
        'sanitize_callback' => 'absint',
    ) );
    $wp_customize->add_control( 'header_bottom_padding', array(
        'label' => __( 'Header Padding Bottom', 'resta' ),
        'type' => 'number',
        'section' => 'header_design'
    ) );


    /********************* Top Bar ************************/
    
    // Enable Top Bar
    $wp_customize->add_setting( 'enable_top_bar', array(
        'default'           => false,
        'sanitize_callback' => 'resta_sanitize_checkbox',
    ) );
    $wp_customize->add_control( 'enable_top_bar', array(
        'label' => __( 'Enable Top Bar?', 'resta' ),
        'type' => 'checkbox',
        'section' => 'header_top_bar'
    ) );

    // Background Color
    $wp_customize->add_setting(
        'top_bar_bg',
        array(
            'default'           => 'transparent',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'top_bar_bg',
            array(
                'label'         => __('Background Color', 'resta'),
                'section'       => 'header_top_bar'
            )
        )
    );
    // Text Color
    $wp_customize->add_setting(
        'top_bar_text_color',
        array(
            'default'           => '#fff',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'top_bar_text_color',
            array(
                'label'         => __('Text Color', 'resta'),
                'section'       => 'header_top_bar'
            )
        )
    );
    // Icon Color
    $wp_customize->add_setting(
        'top_bar_icon_color',
        array(
            'default'           => '#f96a0e',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'top_bar_icon_color',
            array(
                'label'         => __('Icon Color', 'resta'),
                'section'       => 'header_top_bar'
            )
        )
    );
    // Divider
    $wp_customize->add_control( new resta_divider( $wp_customize, 'header_top_bar_1', array(
            'label' => __( 'Left Content', 'resta' ),
            'section' => 'header_top_bar',
            'settings' => 'resta_options[divider]'
        ) )
    );
    // Icon 1
    $wp_customize->add_setting( 'header_top_bar_icon_1', array(
        'default'           => '',
        'sanitize_callback' => 'resta_sanitize_text',
    ) );
    $wp_customize->add_control( 'header_top_bar_icon_1', array(
        'label' => __( 'Icon 1', 'resta' ),
        'type' => 'text',
        'section' => 'header_top_bar',
        'input_attrs' => array(
            'placeholder' => __( 'icofont-clock-time', 'resta' ),
        ),
        'description' => __( 'Add icon class from https://icofont.com/icons', 'resta' )
    ) );
    // Content 1
    $wp_customize->add_setting( 'header_top_bar_content_1', array(
        'default'           => '',
        'sanitize_callback' => 'resta_sanitize_text',
    ) );
    $wp_customize->add_control( 'header_top_bar_content_1', array(
        'label' => __( 'Content 1', 'resta' ),
        'type' => 'text',
        'section' => 'header_top_bar'
    ) );
    // Icon 2
    $wp_customize->add_setting( 'header_top_bar_icon_2', array(
        'default'           => '',
        'sanitize_callback' => 'resta_sanitize_text',
    ) );
    $wp_customize->add_control( 'header_top_bar_icon_2', array(
        'label' => __( 'Icon 2', 'resta' ),
        'type' => 'text',
        'section' => 'header_top_bar',
        'input_attrs' => array(
            'placeholder' => __( 'icofont-clock-time', 'resta' ),
        ),
        'description' => __( 'Add icon class from https://icofont.com/icons', 'resta' )
    ) );
    // Content 1
    $wp_customize->add_setting( 'header_top_bar_content_2', array(
        'default'           => '',
        'sanitize_callback' => 'resta_sanitize_text',
    ) );
    $wp_customize->add_control( 'header_top_bar_content_2', array(
        'label' => __( 'Content 2', 'resta' ),
        'type' => 'text',
        'section' => 'header_top_bar'
    ) );
    // Divider
    $wp_customize->add_control( new resta_divider( $wp_customize, 'header_top_bar_2', array(
            'label' => __( 'Right Content', 'resta' ),
            'section' => 'header_top_bar',
            'settings' => 'resta_options[divider]'
        ) )
    );
    // Icon 1
    $wp_customize->add_setting( 'header_top_bar_icon_3', array(
        'default'           => '',
        'sanitize_callback' => 'resta_sanitize_text',
    ) );
    $wp_customize->add_control( 'header_top_bar_icon_3', array(
        'label' => __( 'Icon 1', 'resta' ),
        'type' => 'text',
        'section' => 'header_top_bar',
        'input_attrs' => array(
            'placeholder' => __( 'icofont-clock-time', 'resta' ),
        ),
        'description' => __( 'Add icon class from https://icofont.com/icons', 'resta' )
    ) );
    // Content 2
    $wp_customize->add_setting( 'header_top_bar_content_3', array(
        'default'           => '',
        'sanitize_callback' => 'resta_sanitize_text',
    ) );
    $wp_customize->add_control( 'header_top_bar_content_3', array(
        'label' => __( 'Content 1', 'resta' ),
        'type' => 'text',
        'section' => 'header_top_bar'
    ) );
    // Icon 2
    $wp_customize->add_setting( 'header_top_bar_icon_4', array(
        'default'           => '',
        'sanitize_callback' => 'resta_sanitize_text',
    ) );
    $wp_customize->add_control( 'header_top_bar_icon_4', array(
        'label' => __( 'Icon 2', 'resta' ),
        'type' => 'text',
        'section' => 'header_top_bar',
        'input_attrs' => array(
            'placeholder' => __( 'icofont-clock-time', 'resta' ),
        ),
        'description' => __( 'Add icon class from https://icofont.com/icons', 'resta' )
    ) );
    // Content 2
    $wp_customize->add_setting( 'header_top_bar_content_4', array(
        'default'           => '',
        'sanitize_callback' => 'resta_sanitize_text',
    ) );
    $wp_customize->add_control( 'header_top_bar_content_4', array(
        'label' => __( 'Content 2', 'resta' ),
        'type' => 'text',
        'section' => 'header_top_bar'
    ) );

    /********************* Menu Design ************************/
    $wp_customize->add_setting(
        'menu_layout',
        array(
            'default'           => 'wide',
            'sanitize_callback' => 'resta_layout_sanitize',
        )
    );
    $wp_customize->add_control(
        'menu_layout',
        array(
            'type'        => 'radio',
            'label'       => __( 'Menu Layout', 'resta' ),
            'section'     => 'menu_design',
            'choices' => array(
                'wide'    => __( 'default', 'resta' )
            ),
        )
    );

    $wp_customize->add_setting(
        'menu_color',
        array(
            'default'           => '#fff',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'menu_color',
            array(
                'label'         => __('Menu Text Color', 'resta'),
                'section'       => 'menu_design'
            )
        )
    );

    $wp_customize->add_setting( 'menu_font_size', array(
        'default'           => 14,
        'sanitize_callback' => 'absint',
    ) );
    $wp_customize->add_control( 'menu_font_size', array(
        'label' => __( 'Menu Item Font Size', 'resta' ),
        'type' => 'number',
        'section' => 'menu_design'
    ) );

    $wp_customize->add_setting( 'menu_font_weight', array(
        'default'           => 400,
        'sanitize_callback' => 'absint',
    ) );
    $wp_customize->add_control( 'menu_font_weight', array(
        'label' => __( 'Menu Item Font Weight', 'resta' ),
        'type' => 'number',
        'section' => 'menu_design'
    ) );
    // Padding Top/Bottom
    $wp_customize->add_setting( 'menu_top_bottom_padding', array(
        'default'           => 30,
        'sanitize_callback' => 'absint',
    ) );
    $wp_customize->add_control( 'menu_top_bottom_padding', array(
        'label' => __( 'Padding Top/Bottom', 'resta' ),
        'type' => 'number',
        'section' => 'menu_design'
    ) );
    // Padding Left/Right
    $wp_customize->add_setting( 'menu_left_right_padding', array(
        'default'           => 15,
        'sanitize_callback' => 'absint',
    ) );
    $wp_customize->add_control( 'menu_left_right_padding', array(
        'label' => __( 'Padding Left/Right', 'resta' ),
        'type' => 'number',
        'section' => 'menu_design'
    ) );

    /********************* Header Banner Image with content ************************/
    $wp_customize->add_setting( 'enable_hero_area', array(
        'default'           => '',
        'sanitize_callback' => 'resta_sanitize_checkbox',
    ) );
    $wp_customize->add_control( 'enable_hero_area', array(
        'label' => __( 'Show/Hide Hero Area', 'resta' ),
        'type' => 'checkbox',
        'section' => 'header_image',
        'priority'       => 5
    ) );

    $wp_customize->add_setting(
        'header_banner_bg',
        array(
            'default'           => '#1488cc',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'header_banner_bg',
            array(
                'label'         => __('Hero Area Background Color', 'resta'),
                'section'       => 'header_image',
                'priority'       => 10
            )
        )
    );

    $wp_customize->add_setting( 'header_banner_heading', array(
        'default'           => '',
        'sanitize_callback' => 'resta_sanitize_text',
    ) );
    $wp_customize->add_control( 'header_banner_heading', array(
        'label' => __( 'Hero Area Heading', 'resta' ),
        'type' => 'text',
        'section' => 'header_image',
        'priority'       => 10
    ) );

    $wp_customize->add_setting(
        'hero_area_heading_color',
        array(
            'default'           => '#fff',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'hero_area_heading_color',
            array(
                'label'         => __('Heading Font Color', 'resta'),
                'section'       => 'header_image',
                'priority'       => 10
            )
        )
    );

    $wp_customize->add_setting( 'header_banner_text', array(
        'default'           => '',
        'sanitize_callback' => 'resta_sanitize_text',
    ) );
    $wp_customize->add_control( 'header_banner_text', array(
        'label' => __( 'Hero Area Paragraph', 'resta' ),
        'type' => 'textarea',
        'section' => 'header_image',
        'priority'       => 10
    ) );

    $wp_customize->add_setting(
        'header_banner_text_color',
        array(
            'default'           => '#fff',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'header_banner_text_color',
            array(
                'label'         => __('Paragraph Font Color', 'resta'),
                'section'       => 'header_image',
                'priority'       => 10
            )
        )
    );

    $wp_customize->add_setting( 'header_banner_button_text', array(
        'default'           => '',
        'sanitize_callback' => 'resta_sanitize_text',
    ) );
    $wp_customize->add_control( 'header_banner_button_text', array(
        'label' => __( 'Hero Area Button Text', 'resta' ),
        'type' => 'text',
        'section' => 'header_image',
        'priority'       => 10
    ) );

    $wp_customize->add_setting( 'header_banner_button_link', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'header_banner_button_link', array(
        'label' => __( 'Button URL', 'resta' ),
        'type' => 'url',
        'section' => 'header_image',
        'priority'       => 10
    ) );

    $wp_customize->add_setting(
        'header_banner_btn_bg_color',
        array(
            'default'           => '#fff',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'header_banner_btn_bg_color',
            array(
                'label'         => __('Button Background Color', 'resta'),
                'section'       => 'header_image'
            )
        )
    );

    $wp_customize->add_setting(
        'header_banner_btn_txt_color',
        array(
            'default'           => '#717171',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'header_banner_btn_txt_color',
            array(
                'label'         => __('Button Text Color', 'resta'),
                'section'       => 'header_image'
            )
        )
    );

    /*********************************************
     * Social Links
     *********************************************/
    $wp_customize->add_section( 'social_settings', array(
        'title' => __( 'Social Media', 'resta' ),
        'priority' => 60,
    ) );

    /********************* Social ************************/
    $wp_customize->add_setting( 'header_fb', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'header_fb', array(
        'label' => __( 'Facebook', 'resta' ),
        'type' => 'url',
        'section' => 'social_settings',
        'settings' => 'header_fb'
    ) );
    $wp_customize->add_setting( 'header_tw', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'header_tw', array(
        'label' => __( 'Twitter', 'resta' ),
        'type' => 'url',
        'section' => 'social_settings',
        'settings' => 'header_tw'
    ) );
    $wp_customize->add_setting( 'header_li', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'header_li', array(
        'label' => __( 'Linkedin', 'resta' ),
        'type' => 'url',
        'section' => 'social_settings',
        'settings' => 'header_li'
    ) );
    $wp_customize->add_setting( 'header_pint', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'header_pint', array(
        'label' => __( 'Pinterest', 'resta' ),
        'type' => 'url',
        'section' => 'social_settings',
        'settings' => 'header_pint'
    ) );
    $wp_customize->add_setting( 'header_ins', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'header_ins', array(
        'label' => __( 'Instagram', 'resta' ),
        'type' => 'url',
        'section' => 'social_settings',
        'settings' => 'header_ins'
    ) );
    $wp_customize->add_setting( 'header_dri', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'header_dri', array(
        'label' => __( 'Dribbble', 'resta' ),
        'type' => 'url',
        'section' => 'social_settings',
        'settings' => 'header_dri'
    ) );
    $wp_customize->add_setting( 'header_plus', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'header_plus', array(
        'label' => __( 'Plus Google', 'resta' ),
        'type' => 'url',
        'section' => 'social_settings',
        'settings' => 'header_plus'
    ) );
    $wp_customize->add_setting( 'header_you', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'header_you', array(
        'label' => __( 'YouTube', 'resta' ),
        'type' => 'url',
        'section' => 'social_settings',
        'settings' => 'header_you'
    ) );

    /*********************************************
     * Blog
     *********************************************/

    $wp_customize->add_panel( 'blog_panel', array(
        'title' => __( 'Blog', 'resta' ),
        'priority' => 85
    ) );

    /********************* Sections ************************/

    $wp_customize->add_section( 'blog_layout_settings', array(
        'title'          => __( 'Blog Layout', 'resta' ),
        'panel' => 'blog_panel',
        'priority'       => 10
    ) );

    $wp_customize->add_section( 'blog_meta', array(
        'title'          => __( 'Post Meta', 'resta' ),
        'panel' => 'blog_panel',
        'priority'       => 20
    ) );

    $wp_customize->add_section( 'blog_content_excerpt', array(
        'title'          => __( 'Post Excerpts', 'resta' ),
        'panel' => 'blog_panel',
        'priority'       => 30
    ) );

    $wp_customize->add_section( 'blog_featured_image', array(
        'title'          => __( 'Featured Image', 'resta' ),
        'panel' => 'blog_panel',
        'priority'       => 40
    ) );

    /********************* Blog Layout ************************/
    $wp_customize->add_setting(
        'blog_layout',
        array(
            'default'           => 'default',
            'sanitize_callback' => 'resta_blog_layout_sanitize',
        )
    );
    $wp_customize->add_control(
        'blog_layout',
        array(
            'type'        => 'radio',
            'label'       => __( 'Blog Layout', 'resta' ),
            'priority'       => 10,
            'section'     => 'blog_layout_settings',
            'choices' => array(
                'default'    => __( 'Default ( Sidebar )', 'resta' ),
                'blog-wide'     => __( 'Full Width', 'resta' ),
                'masonry'     => __( 'Masonry ( Two Columns )', 'resta' )
            ),
        )
    );
    /********************* Blog Meta ************************/
    $wp_customize->add_setting( 'meta_index_enable', array(
        'default'           => '',
        'sanitize_callback' => 'resta_sanitize_checkbox',
    ) );
    $wp_customize->add_control( 'meta_index_enable', array(
        'label' => __( 'Show/Hide Blog Posts Meta', 'resta' ),
        'type' => 'checkbox',
        'section' => 'blog_meta',
        'priority'       => 20
    ) );

    $wp_customize->add_setting( 'meta_single_enable', array(
        'default'           => '',
        'sanitize_callback' => 'resta_sanitize_checkbox',
    ) );
    $wp_customize->add_control( 'meta_single_enable', array(
        'label' => __( 'Show/Hide Single Posts Meta', 'resta' ),
        'type' => 'checkbox',
        'section' => 'blog_meta',
        'priority'       => 20
    ) );
    /********************* Excerpt length ************************/
    $wp_customize->add_setting( 'excerpt_content_enable', array(
        'default'           => '',
        'sanitize_callback' => 'resta_sanitize_checkbox',
    ) );
    $wp_customize->add_control( 'excerpt_content_enable', array(
        'label' => __( 'Show/Hide Post Excerpts', 'resta' ),
        'type' => 'checkbox',
        'section' => 'blog_content_excerpt'
    ) );
    $wp_customize->add_setting( 'excerpt_lenght', array(
        'default'           => '45',
        'sanitize_callback' => 'absint',
    ) );
    $wp_customize->add_control( 'excerpt_lenght', array(
        'type'        => 'number',
        'section'     => 'blog_content_excerpt',
        'settings' => 'excerpt_lenght',
        'label'       => __('Excerpt length', 'resta'),
        'description' => __('Default: 45 words', 'resta'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 200,
            'step'  => 5,
        ),
    ) );
    /********************* Featured Image ************************/
    $wp_customize->add_setting( 'featured_image_index_enable', array(
        'default'           => '',
        'sanitize_callback' => 'resta_sanitize_checkbox',
    ) );
    $wp_customize->add_control( 'featured_image_index_enable', array(
        'label' => __( 'Show/Hide Blog Posts Featured Image', 'resta' ),
        'type' => 'checkbox',
        'section' => 'blog_featured_image',
        'priority'       => 30
    ) );

    $wp_customize->add_setting( 'featured_image_single_enable', array(
        'default'           => '',
        'sanitize_callback' => 'resta_sanitize_checkbox',
    ) );
    $wp_customize->add_control( 'featured_image_single_enable', array(
        'label' => __( 'Show/Hide Single Posts Featured Image', 'resta' ),
        'type' => 'checkbox',
        'section' => 'blog_featured_image',
        'priority'       => 30
    ) );
    /*********************************************
     * Footer
     *********************************************/
    $wp_customize->add_panel( 'footer_panel', array(
        'title' => __( 'Footer', 'resta' ),
        'priority' => 85
    ) );

    /********************* Sections ************************/

    $wp_customize->add_section( 'footer_content', array(
        'title' => __( 'Footer Content', 'resta' ),
        'panel' => 'footer_panel',
        'priority' => 10,
    ) );

    $wp_customize->add_section( 'footer_design', array(
        'title' => __( 'Footer Design Options', 'resta' ),
        'panel' => 'footer_panel',
        'priority' => 20,
    ) );

    /********************* Footer Content ************************/
    $wp_customize->add_setting(
        'footer_widget_column',
        array(
            'default'           => 'two',
            'sanitize_callback' => 'resta_footer_column_sanitize',
        )
    );
    $wp_customize->add_control(
        'footer_widget_column',
        array(
            'type'        => 'radio',
            'label'       => __( 'Footer Column Settings', 'resta' ),
            'priority'       => 10,
            'section'     => 'footer_content',
            'choices' => array(
                'two'    => __( 'Two Columns', 'resta' ),
                'three'    => __( 'Three Columns', 'resta' ),
                'four'    => __( 'Four Columns', 'resta' )
            ),
        )
    );

    $wp_customize->add_setting( 'social_footer_enable', array(
        'default'           => '',
        'sanitize_callback' => 'resta_sanitize_checkbox',
    ) );
    $wp_customize->add_control( 'social_footer_enable', array(
        'label' => __( 'Show/Hide Social Icons in Footer', 'resta' ),
        'type' => 'checkbox',
        'priority'       => 10,
        'section' => 'footer_content'
    ) );

    $wp_customize->add_setting( 'copyright', array(
        'default'           => 'resta By ThemeTim',
        'sanitize_callback' => 'resta_sanitize_text',
    ) );
    $wp_customize->add_control( 'copyright', array(
        'label' => __( 'Footer Copyright Text', 'resta' ),
        'type' => 'textarea',
        'section' => 'footer_content',
        'priority'       => 10
    ) );

    /********************* Footer Design Options ************************/
    $wp_customize->add_setting(
        'footer_bg_color',
        array(
            'default'           => '#1488cc',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'footer_bg_color',
            array(
                'label'         => __('Footer Background Color', 'resta'),
                'section'       => 'footer_design'
            )
        )
    );

    $wp_customize->add_setting(
        'footer_border_color',
        array(
            'default'           => '#cccccc',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'footer_border_color',
            array(
                'label'         => __('Footer Border Color', 'resta'),
                'section'       => 'footer_design'
            )
        )
    );

    $wp_customize->add_setting(
        'footer_text_color',
        array(
            'default'           => '#717171',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'footer_text_color',
            array(
                'label'         => __('Footer Text Color', 'resta'),
                'section'       => 'footer_design'
            )
        )
    );

    $wp_customize->add_setting(
        'footer_border_style',
        array(
            'default'           => 'none',
            'sanitize_callback' => 'resta_border_style_sanitize',
        )
    );
    $wp_customize->add_control(
        'footer_border_style',
        array(
            'type'        => 'select',
            'label'       => __( 'Footer Border style', 'resta' ),
            'section'     => 'footer_design',
            'choices' => array(
                'none'    => __( 'none', 'resta' ),
                'dotted'     => __( 'dotted', 'resta' ),
                'dashed'     => __( 'dashed', 'resta' ),
                'solid'     => __( 'solid', 'resta' ),
                'double'     => __( 'double', 'resta' ),
                'groove'     => __( 'groove', 'resta' ),
                'ridge'     => __( 'ridge', 'resta' )
            ),
        )
    );

    $wp_customize->add_setting( 'footer_border_size', array(
        'default'           => '1',
        'sanitize_callback' => 'absint',
    ) );
    $wp_customize->add_control( 'footer_border_size', array(
        'label' => __( 'Footer Border Size', 'resta' ),
        'type' => 'number',
        'section' => 'footer_design'
    ) );

    $wp_customize->add_setting( 'footer_top_padding', array(
        'default'           => '',
        'sanitize_callback' => 'absint',
    ) );
    $wp_customize->add_control( 'footer_top_padding', array(
        'label' => __( 'Footer Padding Top', 'resta' ),
        'type' => 'number',
        'section' => 'footer_design'
    ) );

    $wp_customize->add_setting( 'footer_bottom_padding', array(
        'default'           => '28',
        'sanitize_callback' => 'absint',
    ) );
    $wp_customize->add_control( 'footer_bottom_padding', array(
        'label' => __( 'Footer Padding Bottom', 'resta' ),
        'type' => 'number',
        'section' => 'footer_design'
    ) );

    /*********************************************
     * Color
     *********************************************/

    $wp_customize->add_setting(
        'primary_color',
        array(
            'default'           => '#1488cc',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'primary_color',
            array(
                'label'         => __('Primary Color', 'resta'),
                'section'       => 'colors',
                'settings'      => 'primary_color',
                'priority'       => 5
            )
        )
    );
    $wp_customize->add_setting(
        'link_color',
        array(
            'default'           => '#1488cc',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'link_color',
            array(
                'label'         => __('Link Color', 'resta'),
                'section'       => 'colors',
                'settings'      => 'link_color'
            )
        )
    );
    $wp_customize->add_setting(
        'link_hover_color',
        array(
            'default'           => '#2939b4',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'link_hover_color',
            array(
                'label'         => __('Link Hover Color', 'resta'),
                'section'       => 'colors',
                'settings'      => 'link_hover_color'
            )
        )
    );

    /*********************************************
     * Typography
     *********************************************/

    $wp_customize->add_panel( 'typography_panel', array(
        'title' => __( 'Typography', 'resta' ),
        'priority' => 40
    ) );

    /********************* Sections ************************/

    $wp_customize->add_section( 'body_font', array(
        'title'          => __( 'Body Font', 'resta' ),
        'panel' => 'typography_panel',
        'priority'       => 10
    ) );

    $wp_customize->add_section( 'heading_font', array(
        'title'          => __( 'Heading Font', 'resta' ),
        'panel' => 'typography_panel',
        'priority'       => 20
    ) );

    /********************* Body Font ************************/
    $wp_customize->add_setting(
        'bg_text_color',
        array(
            'default'           => '#717171',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'bg_text_color',
            array(
                'label'         => __('Body Font Color', 'resta'),
                'section'       => 'body_font'
            )
        )
    );
    $wp_customize->add_setting( 'body_font_size', array(
        'default'           => '18',
        'sanitize_callback' => 'absint',
    ) );
    $wp_customize->add_control( 'body_font_size', array(
        'label' => __( 'Body Font Size', 'resta' ),
        'type' => 'number',
        'section' => 'body_font'
    ) );

    $wp_customize->add_setting(
        'body_font_name',
        array(
            'default' => 'Source+Sans+Pro:300,400,700',
            'sanitize_callback'     => 'resta_sanitize_text',
        )
    );
    $wp_customize->add_control(
        'body_font_name',
        array(
            'type' => 'text',
            'label' => __('Body Font Name', 'resta'),
            'section' => 'body_font'
        )
    );
    $wp_customize->add_setting(
        'body_font_family',
        array(
            'default' => '\'Source Sans Pro\', sans-serif',
            'sanitize_callback'     => 'resta_sanitize_text',
        )
    );
    $wp_customize->add_control(
        'body_font_family',
        array(
            'type' => 'text',
            'label' => __('Body Font Family', 'resta'),
            'section' => 'body_font'
        )
    );
    $wp_customize->add_setting( 'body_font_weight', array(
        'default'           => '300',
        'sanitize_callback' => 'absint',
    ) );
    $wp_customize->add_control( 'body_font_weight', array(
        'label' => __( 'Body Font Weight', 'resta' ),
        'type' => 'text',
        'section' => 'body_font'
    ) );

    /********************* Heading Font ************************/
    $wp_customize->add_setting(
        'heading_color',
        array(
            'default'           => '#333',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'heading_color',
            array(
                'label'         => __('Heading Color', 'resta'),
                'section'       => 'heading_font'
            )
        )
    );

    $wp_customize->add_setting('heading_font_name', array(
        'default'        => 'Nunito:300,400',
        'sanitize_callback'     => 'resta_sanitize_text',
    ));
    $wp_customize->add_control( 'heading_font_name', array(
        'label'   => __('Heading Font Name', 'resta'),
        'section' => 'heading_font',
        'type'    => 'text'

    ));
    $wp_customize->add_setting('heading_font_family', array(
        'default'        => '\'Nunito\', sans-serif',
        'sanitize_callback'     => 'resta_sanitize_text',
    ));
    $wp_customize->add_control( 'heading_font_family', array(
        'label'   => __('Heading Font Family', 'resta'),
        'section' => 'heading_font',
        'type'    => 'text'

    ));
    $wp_customize->add_setting( 'heading_font_weight', array(
        'default'           => '300',
        'sanitize_callback' => 'absint',
    ) );
    $wp_customize->add_control( 'heading_font_weight', array(
        'label' => __( 'Heading Font Weight', 'resta' ),
        'type' => 'text',
        'section' => 'heading_font'
    ) );

    /*********************************************
     * Page Title
     *********************************************/

    $wp_customize->add_section( 'page_title_panel', array(
        'title'          => __( 'Page Title', 'resta' ),
        'priority'       => 50
    ) );

    $wp_customize->add_setting( 'enable_page_title', array(
        'default'           => '',
        'sanitize_callback' => 'resta_sanitize_checkbox',
    ) );
    $wp_customize->add_control( 'enable_page_title', array(
        'label' => __( 'Show/Hide Page Title', 'resta' ),
        'type' => 'checkbox',
        'section' => 'page_title_panel'
    ) );

    $wp_customize->add_setting(
        'page_title_background_color',
        array(
            'default'           => '#1488cc',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'page_title_background_color',
            array(
                'label'         => __('Background Color', 'resta'),
                'section' => 'page_title_panel'
            )
        )
    );

    $wp_customize->add_setting(
        'page_title_text_color',
        array(
            'default'           => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'page_title_text_color',
            array(
                'label'         => __('Text Color', 'resta'),
                'section' => 'page_title_panel'
            )
        )
    );

    $wp_customize->add_setting( 'page_title_background_image', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw'
    ) );

    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'page_title_background_image',
            array(
                'label'          => __( 'Upload Background Image', 'resta' ),
                'type'           => 'image',
                'section'        => 'page_title_panel',
            )
        )
    );

    $wp_customize->add_setting( 'page_title_font_size', array(
        'default'           => '48',
        'sanitize_callback' => 'absint',
    ) );
    $wp_customize->add_control( 'page_title_font_size', array(
        'label' => __( 'Font Size', 'resta' ),
        'type' => 'number',
        'section' => 'page_title_panel'
    ) );

    $wp_customize->add_setting( 'page_title_padding', array(
        'default'           => '85',
        'sanitize_callback' => 'absint',
    ) );
    $wp_customize->add_control( 'page_title_padding', array(
        'label' => __( 'Padding Top/Bottom', 'resta' ),
        'type' => 'number',
        'section' => 'page_title_panel'
    ) );
}
add_action( 'customize_register', 'resta_customize_register' );
/**
 * Adding Go to Pro Section in Customizer
 * https://github.com/justintadlock/trt-customizer-pro
 */
if( class_exists( 'WP_Customize_Section' ) ) :
    /**
     * Adding Go to Pro Section in Customizer
     * https://github.com/justintadlock/trt-customizer-pro
     */
    class resta_Customize_Section_Pro extends WP_Customize_Section {

        /**
         * The type of customize section being rendered.
         *
         * @since  1.0.0
         * @access public
         * @var    string
         */
        public $type = 'pro-section';

        /**
         * Custom button text to output.
         *
         * @since  1.0.0
         * @access public
         * @var    string
         */
        public $pro_text = '';

        /**
         * Custom pro button URL.
         *
         * @since  1.0.0
         * @access public
         * @var    string
         */
        public $pro_url = '';

        /**
         * Add custom parameters to pass to the JS via JSON.
         *
         * @since  1.0.0
         * @access public
         * @return void
         */
        public function json() {
            $json = parent::json();

            $json['pro_text'] = $this->pro_text;
            $json['pro_url']  = esc_url( $this->pro_url );

            return $json;
        }

        /**
         * Outputs the Underscore.js template.
         *
         * @since  1.0.0
         * @access public
         * @return void
         */
        protected function render_template() { ?>
            <li id="accordion-section-{{ data.id }}" class="accordion-section control-section control-section-{{ data.type }} cannot-expand get-pro-theme">
                <h3 class="accordion-section-title">
                    {{ data.title }}
                    <# if ( data.pro_text && data.pro_url ) { #>
                    <a href="{{ data.pro_url }}" class="button button-secondary alignright" target="_blank">{{ data.pro_text }}</a>
                    <# } #>
                </h3>
            </li>
        <?php }
    }
endif;

add_action( 'customize_register', 'resta_sections_pro' );
function resta_sections_pro( $wp_customize ) {
    // Register custom section types.
    $wp_customize->register_section_type( 'resta_Customize_Section_Pro' );

    // Register sections.
    $wp_customize->add_section(
        new resta_Customize_Section_Pro(
            $wp_customize,
            'resta_get_pro',
            array(
                'title'    => esc_html__( 'Pro Available', 'resta' ),
                'priority' => 5,
                'pro_text' => esc_html__( 'Get Pro Theme', 'resta' ),
                'pro_url'  => 'https://www.themetim.com/wordpress-themes/resta-pro/'
            )
        )
    );
}
/**
 * Enqueue Scripts for customize controls
 */
function resta_customize_scripts() {
    wp_enqueue_script( 'resta-customize-controls-js', get_template_directory_uri().'/assets/js/customize-controls.js', array( 'jquery' ), '', true );
}
add_action( 'customize_controls_enqueue_scripts', 'resta_customize_scripts' );

/**
 * Text
 * @param $input
 * @return string
 */

function resta_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}

/**
 * Checkbox
 * @param $input
 * @return int|string
 */
function resta_sanitize_checkbox( $input ) {
    if ( $input == true ) {
        return true;
    } else {
        return '';
    }
}

/**
 * Site/Menu Layout Settings
 * @param $input
 * @return string
 * resta_footer_column_sanitize
 */
function resta_layout_sanitize( $input ) {
    $valid = array(
        'wide'    => __('Wide', 'resta'),
        'boxed'     => __('Boxed', 'resta'),
        'collapse'     => __('Collapse', 'resta')
    );

    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

/**
 * Blog Layout Settings
 * @param $input
 * @return string
 */
function resta_blog_layout_sanitize( $input ) {
    $valid = array(
        'default'    => __( 'Default ( Sidebar )', 'resta' ),
        'blog-wide'     => __( 'Full Width', 'resta' ),
        'masonry'     => __( 'Masonry ( Two Columns )', 'resta' )
    );

    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

/**
 * Header Border Style Settings
 * @param $input
 * @return string
 */
function resta_border_style_sanitize( $input ) {
    $valid = array(
        'none'    => __( 'none', 'resta' ),
        'dotted'     => __( 'dotted', 'resta' ),
        'dashed'     => __( 'dashed', 'resta' ),
        'solid'     => __( 'solid', 'resta' ),
        'double'     => __( 'double', 'resta' ),
        'groove'     => __( 'groove', 'resta' ),
        'ridge'     => __( 'ridge', 'resta' )
    );

    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

/**
 * Footer Column Settings
 * @param $input
 * @return string
 */
function resta_footer_column_sanitize( $input ) {
    $valid = array(
        'two'    => __( 'Two Column', 'resta' ),
        'three'    => __( 'Three Column', 'resta' ),
        'four'    => __( 'Four Column', 'resta' )
    );

    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function resta_customize_preview_js() {
    wp_enqueue_script( 'resta_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'resta_customize_preview_js' );