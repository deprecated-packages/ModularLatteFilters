<?php

declare(strict_types = 1);

namespace Zenify\ModularLatteFilters\Tests\DI;

use Latte\Engine;
use Nette\DI\Compiler;
use PHPUnit\Framework\TestCase;
use Zenify\ModularLatteFilters\DI\ModularLatteFiltersExtension;
use Zenify\ModularLatteFilters\Tests\DI\FiltersProviderSource\MathFilters;


final class ModularLatteFiltersExtensionTest extends TestCase
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


	/**
	 * @expectedException \Zenify\ModularLatteFilters\Exception\DI\MissingLatteDefinitionException
	 */
	public function testNoLatteDefinition()
	{
		$extension = $this->getExtension();
		$extension->loadConfiguration();

		$extension->beforeCompile();
	}


	/**
	 * @return ModularLatteFiltersExtension
	 */
	private function getExtension() : ModularLatteFiltersExtension
	{
		$extension = new ModularLatteFiltersExtension;
		$extension->setCompiler(new Compiler, 'compiler');
		return $extension;
	}

}
