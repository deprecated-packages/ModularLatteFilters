<?php

namespace Zenify\ModularLatteFilters\Tests\DI;

use PHPUnit_Framework_TestCase;
use Zenify\ModularLatteFilters\Tests\DI\FiltersProviderSource\MathFilters;


class FiltersProviderTest extends PHPUnit_Framework_TestCase
{

	public function testFilter()
	{
		$filters= new MathFilters;
		$filters = $filters->getFilters();
		$this->assertInternalType('array', $filters);

		$this->assertSame(10, $filters['double'](5));
	}

}
