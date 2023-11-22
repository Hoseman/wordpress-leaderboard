<?php
function ah_customize_register( $wp_customize ){

    /* Main Carousel */ 
    $wp_customize->add_setting( 'ah_main_header_subtitle', [
        'default'  =>  ''
    ]);
    $wp_customize->add_setting( 'ah_main_header_title', [
        'default'  =>  ''
    ]);
    $wp_customize->add_setting( 'ah_main_header_small_text', [
        'default'  =>  ''
    ]);
    $wp_customize->add_setting( 'ah_main_header_button_text', [
        'default'  =>  ''
    ]);  

    $wp_customize->add_section( 'ah_carousel', [
        'title' =>  __('Incentive Main Carousel', 'technical-test'),
        'priority'  =>  30
    ]);

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'ah_carousel_subheading_input',
        array(
            'label' => __('Sub Heading', 'technical-test'),
            'section' => 'ah_carousel',
            'settings' => 'ah_main_header_subtitle'
        )
    ));

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'ah_carousel_mainheading_input',
        array(
            'label' => __('Main Heading', 'technical-test'),
            'section' => 'ah_carousel',
            'settings' => 'ah_main_header_title'
        )
    ));

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'ah_carousel_smalltext_input',
        array(
            'label' => __('Small Text', 'technical-test'),
            'section' => 'ah_carousel',
            'settings' => 'ah_main_header_small_text'
        )
    ));

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'ah_carousel_buttontext_input',
        array(
            'label' => __('Button Text', 'technical-test'),
            'section' => 'ah_carousel',
            'settings' => 'ah_main_header_button_text'
        )
    ));
    /* Main Carousel */   

    /* Weekly Prizes */
    $wp_customize->add_setting( 'ah_weekly_prizes_title', [
        'default'  =>  ''
    ]);
    $wp_customize->add_setting( 'ah_weekly_prizes_prize_one', [
        'default'  =>  ''
    ]);
    $wp_customize->add_setting( 'ah_weekly_prizes_prize_two', [
        'default'  =>  ''
    ]);
    $wp_customize->add_setting( 'ah_weekly_prizes_prize_three', [
        'default'  =>  ''
    ]);
    $wp_customize->add_setting( 'ah_weekly_prizes_prize_four', [
        'default'  =>  ''
    ]);
    $wp_customize->add_setting( 'ah_weekly_prizes_subtitle', [
        'default'  =>  ''
    ]);
    $wp_customize->add_setting( 'ah_weekly_prizes_content', [
        'default'  =>  ''
    ]); 

    $wp_customize->add_section( 'ah_weekly_prizes', [
        'title' =>  __('Weekly Prizes Section', 'technical-test'),
        'priority'  =>  30
    ]);

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'ah_weekly_prizes_heading_input',
        array(
            'label' => __('Main Title', 'technical-test'),
            'section' => 'ah_weekly_prizes',
            'settings' => 'ah_weekly_prizes_title'
        )
    ));

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'ah_weekly_prizes_prize1_input',
        array(
            'label' => __('Prize 1 Description', 'technical-test'),
            'section' => 'ah_weekly_prizes',
            'settings' => 'ah_weekly_prizes_prize_one'
        )
    ));

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'ah_weekly_prizes_prize2_input',
        array(
            'label' => __('Prize 2 Description', 'technical-test'),
            'section' => 'ah_weekly_prizes',
            'settings' => 'ah_weekly_prizes_prize_two'
        )
    ));

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'ah_weekly_prizes_prize3_input',
        array(
            'label' => __('Prize 3 Description', 'technical-test'),
            'section' => 'ah_weekly_prizes',
            'settings' => 'ah_weekly_prizes_prize_three'
        )
    ));

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'ah_weekly_prizes_prize4_input',
        array(
            'label' => __('Prize 4 Description', 'technical-test'),
            'section' => 'ah_weekly_prizes',
            'settings' => 'ah_weekly_prizes_prize_four'
        )
    ));

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'ah_weekly_prizes_subtitle',
        array(
            'label' => __('Small Title', 'technical-test'),
            'section' => 'ah_weekly_prizes',
            'settings' => 'ah_weekly_prizes_subtitle'
        )
    ));

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'ah_weekly_prizes_content',
        array(
            'type' => 'textarea',
            'label' => __('Small Text Content', 'technical-test'),
            'section' => 'ah_weekly_prizes',
            'settings' => 'ah_weekly_prizes_content'
        )
    ));
    /* Weekly Prizes */

    /* Terms & Conditions */
    $wp_customize->add_setting( 'ah_terms_title', [
        'default'  =>  ''
    ]);

    $wp_customize->add_setting( 'ah_terms_content', [
        'default'  =>  ''
    ]);

    $wp_customize->add_section( 'ah_terms', [
        'title' =>  __('Terms & Conditions Section', 'technical-test'),
        'priority'  =>  30
    ]);

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'ah_terms_heading_input',
        array(
            'label' => __('Terms Heading', 'technical-test'),
            'section' => 'ah_terms',
            'settings' => 'ah_terms_title'
        )
    ));

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'ah_terms_content_input',
        array(
            'type' => 'textarea',
            'label' => __('Text Content', 'technical-test'),
            'section' => 'ah_terms',
            'settings' => 'ah_terms_content'
        )
    ));

    /* Terms & Conditions */












}