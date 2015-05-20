<?php

namespace Zenify\ModularLatteFilters\Tests\DI\FiltersProviderSource;;

use Zenify\ModularLatteFilters\Contract\DI\LatteFiltersProviderInterface;


class MathFilters implements LatteFiltersProviderInterface
{

	/**
	 * {@inheritdoc}
	 */
	public function getFilters()
	{
		return [
			'double' => function ($value) {
				return $value * 2;
			}
		];
	}

}
