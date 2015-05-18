<?php

namespace Zenify\ModularLatteFilters\Tests\DI;

use Latte\Engine;
use Nette\DI\Compiler;
use PHPUnit_Framework_TestCase;
use Zenify\ModularLatteFilters\DI\ModularLatteFiltersExtension;
use Zenify\ModularLatteFilters\Tests\DI\FiltersProviderSource\MathFilters;


class ModularLatteFiltersExtensionTest extends PHPUnit_Framework_TestCase
{

	public function testLoadTaggedServices()
	{
		$extension = $this->getExtension();
		$builder = $extension->getContainerBuilder();

		$builder->addDefinition($extension->prefix('someFilters'))
			->setClass(MathFilters::class);

		$extension->loadConfiguration();

		$latteEngine = $builder->addDefinition('latte.engine')
			->setClass(Engine::class);

		$this->assertCount(0, $latteEngine->getSetup());

		$extension->beforeCompile();
		$this->assertCount(1, $latteEngine->getSetup());
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
