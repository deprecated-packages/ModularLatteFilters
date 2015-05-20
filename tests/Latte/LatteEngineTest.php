<?php

namespace Zenify\ModularLatteFilters\Tests\Latte;

use Latte\Engine;
use Nette\Bridges\ApplicationLatte\ILatteFactory;
use PHPUnit_Framework_TestCase;
use Zenify\ModularLatteFilters\Tests\ContainerFactory;


class LatteEngineTest extends PHPUnit_Framework_TestCase
{

	public function testInvokeFilterInLatte()
	{
		$container = (new ContainerFactory)->createWithConfig(__DIR__ . '/../config/latteApplication.neon');

		/** @var ILatteFactory $latteFactory */
		$latteFactory = $container->getByType(ILatteFactory::class);
		$latteEngine = $latteFactory->create();

		$this->assertSame(10, $latteEngine->invokeFilter('double', [5]));
	}


	public function testInvokeFilterInLatteFactory()
	{
		$container = (new ContainerFactory)->createWithConfig(__DIR__ . '/../config/latteOnly.neon');

		/** @var Engine $latteEngine */
		$latteEngine = $container->getByType(Engine::class);

		$this->assertSame(10, $latteEngine->invokeFilter('double', [5]));
	}

}
