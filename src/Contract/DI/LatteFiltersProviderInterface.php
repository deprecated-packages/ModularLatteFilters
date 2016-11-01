<?php

declare(strict_types = 1);

/*
 * This file is part of Zenify.
 * Copyright (c) 2015 Tomas Votruba (http://tomasvotruba.cz)
 */

namespace Zenify\ModularLatteFilters\Contract\DI;


interface LatteFiltersProviderInterface
{

	/**
	 * @return callable[]
	 */
	public function getFilters() : array;

}
