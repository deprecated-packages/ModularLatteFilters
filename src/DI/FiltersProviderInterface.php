<?php

/**
 * This file is part of Zenify.
 * Copyright (c) 2015 Tomas Votruba (http://tomasvotruba.cz)
 */

namespace Zenify\ModularLatteFilters\DI;


interface FiltersProviderInterface
{

	/**
	 * @return callable[]
	 */
	function getFilters();

}
