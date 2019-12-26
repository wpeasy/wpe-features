<?php

/*
 * NOTE.. Attribute names may be in camel case to match a library.
 */
$controllerClass = 'WPEasyFeatures\Modules\DynamicFeaturedImage\Controller\ModuleController';
return [
	'moduleName' => 'Dynamic Featured Image',
	'moduleDescription' => 'Add shortcodes to display extra images from the Dynamic Featured Images plugin',

    'shortcodes' => [
        'wpe_dfi_carousel' => [
            'enclosing' => false,
            'description' => 'Displays featured images from the Dynamic Featured Image Plugin. Based on slick.js. @see https://kenwheeler.github.io/slick/<br/>Note: Slick properties are Camel Case, they are represtented by _ alternative to work as Shortcode Atts ',
            'callback' => $controllerClass . '::wpe_dfi_carousel',
            'attributes' => [
                'container_class' => [
                    'default' => "wpe-slider",
                    'description' => 'Container class name',
                    'values' => 'string',
                    'showInExample' => true
                ],
                'adaptive_height' => [
                    'default' => "false",
                    'description' => 'See Slick docs',
                    'values' => '"false","true"'
                ],
                'autoplay' => [
                    'default' => "false",
                    'description' => 'See Slick docs',
                    'values' => '"false","true"',
                    'showInExample' => true
                ],
                'autoplay_speed' => [
                    'default' => "3000",
                    'description' => 'See Slick docs',
                    'values' => 'INT',
                    'showInExample' => true
                ],
                'arrows' => [
                    'default' => "true",
                    'description' => 'See Slick docs',
                    'values' => '"false","true"',
                    'showInExample' => true
                ],
                'as_nav_for' => [
                    'default' => '',
                    'description' => 'See Slick docs',
                    'values' => 'string'
                ],
                'append_arrows' => [
                    'default' => '',
                    'description' => 'See Slick docs',
                    'values' => '$(element)'
                ],
                'append_dots' => [
                    'default' => '',
                    'description' => 'See Slick docs',
                    'values' => '$(element)'
                ],
                'center_mode' => [
                    'default' => "false",
                    'description' => 'See Slick docs',
                    'values' => '"false","true"'
                ],
                'center_padding' => [
                    'default' => '50px',
                    'description' => 'See Slick docs',
                    'values' => '(px or %)'
                ],
                'css_ease' => [
                    'default' => 'ease',
                    'description' => 'See Slick docs',
                    'values' => 'CSS3 Animation Easing'
                ],
                'dots' => [
                    'default' => "false",
                    'description' => 'See Slick docs',
                    'values' => '"false","true"',
                    'showInExample' => true
                ],
                'fade' => [
                    'default' => "false",
                    'description' => 'See Slick docs',
                    'values' => '"false","true"',
                    'showInExample' => true
                ],
                'focus_on_select' => [
                    'default' => "false",
                    'description' => 'See Slick docs',
                    'values' => '"false","true"'
                ],
                'infinite' => [
                    'default' => "true",
                    'description' => 'See Slick docs',
                    'values' => '"false","true"',
                    'showInExample' => true
                ],
                'lazy_load' => [
                    'default' => "progressive",
                    'description' => 'See Slick docs',
                    'values' => '"ondemand","progressive"',
                    'showInExample' => true
                ],
                'pause_on_focus' => [
                    'default' => "true",
                    'description' => 'See Slick docs',
                    'values' => '"false","true"'
                ],
                'pause_on_hover' => [
                    'default' => "true",
                    'description' => 'See Slick docs',
                    'values' => '"false","true"'
                ],
                'pause_on_dots_hover' => [
                    'default' => "true",
                    'description' => 'See Slick docs',
                    'values' => '"false","true"'
                ],
                'rows' => [
                    'default' => "1",
                    'description' => 'See Slick docs',
                    'values' => 'INT'
                ],
                'slides_per_row' => [
                    'default' => "1",
                    'description' => 'See Slick docs',
                    'values' => 'INT'
                ],
                'slides_to_show' => [
                    'default' => "6",
                    'description' => 'See Slick docs',
                    'values' => 'INT',
                    'showInExample' => true
                ],
                'slides_to_scroll' => [
                    'default' => "1",
                    'description' => 'See Slick docs',
                    'values' => 'INT'
                ],
                'speed' => [
                    'default' => "300",
                    'description' => 'See Slick docs',
                    'values' => 'INT'
                ],
                'swipe' => [
                    'default' => "true",
                    'description' => 'See Slick docs',
                    'values' => '"false","true"'
                ],
                'swipe_to_slide' => [
                    'default' => "false",
                    'description' => 'See Slick docs',
                    'values' => '"false","true"'
                ],
                'touch_move' => [
                    'default' => "true",
                    'description' => 'See Slick docs',
                    'values' => '"false","true"'
                ],
                'variable_width' => [
                    'default' => "false",
                    'description' => 'See Slick docs',
                    'values' => '"false","true"'
                ],
                'vertical' => [
                    'default' => "false",
                    'description' => 'See Slick docs',
                    'values' => '"false","true"'
                ],
                'vertical_swiping' => [
                    'default' => "false",
                    'description' => 'See Slick docs',
                    'values' => '"false","true"'
                ],
                'z_index' => [
                    'default' => "1000",
                    'description' => 'See Slick docs',
                    'values' => 'INT'
                ],
            ]
        ],

        'wpe_dfi_slider' => [
	        'enclosing' => false,
	        'description' => 'Displays featured images from the Dynamic Featured Image Plugin. Based on slick.js. @see https://kenwheeler.github.io/slick/<br/>Note: Slick properties are Camel Case, they are represtented by _ alternative to work as Shortcode Atts ',
	        'callback' => $controllerClass . '::wpe_dfi_slider',
	        'attributes' => [
		        'container_class' => [
			        'default' => "wpe-slider",
			        'description' => 'Container class name',
			        'values' => 'string',
			        'showInExample' => true
		        ],
		        'show_thumbs' => [
			        'default' => "true",
			        'description' => 'Show thumbnail Nav',
			        'values' => '"false","true"',
			        'showInExample' => true
		        ],
		        'adaptive_height' => [
			        'default' => "false",
			        'description' => 'See Slick docs',
			        'values' => '"false","true"'
		        ],
		        'autoplay' => [
			        'default' => "true",
			        'description' => 'See Slick docs',
			        'values' => '"false","true"',
			        'showInExample' => true
		        ],
		        'autoplay_speed' => [
			        'default' => "3000",
			        'description' => 'See Slick docs',
			        'values' => 'INT',
			        'showInExample' => true
		        ],
		        'arrows' => [
			        'default' => "true",
			        'description' => 'See Slick docs',
			        'values' => '"false","true"',
			        'showInExample' => true
		        ],
		        'as_nav_for' => [
			        'default' => '',
			        'description' => 'See Slick docs',
			        'values' => 'string'
		        ],
		        'append_arrows' => [
			        'default' => '',
			        'description' => 'See Slick docs',
			        'values' => '$(element)'
		        ],
		        'append_dots' => [
			        'default' => '',
			        'description' => 'See Slick docs',
			        'values' => '$(element)'
		        ],
		        'center_mode' => [
			        'default' => "true",
			        'description' => 'See Slick docs',
			        'values' => '"false","true"'
		        ],
		        'center_padding' => [
			        'default' => '50px',
			        'description' => 'See Slick docs',
			        'values' => '(px or %)'
		        ],
		        'css_ease' => [
			        'default' => 'ease',
			        'description' => 'See Slick docs',
			        'values' => 'CSS3 Animation Easing'
		        ],
		        'dots' => [
			        'default' => "false",
			        'description' => 'See Slick docs',
			        'values' => '"false","true"',
			        'showInExample' => true
		        ],
		        'fade' => [
			        'default' => "true",
			        'description' => 'See Slick docs',
			        'values' => '"false","true"',
			        'showInExample' => true
		        ],
		        'focus_on_select' => [
			        'default' => "true",
			        'description' => 'See Slick docs',
			        'values' => '"false","true"'
		        ],
		        'infinite' => [
			        'default' => "true",
			        'description' => 'See Slick docs',
			        'values' => '"false","true"',
			        'showInExample' => true
		        ],
		        'lazy_load' => [
			        'default' => "progressive",
			        'description' => 'See Slick docs',
			        'values' => '"ondemand","progressive"',
			        'showInExample' => true
		        ],
		        'pause_on_focus' => [
			        'default' => "true",
			        'description' => 'See Slick docs',
			        'values' => '"false","true"'
		        ],
		        'pause_on_hover' => [
			        'default' => "true",
			        'description' => 'See Slick docs',
			        'values' => '"false","true"'
		        ],
		        'pause_on_dots_hover' => [
			        'default' => "true",
			        'description' => 'See Slick docs',
			        'values' => '"false","true"'
		        ],
		        'rows' => [
			        'default' => "1",
			        'description' => 'See Slick docs',
			        'values' => 'INT'
		        ],
		        'slides_per_row' => [
			        'default' => "1",
			        'description' => 'See Slick docs',
			        'values' => 'INT'
		        ],
		        'slides_to_show' => [
			        'default' => "1",
			        'description' => 'See Slick docs',
			        'values' => 'INT',
			        'showInExample' => true
		        ],
		        'slides_to_scroll' => [
			        'default' => "1",
			        'description' => 'See Slick docs',
			        'values' => 'INT'
		        ],
		        'speed' => [
			        'default' => "300",
			        'description' => 'See Slick docs',
			        'values' => 'INT'
		        ],
		        'swipe' => [
			        'default' => "true",
			        'description' => 'See Slick docs',
			        'values' => '"false","true"'
		        ],
		        'swipe_to_slide' => [
			        'default' => "false",
			        'description' => 'See Slick docs',
			        'values' => '"false","true"'
		        ],
		        'touch_move' => [
			        'default' => "true",
			        'description' => 'See Slick docs',
			        'values' => '"false","true"'
		        ],
		        'variable_width' => [
			        'default' => "false",
			        'description' => 'See Slick docs',
			        'values' => '"false","true"'
		        ],
		        'vertical' => [
			        'default' => "false",
			        'description' => 'See Slick docs',
			        'values' => '"false","true"'
		        ],
		        'vertical_swiping' => [
			        'default' => "false",
			        'description' => 'See Slick docs',
			        'values' => '"false","true"'
		        ],
		        'z_index' => [
			        'default' => "1000",
			        'description' => 'See Slick docs',
			        'values' => 'INT'
		        ],
	        ]
        ]
    ]
];