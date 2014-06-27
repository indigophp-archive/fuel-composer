<?php

/*
 * This file is part of the Fuel Composer package.
 *
 * (c) Indigo Development Team
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Indigo\Fuel\Composer;

\Config::load('composer', true);

foreach (\Config::get('composer.packages', array()) as $package)
{
	Composer::package($package);
}

foreach (\Config::get('composer.modules', array()) as $module)
{
	Composer::module($module);
}
