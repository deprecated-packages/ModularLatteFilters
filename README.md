# Zenify/ModularLatteFilters

[![Build Status](https://img.shields.io/travis/Zenify/ModularLatteFilters.svg?style=flat-square)](https://travis-ci.org/Zenify/ModularLatteFilters)
[![Quality Score](https://img.shields.io/scrutinizer/g/Zenify/ModularLatteFilters.svg?style=flat-square)](https://scrutinizer-ci.com/g/Zenify/ModularLatteFilters)
[![Code Coverage](https://img.shields.io/scrutinizer/coverage/g/Zenify/ModularLatteFilters.svg?style=flat-square)](https://scrutinizer-ci.com/g/Zenify/ModularLatteFilters)
[![Downloads this Month](https://img.shields.io/packagist/dm/zenify/modular-latte-filters.svg?style=flat-square)](https://packagist.org/packages/zenify/modular-latte-filters)
[![Latest stable](https://img.shields.io/packagist/v/zenify/modular-latte-filters.svg?style=flat-square)](https://packagist.org/packages/zenify/modular-latte-filters)


## Install

Via Composer:

```sh
$ composer require zenify/modular-latte-filters
```

Register the extension in `config.neon`:

```yaml
extensions:
	- Zenify\ModularLatteFilters\DI\ModularLatteFiltersExtension
```


## Usage

Create class implementing `Zenify\ModularLatteFilters\DI\FiltersProviderInterface`:

```php
namespace App\Modules\SomeModule\Latte;

use Zenify\ModularLatteFilters\DI\FiltersProviderInterface;


class SomeFilters implements FiltersProviderInterface
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
```

Register it to `config.neon`:

```yaml
services:
	- App\Modules\SomeModule\Latte\SomeFilters
```

That's it!



## Testing

```sh
$ phpunit
```


## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.
