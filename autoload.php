<?php

class CustomLoader
{
    private $loader;

    public function __construct($loader)
    {
        $this->loader = $loader;
    }

    public function loadClass($class)
    {
        $result = $this->loader->loadClass($class);
        if ($result && method_exists($class, '_init')) {
            call_user_func(array($class, '_init'));
        }

        return $result;
    }
}

$loader = require VENDORPATH.'autoload.php';
$loader->unregister();
spl_autoload_register(array(new CustomLoader($loader), 'loadClass'));
