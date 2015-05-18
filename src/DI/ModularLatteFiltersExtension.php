<?php

/**
 * This file is part of Zenify.
 * Copyright (c) 2015 Tomas Votruba (http://tomasvotruba.cz)
 */

namespace Zenify\ModularLatteFilters\DI;

use Latte\Engine;
use Nette\DI\CompilerExtension;


class ModularLatteFiltersExtension extends CompilerExtension
{

	public function beforeCompile()
	{
		$builder = $this->getContainerBuilder();
		$builder->prepareClassList();

		$latteEngine = $builder->getDefinition($builder->getByType(Engine::class));
		foreach ($builder->findByType(FiltersProviderInterface::class) as $filterProviderDefinition) {
			$latteEngine->addSetup(
				'foreach (?->getFilters() as $name => $callback) {
					?->addFilter($name, $callback);
				}',
				['@' . $filterProviderDefinition->getClass(), '@self']
			);
		}
	}

}
