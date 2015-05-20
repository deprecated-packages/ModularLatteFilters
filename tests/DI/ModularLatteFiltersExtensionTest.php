<?php

namespace Zenify\ModularLatteFilters\Tests\DI;

use Latte\Engine;
use Nette\DI\Compiler;
use PHPUnit_Framework_TestCase;
use Zenify\ModularLatteFilters\DI\ModularLatteFiltersExtension;
use Zenify\ModularLatteFilters\Exception\DI\MissingLatteDefinitionException;
use Zenify\ModularLatteFilters\Tests\DI\FiltersProviderSource\MathFilters;


class ModularLatteFiltersExtensionTest extends PHPUnit_Framework_TestCase
{

	public function testLoadTaggedServices()
	{
		$extension = $this->getExtension();
		$containerBuilder = $extension->getContainerBuilder();

		$containerBuilder->addDefinition($extension->prefix('someFilters'))
			->setClass(MathFilters::class);

		$extension->loadConfiguration();

		$latteEngine = $containerBuilder->addDefinition('latte.engine')
			->setClass(Engine::class);

		$this->assertCount(0, $latteEngine->getSetup());

		$extension->beforeCompile();
		$this->assertCount(1, $latteEngine->getSetup());
	}


	public function testNoLatteDefinition()
	{
		$extension = $this->getExtension();
		$extension->loadConfiguration();

		$this->setExpectedException(MissingLatteDefinitionException::class);
		$extension->beforeCompile();
	}


	/**
	 * @return ModularLatteFiltersExtension
	 */
	private function getExtension()
	{
		$extension = new ModularLatteFiltersExtension;
		$extension->setCompiler(new Compiler, 'compiler');
		return $extension;
	}

}
