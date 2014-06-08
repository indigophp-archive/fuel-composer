<?php

/*
 * This file is part of the Fuel Composer package.
 *
 * (c) Indigo Development Team
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

\Config::load('composer', true);

function composer($path)
{
	$loader = require($path . 'vendor/autoload.php');
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
