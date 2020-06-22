<?php

/*
 * NOTE.. Attribute names may be in camel case to match a library.
 */
$controllerClass = 'WPEasyFeatures\Modules\Placeholders\Controller\ModuleController';

return [
	'moduleName'        => 'Placeholders',
	'moduleDescription' => 'Adds shortcodes for variable placeholders',
	'modulePrefix'      => 'wpe_placeholder',


	'settings' =>
		[
			'optionName' => 'wpe_placeholders',
			'capability' => 'manage_options'
		],

	'shortcodes' => [
		'wpe_company_trading_name'   => [
			'enclosing'   => false,
			'description' => 'The Companies Trading Name. Used to populate policies etc.',
			'callback'    => $controllerClass . '::wpe_company_trading_name',
			'attributes'  => []
		],
		'wpe_company_legal_name'     => [
			'enclosing'   => false,
			'description' => 'The Companies Legal Name. Used to populate policies etc.',
			'callback'    => $controllerClass . '::wpe_company_legal_name',
			'attributes'  => []
		],
		'wpe_company_abn_acn'        => [
			'enclosing'   => false,
			'description' => 'The Companies ABN. Used to populate policies etc.',
			'callback'    => $controllerClass . '::wpe_company_abn_acn',
			'attributes'  => []
		],
		'wpe_company_phone'          => [
			'enclosing'   => false,
			'description' => 'The Companies Phone. Used to populate policies etc.',
			'callback'    => $controllerClass . '::wpe_company_phone',
			'attributes'  => []
		],
		'wpe_company_email'          => [
			'enclosing'   => false,
			'description' => 'The Companies Email Address. Used to populate policies etc.',
			'callback'    => $controllerClass . '::wpe_company_email',
			'attributes'  => []
		],
		'wpe_company_address'        => [
			'enclosing'   => false,
			'description' => 'The Companies Street Address. Used to populate policies etc.',
			'callback'    => $controllerClass . '::wpe_company_address',
			'attributes'  => [
				'toHtml' => [
					'default'     => "false",
					'description' => 'If true, replaces \\r\\n with ' . htmlspecialchars( '<br/>' ),
					'values'      => '"true","false"'
				]
			]
		],
		'wpe_company_postal_address' => [
			'enclosing'   => false,
			'description' => 'The Companies Postal Address. Used to populate policies etc.',
			'callback'    => $controllerClass . '::wpe_company_postal_address',
			'attributes'  => [
				'toHtml' => [
					'default'     => "false",
					'description' => 'If true, replaces \\r\\n with ' . htmlspecialchars( '<br/>' ),
					'values'      => '"true","false"'
				]
			]
		],
		'wpe_site_url' => [
			'enclosing'   => false,
			'description' => 'Your website URL',
			'callback'    => $controllerClass . '::wpe_site_url',
			'attributes'  => []
		],
        'wpe_year' => [
            'enclosing'   => false,
            'description' => 'Current Year',
            'callback'    => $controllerClass . '::wpe_year',
            'attributes'  => []
        ]
	],
	'templates' => [
		[
			'name' => 'Privacy Policy V1',
			'description' => 'A Basic privacy policy using placeholders from teh WPEasy Placholeders module',
			'file' => 'privacy_v1.html'

		],
		[
			'name' => 'Cookie Policy V1',
			'description' => 'A Basic Cookie policy using placeholders from teh WPEasy Placholeders module',
			'file' => 'cookie_policy.html'

		]
	]
];
