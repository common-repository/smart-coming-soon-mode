<?php
    if ( ! class_exists( 'Redux' ) ) {
        return;
    }

    // This is your option name where all the Redux data is stored.
    $opt_name = "smart_csm_option";
    $opt_name = apply_filters( 'smart_csm_option/opt_name', $opt_name );

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => __( 'Smart Coming Soon Mode', 'smart-coming-soon-mode' ),
        // Name that appears at the top of your panel
        'display_version'      => '',
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'  => __( 'Smart Coming Soon Mode', 'smart-coming-soon-mode' ),

        'page_title'  => __( 'Smart Coming Soon Mode', 'smart-coming-soon-mode' ),

        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => false,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => false,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => false,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => 'smart-coming-soon-mode',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => false,
        // Shows the Import/Export panel when not used as a field.
        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
         'footer_credit'     => '',  // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

    Redux::setArgs( $opt_name, $args );

    /*----------Smart Comming Soon Mode Option Settings Start---------------*/
   
    // -> Start Genral Settings
    Redux::setSection( $opt_name, array(
        'title' => __( 'General Settings', 'smart-coming-soon-mode' ),
        'id'    => 'genral',
        'desc'  => __( '', 'smart-coming-soon-mode' ),
        'icon'  => 'el el-home'
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Status', 'smart-coming-soon-mode' ),
        'id'         => 'status',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'disabled',
                'type'     => 'switch',
                'title'    => __( 'Enable Smart Coming Soon Mode', 'smart-coming-soon-mode' ),
                'options' => array('on', 'off'),
                'default'  => false,
            ),

            array(
                'id'       => 'logo',
                'type'     => 'switch',
                'title'    => __( 'Enable Site Logo', 'smart-coming-soon-mode' ),
                'options' => array('on', 'off'),
                'default'  => false,
            ),

            array(
                'id'       => 'logo-image',
                'type'     => 'media',
                'url'      => true,
                'title'    => __( 'Logo', 'smart-coming-soon-mode' ),
                'compiler' => 'true',
                'default'  => '',
            ),

            array(
                'id'       => 'countdown',
                'type'     => 'switch',
                'title'    => __( 'Enable Countdown Timer', 'smart-coming-soon-mode' ),
                'options' => array('on', 'off'),
                'default'  => true,
            ),

             array(
                'id'       => 'countdown-date',
                'type'     => 'text',
                'title'    => __( 'End Date', 'smart-coming-soon-mode'),
                'desc'     => __( 'Select count down end date.', 'smart-coming-soon-mode' ),
                'readonly' => true,
                'default' => '01/07/2019'
                ),
        )
    ) );
     
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Heading', 'smart-coming-soon-mode' ),
        'id'               => 'head-text',
        'subsection'       => true,
        'customizer_width' => '700px',
        'fields'           => array(
            array(
                'id'          => 'headline',
                'type'        => 'text',
                'title'       => __( 'Heading', 'smart-coming-soon-mode' ),
                'default'     => __( 'Soon available!', 'smart-coming-soon-mode' ),
            ),

            array(
                'id'          => 'description',
                'type'        => 'textarea',
                'title'       => __( 'Description', 'smart-coming-soon-mode' ),
                'default'     => __('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.', 'smart-coming-soon-mode' )
            ),
        )
    ) );

    /* Advanced Tab */
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Advanced Settings', 'smart-coming-soon-mode' ),
        'id'               => 'design',
        'desc'             => __( 'These are really basic fields!', 'smart-coming-soon-mode' ),
        'customizer_width' => '400px',
        'icon'             => 'el el-website'
    ) );

    /* Advanced Tab /Background*/
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Background', 'smart-coming-soon-mode' ),
        'id'               => 'background',
        'subsection'       => true,
        'customizer_width' => '500px',
        'fields'           => array(
            array(
                'id'       => 'bg-setting',
                'type'     => 'radio',
                'title'    => __( 'Background Type', 'smart-coming-soon-mode' ),
                'options'  => array(
                    '1' => __( 'Background Color', 'smart-coming-soon-mode' ),
                    '2' => __( 'Background Image', 'smart-coming-soon-mode' ),
                ),
                'default'  => '1'
            ),

            array(
                'id'       => 'bg-color',
                'type'     => 'color',
                'output'   => array( '.site-title' ),
                'title'    => __( 'Select Background Color', 'smart-coming-soon-mode' ),
                'default'  => '#173648',
            ),

            array(
                'id'       => 'bg-image',
                'type'     => 'media',
                'url'      => false,
                'title'    => __( 'Upload Background Image', 'smart-coming-soon-mode' ),
                'compiler' => 'true',
                'default'  => '',
            ),
          
            array(
                'id'       => 'overlay',
                'type'     => 'select',
                'title'    => __('Show Overlay', 'smart-coming-soon-mode'), 
                'options'  => array(
                    '1' => 'Yes',
                    '2' => 'No',
                ),
                'default'  => '2',
            ),              
        )
    ) );

    /* Advanced Tab/Text Color */
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Colors', 'smart-coming-soon-mode' ),
        'id'               => 'colors-settings',
        'subsection'       => true,
        'customizer_width' => '700px',
        'fields'           => array(

        array(
            'id'       => 'headline-color',
            'type'     => 'color',
            'output'   => array( '.site-title' ),
            'title'    => __( 'Heading', 'smart-coming-soon-mode' ),
            'default'  => '#ffffff',
            ),
        array(
            'id'       => 'description-color',
            'type'     => 'color',
            'output'   => array( '.site-title' ),
            'title'    => __( 'Description', 'smart-coming-soon-mode' ),
            'default'  => '#ffffff',
            ),
        array(
            'id'       => 'countdown-color',
            'type'     => 'color',
            'output'   => array( '.site-title' ),
            'title'    => __( 'Countdown Timer', 'smart-coming-soon-mode' ),
            'default'  => '#ffffff',
            ),
        array(
            'id'       => 'social-icon-color',
            'type'     => 'color',
            'output'   => array( '.site-title' ),
            'title'    => __( 'Social Icons', 'smart-coming-soon-mode' ),
            'default'  => '#ffffff',
            ),
         array(
            'id'       => 'contact-color',
            'type'     => 'color',
            'output'   => array( '.site-title' ),
            'title'    => __( 'Contact Info Text', 'smart-coming-soon-mode' ),
            'default'  => '#ffffff',
            ),

        )
    ) );

    /* Advanced Tab/Font Style */
    Redux::setSection( $opt_name, array(
        'title'      => __( 'Typography', 'smart-coming-soon-mode' ),
        'id'         => 'typography-settings',
        'fields'     => array(
            array(
                'id'            => 'headingline-font-size',
                'type'          => 'slider',
                'title'         => __( 'Heading Font Size (px)', 'smart-coming-soon-mode' ),
                'default'       => 56,
                'min'           => 28,
                'step'          => 1,
                'max'           => 100,
                'display_value' => 'text'
            ),

            array(
                'id'            => 'description-font-size',
                'type'          => 'slider',
                'title'         => __( 'Description Font Size (px)', 'smart-coming-soon-mode' ),
                'default'       => 18,
                'min'           => 0,
                'step'          => 1,
                'max'           => 36,
                'display_value' => 'text'
            ),

            array(
                'id'          => 'fontfamily',
                'type'        => 'typography',
                'title'       => __( 'Choose Fonts', 'smart-coming-soon-mode' ),
                'compiler'      => true,  // Use if you want to hook in your own CSS compiler
                'google'      => false,
                // Disable google fonts. Won't work if you haven't defined your google api key
                'font-backup' => false,
                'font-family' => true,
                // Select a backup non-google font in addition to a google font
                'font-style'    => false, // Includes font-style and weight. Can use font-style or font-weight to declare
                'subsets'       => false, // Only appears if google is true and subsets not set to false
                'font-size'     => false,
                'line-height'   => false,
                'word-spacing'  => false,  // Defaults to false
                'letter-spacing'=> false,  // Defaults to false
                'color'         => false,
                'preview'       => false, // Disable the previewer
                'all_styles'    => false,
                'font-weight'   => false,
                'text-align'    => false,
                // Enable all Google Font style/weight variations to be added to the page
                'output'      => array( '.site-description' ),
                // An array of CSS selectors to apply this font style to dynamically
                'compiler'    => array( 'site-description-compiler' ),
                // An array of CSS selectors to apply this font style to dynamically
                'units'       => 'px',
                // Defaults to px
                'default'     => array(
                    'font-family' => "'MS Sans Serif', Geneva, sans-serif"
                ),
            ),
        ),
        'subsection' => true,
    ) );

    /* Social Icon Tab */
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Social Icons Settings', 'smart-coming-soon-mode' ),
        'id'               => 'socialicons',
        'subsection'       => false,
        'customizer_width' => '700px',
        'icon'             => 'el el-list-alt',
        'fields'           => array(
            array(
                'id'       => 'social',
                'type'     => 'switch',
                'title'    => __( 'Enable Social Icons', 'smart-coming-soon-mode' ),
                'options' => array('on', 'off'),
                'default'  => true,
            ),
            array(
                'id'        => 'facebook',
                'type'      => 'text',
                'title'     =>('<div class="scsm-tooltip"><img src="'.esc_url(plugin_dir_url(__FILE__).'assest/img/facebook.png').'" alt="Facebook Links"><span class="scsm-tooltiptext">'.__( 'Facebook', 'smart-coming-soon-mode' ).'</span></div>'),
                'default'   => '#', 
            ),
             array(
                'id'        => 'twitter',
                'type'      => 'text',
                'title'     => ( '<div class="scsm-tooltip"><img src="'.esc_url(plugin_dir_url(__FILE__).'assest/img/twitter.png').'" alt="Twitter Links"><span class="scsm-tooltiptext">'.__( 'Twitter', 'smart-coming-soon-mode' ).'</span></div>' ),
                'default'   => '#',  
            ),
            array(
                'id'        => 'linkedin',
                'type'      => 'text',
                'title'     => ( '<div class="scsm-tooltip"><img src="'.esc_url(plugin_dir_url(__FILE__).'assest/img/linkedin.png').'" alt="Linked In Links"><span class="scsm-tooltiptext">'.__( 'LinkedIn', 'smart-coming-soon-mode' ).'</span></div>' ),
                'default'   => '#',
            ),           
            array(
                'id'        => 'google',
                'type'      => 'text',
                'title'     => ( '<div class="scsm-tooltip"><img src="'.esc_url(plugin_dir_url(__FILE__).'assest/img/google-plus.png').'" alt="Google Plus Links"><span class="scsm-tooltiptext">'.__( 'Google-Plus', 'smart-coming-soon-mode' ).'</span></div>' ),
                'default'   => '#',
            ),
        )
    ) );

    /* Conatact Info Tabs */
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Contact Info Settings', 'smart-coming-soon-mode' ),
        'id'               => 'contacts',
        'subsection'       => false,
        'icon'             => 'el el-address-book ',
        'customizer_width' => '700px',
        'fields'           => array(

             array(
                'id'       => 'contact',
                'type'     => 'switch',
                'title'    => __( 'Enable Contact Informations', 'smart-coming-soon-mode' ),
                'options' => array('on', 'off'),
                'default'  => true,
            ),
        
            array(
                'id'        => 'address',
                'type'      => 'textarea',
                'title'     => __( 'Address', 'smart-coming-soon-mode' ),
                'class'     => 'address-field-label',
                'default' => __('Main Highway Otaki, 32 Wilson Street','smart-coming-soon-mode'),
            ),
            array(
                'id'        => 'contact-no',
                'type'      => 'text',
                'title'     => __('Phone', 'smart-coming-soon-mode' ),
                'default'   => __('3322553887', 'smart-coming-soon-mode' ),
                'validate'  => 'numeric',
                'class'     => 'phone-field-label',
                'text_hint' => array(
                    'title'   => __( 'Phone', 'smart-coming-soon-mode' ),
                    'content' => __( 'Enter Your Mobile Numbers', 'smart-coming-soon-mode' ),   
                )
            ),
            array(
                'id'        => 'email',
                'type'      => 'text',
                'title'     => __( 'Email', 'smart-coming-soon-mode' ),
                'default'   => __('info@example.com', 'smart-coming-soon-mode' ),
                'validate' => 'email',
                'class'     => 'email-field-label',
                'text_hint' => array(
                    'title'   =>__( 'Email', 'smart-coming-soon-mode' ),
                    'content' =>__( 'Enter Your E-Mails', 'smart-coming-soon-mode' ),  
                )
            ),  
        )
    ) );

    /* Help Tab */
    Redux::setSection( $opt_name, array(
        'title'      => __('Help', 'smart-coming-soon-mode' ), 
        'id'         => 'help_page',
        'subsection' => false,
        'fields'     => array(
            array(
                'id'       => 'opt-raw_info_5',
                'type'     => 'raw',
                'full_width'=>  true,
                'content'  => SCSM_Help_Page(),   
            ),
        )
    ) );

    /* Preview Tab */
    Redux::setSection( $opt_name, array(
        'title'      => __( 'Preview', 'smart-coming-soon-mode' ), 
        'id'         => 'previewtamplate',
        'desc'       => __( 'Click on button and get live preview ', 'smart-coming-soon-mode').'<a href="'.esc_url(home_url().'?smart_coming_soon_mode_preview=true').'" target="_blank" style="background-color:#363b3f; color:#fff; padding:6px; text-decoration: none;border: 1px solid #363b3f; border-radius: 6px;">Preview</a>',
        'subsection' => false,
        'icon'             => 'el el-website'
    ) );

    /* Features Tab */
    Redux::setSection( $opt_name, array(
        'title'      => __('More Features', 'smart-coming-soon-mode' ), 
        'id'         => 'prothemetamplate',
        'subsection' => false,
        'fields'     => array(
            array(
                'id'       => 'opt-raw_info_4',
                'type'     => 'raw',
                'full_width'=>  true,
                'content'  => SCSM_More_Features(),   
            ),
        )
    ) );
/*---------- End Smart Comming Soon Mode Option Settings. --------------*/