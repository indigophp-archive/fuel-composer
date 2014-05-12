<?php

/**
 * Part of Fuel Composer package.
 *
 * @package 	Fuel
 * @subpackage	Composer
 * @version 	1.0
 * @author		Indigo Development Team
 * @license 	MIT License
 * @copyright	2013 - 2014 Indigo Development Team
 * @link		https://indigophp.com
 */

\Config::load('composer', true);

function composer($path)
{
	$loader = require_once($path . 'vendor/autoload.php');
	$loader->unregister();
	spl_autoload_register(array(new CustomLoader($loader), 'loadClass'));
}

foreach (\Config::get('composer.packages', array()) as $package)
{
	if ($package = \Package::exists($package))
	{
		composer($package);
	}
}

foreach (\Config::get('composer.modules', array()) as $module)
{
	if ($module = \Module::exists($module))
	{
		composer($module);
	}
}
