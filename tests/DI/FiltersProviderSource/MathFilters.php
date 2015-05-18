<?php

namespace Zenify\ModularLatteFilters\Tests\DI\FiltersProviderSource;;

use Zenify\ModularLatteFilters\DI\FiltersProviderInterface;


class MathFilters implements FiltersProviderInterface
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
