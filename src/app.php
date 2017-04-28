<?php

use Silex\Application;
use Silex\Provider\AssetServiceProvider;
use Silex\Provider\TwigServiceProvider;
use Silex\Provider\ServiceControllerServiceProvider;
use Silex\Provider\HttpFragmentServiceProvider;

$app = new Application();
$app->register(new ServiceControllerServiceProvider());
$app->register(new AssetServiceProvider());
$app->register(new TwigServiceProvider());
$app->register(new HttpFragmentServiceProvider());

$app->register(new Silex\Provider\DoctrineServiceProvider(), array('db.options' => array(
    'driver'    => $param_driver,
    'host' => $param_host,
    'dbname'    => $param_dbname,
    'user'     => $param_user,
    'password'  => $param_password,
    'charset'   => $param_charset,
)));

$app['twig'] = $app->extend('twig', function ($twig, $app) {
    // add custom globals, filters, tags, ...

    return $twig;
});

return $app;
