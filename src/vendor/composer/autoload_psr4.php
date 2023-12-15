<?php

// autoload_psr4.php @generated by Composer

$vendorDir = dirname(__DIR__);
$baseDir = dirname($vendorDir);

return array(
    'Twig\\' => array($vendorDir . '/twig/twig/src'),
    'Symfony\\Polyfill\\Mbstring\\' => array($vendorDir . '/symfony/polyfill-mbstring'),
    'Symfony\\Polyfill\\Ctype\\' => array($vendorDir . '/symfony/polyfill-ctype'),
    'Psr\\Container\\' => array($vendorDir . '/psr/container/src'),
    'Model\\' => array($baseDir . '/app/Model'),
    'Faker\\' => array($vendorDir . '/fakerphp/faker/src/Faker'),
    'Database\\' => array($baseDir . '/app/Database'),
    'Controller\\' => array($baseDir . '/app/Controller'),
    'App\\' => array($baseDir . '/app'),
);
