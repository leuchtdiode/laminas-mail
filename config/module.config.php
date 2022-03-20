<?php
namespace Mail;

use Doctrine\ORM\Mapping\Driver\AttributeDriver;
use Mail\Command\Queue\Send;

return [

	'doctrine' => [
		'driver' => [
			'mail_entities' => [
				'class' => AttributeDriver::class,
				'cache' => 'array',
				'paths' => [ __DIR__ . '/../src' ],
			],
			'orm_default'   => [
				'drivers' => [
					'Mail' => 'mail_entities',
				],
			],
		],
	],

	'console' => [
		'commands' => [
			Send::class,
		],
	],

	'service_manager' => [
		'abstract_factories' => [
			DefaultFactory::class,
		],
	],

	'controllers' => [
		'abstract_factories' => [
			DefaultFactory::class,
		],
	],
];