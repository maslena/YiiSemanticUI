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
		// uncomment the following to enable URLs in path-format
		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName'=>false,
			'rules'=>array(
				'<module:\w+>/<controller:\w+>/<action:\w+>/<id:(.*?)>' => '<module>/<controller>/<action>/<id>',
				'<module:\w+>/<controller:\w+>/<action:\w+>' => '<module>/<controller>/<action>',
				'<module:\w+>/<action:\w+>/<id:(.*?)>' => '<module>/default/<action>/<id>',
				'<module:\w+>/<action:\w+>' => '<module>/default/<action>',
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
	),
);
