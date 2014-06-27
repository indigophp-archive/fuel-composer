<?php

/*
 * This file is part of the Indigo Composer package.
 *
 * (c) Indigo Development Team
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Indigo\Fuel;

/**
 * Composer helper class
 *
 * Helps development and Fuel 1.x autoloading
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
class Composer
{
	/**
	 * Searches for an autoloader instance in the given path
	 *
	 * @param string $path
	 *
	 * @return boolean
	 */
	public static function path($path)
	{
		$loaders = spl_autoload_functions();
		$loader = require $path;

		// Check whether autoloader is registered at all
		if ($loaders and in_array(array($loader, 'loadClass'), $loaders))
		{
			$loader->unregister();

			return spl_autoload_register(array(new Loader($loader), 'loadClass'));
		}

		return false;
	}

	/**
	 * Replaces an autoloader in a package to help development
	 *
	 * @param string $package
	 *
	 * @return boolean
	 */
	public static function package($package)
	{
		if ($package = \Package::exists($package))
		{
			return static::path($package . 'vendor/autoload.php');
		}

		return false;
	}

	/**
	 * Replaces an autoloader in a module to help development
	 *
	 * @param string $module
	 *
	 * @return boolean
	 */
	public static function module($module)
	{
		if ($module = \Module::exists($module))
		{
			return static::path($module . 'vendor/autoload.php');
		}

		return false;
	}
}
