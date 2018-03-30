<?php
/**
 * Weave Zend Config Adaptor.
 */
namespace Weave\Config\Zend;

use Zend\ConfigAggregator\ConfigAggregator;
use Zend\ConfigAggregator\ZendConfigProvider;

/**
 * Weave Zend Config Adaptor.
 */
trait Zend
{
	/**
	 * Load config and return as an array.
	 *
	 * Loads <emvironment>.{json, xml, ini} from configLocation.
	 *
	 * @param string $environment    Runtime environment.
	 * @param string $configLocation Location from which to load config.
	 *
	 * @return array
	 */
	protected function loadConfig($environment = null, $configLocation = null)
	{
		$aggregator = new ConfigAggregator(
			[
				new ZendConfigProvider(realpath($configLocation . '/') . '/' . $environment . '.{json,xml,ini}'),
			]
		);
		return $aggregator->getMergedConfig();
	}
}
