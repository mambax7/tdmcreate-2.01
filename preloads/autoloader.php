<?php

$xoops = Xoops::getInstance();
$xoops::loadLocale();
$path = dirname(__DIR__);
$prefix = 'XoopsModules\\' . ucfirst(basename($path));

$psr4loader = new \Xoops\Core\Psr4ClassLoader();
$psr4loader->register();
$psr4loader->addNamespace($prefix, $path . '/class/');
