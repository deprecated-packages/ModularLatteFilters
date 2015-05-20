<?php

/**
 * This file is part of Zenify.
 * Copyright (c) 2015 Tomas Votruba (http://tomasvotruba.cz)
 */

namespace Zenify\ModularLatteFilters\Contract\DI;


interface LatteFiltersProviderInterface
{

	/**
	 * @return callable[]
	 */
	function getFilters();

}
