<?php

declare(strict_types=1);

namespace Zenify\ModularLatteFilters\Tests\DI;

use PHPUnit\Framework\TestCase;
use Zenify\ModularLatteFilters\Tests\DI\FiltersProviderSource\MathFilters;


final class FiltersProviderTest extends TestCase
{

	public function testFilter()
	{
		$filters = (new MathFilters)->getFilters();
		$this->assertInternalType('array', $filters);

		$this->assertSame(10, $filters['double'](5));
	}

}
