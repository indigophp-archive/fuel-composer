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

// Check whether there is a VENDORPATH
if (defined('VENDORPATH'))
{
	Composer::path(VENDORPATH.'autoload.php');
}
