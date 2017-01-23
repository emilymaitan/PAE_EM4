<?php

use emilymaitan\PAE_EM4\API\iApiConnector;
use emilymaitan\PAE_EM4\API\iParser;
use emilymaitan\PAE_EM4\API\Twitter\iTwitterConnector;
use emilymaitan\PAE_EM4\API\JsonParser;
use emilymaitan\PAE_EM4\API\MockApiConnector;
use emilymaitan\PAE_EM4\API\RestApiConnector;
use emilymaitan\PAE_EM4\API\Twitter\iTwitterParser;
use emilymaitan\PAE_EM4\API\Twitter\TwitterConnector;
use emilymaitan\PAE_EM4\API\Twitter\TwitterParser;
use emilymaitan\PAE_EM4\Controller\ErrorController;
use emilymaitan\PAE_EM4\Controller\HomepageController;
use emilymaitan\PAE_EM4\Controller\ProjectController;
use emilymaitan\PAE_EM4\Controller\SearchController;
use emilymaitan\PAE_EM4\Core\DatabaseMigrationProcessor;
use emilymaitan\PAE_EM4\Core\Router;
use emilymaitan\PAE_EM4\Model\Migration\SampleMigration;

/**
 * This is the configuration for the Auryn dependency injector. It is processed by the FrontController
 *
 * @see https://github.com/rdlowrey/auryn
 */
return [
	/**
	 * By default, the Auryn DIC creates a new instance for an object every time it's needed. If you list a class
	 * here, Auryn won't do that, but reuse the class that already exists.
	 *
	 * Since PHP runs on a per-request basis, you are not really doing any harm by putting your classes here, just
	 * keep it in mind when hunting bugs.
	 */
	'sharedObjects' => [
		PDO::class
	],
	/**
	 * Interfaces are nice. You can list interfaces and their implementations here in order to create a dependency
	 * inversion.
	 *
	 * For example:
	 *
	 * ```
	 * MyInterface::class => MyImplementation::class,
	 * ```
	 */
	'interfaceImplementations' => [
	    iParser::class => JsonParser::class,
        iApiConnector::class => RestApiConnector::class,
        iTwitterParser::class => TwitterParser::class,
        iTwitterConnector::class => TwitterConnector::class
	],
	/**
	 * Provide the class constructor parameters here. Remember, these are named parameters only, if you need classes,
	 * those will be automatically instantiated from your typehints.
	 */
	'classParameters' => [
		/**
		 * URL routing parameters. Use this to direct requests to your controllers
		 */
		Router::class => [
			':errorHandlers' => [
				404 => [ErrorController::class, 'notFound'],
				405 => [ErrorController::class, 'methodNotAllowed'],
				500 => [ErrorController::class, 'error'],
			],
			':routes' => [
				['GET', '/', HomepageController::class, 'homepage'],
                ['GET', '/project/{id:[0-9]+}/{name:[a-zA-Z0-9_%20\-]+}', ProjectController::class, 'project'],
                ['GET', '/search', SearchController::class, 'search'],
                ['GET', '/search/advanced', SearchController::class, 'advancedSearch'],
                ['GET', '/projects', SearchController::class, 'searchByDate'],
                ['GET', '/projects/{year:[0-9]+}', SearchController::class, 'searchByYear'],
                ['GET', '/projects/{year:[0-9]+}/{month:[0-9]+}', SearchController::class, 'searchByMonth'],
                ['GET', '/projects/{year:[0-9]+}/{month:[0-9]+}/{day:[0-9]+}', SearchController::class, 'searchByDay']
			]
		],
		/**
		 * Database connector. Make sure you are using prepared statements to avoid SQL injection vulnerabilities.
		 *
		 * @see http://php.net/manual/en/pdo.prepared-statements.php
		 */
		PDO::class => [
			':dsn'      => 'mysql:host=localhost;dbname=test',
			':username' => 'root',
			':passwd'   => '',
		],
		/**
		 * Database migration classes.
		 */
		DatabaseMigrationProcessor::class => [
			':migrations' => [
				SampleMigration::class
			]
		]
	],
];