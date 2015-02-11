<?php
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'aliases' => array(
        'sui' => 'ext.YiiSemanticUI',
    ),

	// Preloading Semantic UI. Use this if you would like it applied site-wide.
	//'preload'=>array(
	//	'sui',
	//),

	// Loading the Semantic UI Examples Module
	'modules'=>array(
		'semantic'=>array(
			'preload'=>array(
				'sui',
			),
			'components'=>array(
				'sui' => array(
					'class' => 'sui.components.YiiSemanticUI',
				),
			),
		),
	),

	// application components
	'components'=>array(
		'sui' => array(
			'class' => 'sui.components.YiiSemanticUI',
		),
	),
);
