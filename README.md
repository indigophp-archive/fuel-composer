# Fuel Composer

**Fuel 1.x package to help development with Composer.**

This package has multiple purposes:

* It eases the development by loading autoload files from packages
* Registers a custom autoloader and autoloads classes with calling `_init` function where possible


## Install

Via Composer

``` json
{
    "require": {
        "indigophp/fuel-composer": "@stable"
    }
}
```

## Usage

If you want to use only the autoloader feature you are done by installing this package.

If you want to use the package for development:

1. Load this package in Fuel
2. Create config by issuing `oil g config composer`
3. Edit `APPPATH/config/composer.php`

## Contributing

Please see [CONTRIBUTING](https://github.com/indigophp/fuel-composer/blob/develop/CONTRIBUTING.md) for details.


## Credits

- [Márk Sági-Kazár](https://github.com/sagikazarmark)
- [All Contributors](https://github.com/indigophp/fuel-composer/contributors)


## License

The MIT License (MIT). Please see [License File](https://github.com/indigophp/fuel-composer/blob/develop/LICENSE) for more information.
