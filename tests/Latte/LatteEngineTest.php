<?php

namespace Zenify\ModularLatteFilters\Tests\Latte;

use Latte\Engine;
use PHPUnit_Framework_TestCase;
use Zenify\ModularLatteFilters\Tests\ContainerFactory;


class LatteEngineTest extends PHPUnit_Framework_TestCase
{

	public function testInvokeFilter()
	{
		$container = (new ContainerFactory)->create();

		/** @var Engine $latte */
		$latte = $container->getByType(Engine::class);
		$this->assertSame(10, $latte->invokeFilter('double', [5]));
	}

}
