<?php

namespace Zenify\ModularLatteFilters\Tests;

use Nette\Configurator;
use Nette\DI\Container;


class ContainerFactory
{

	/**
	 * @param string $config
	 * @return Container
	 */
	public function createWithConfig($config)
	{
		$configurator = new Configurator;
		$configurator->setTempDirectory(TEMP_DIR);
		$configurator->addConfig($config);
		return $configurator->createContainer();
	}

}
