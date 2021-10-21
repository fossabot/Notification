<?php
/**
 * Rector configuration.
 *
 * @package notification
 */

declare(strict_types=1);

use Rector\Core\Configuration\Option;
use Rector\Set\ValueObject\DowngradeSetList;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function ( ContainerConfigurator $container_configurator ) {
	$container_configurator->import( DowngradeSetList::PHP_80 );
	$container_configurator->import( DowngradeSetList::PHP_74 );
	$container_configurator->import( DowngradeSetList::PHP_73 );
	$container_configurator->import( DowngradeSetList::PHP_72 );
	$container_configurator->import( DowngradeSetList::PHP_71 );

	$services = $container_configurator->services();

	$services->set( DowngradeParameterTypeWideningRector::class )
		->call( 'configure', [
			[
				DowngradeParameterTypeWideningRector::SAFE_TYPES => [],
				DowngradeParameterTypeWideningRector::SAFE_TYPES_TO_METHODS => [],
			],
		] );

	$parameters = $container_configurator->parameters();

	$parameters->set( Option::PATHS, [
		__DIR__ . '/resources/templates',
		__DIR__ . '/src',
	] );
	$parameters->set( Option::SKIP, [
		__DIR__ . '/tests/_wordpress',
	] );
};
