<?php

declare(strict_types=1);

namespace Zenify\ModularLatteFilters\Tests\Latte;

use Latte\Engine;
use Nette\Bridges\ApplicationLatte\ILatteFactory;
use PHPUnit\Framework\TestCase;
use Zenify\ModularLatteFilters\Tests\ContainerFactory;


final class LatteEngineTest extends TestCase
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
