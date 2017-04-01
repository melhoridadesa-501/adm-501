<?php
require_once __DIR__.'./../vendor/autoload.php';

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$app = new Application();

//twig
$app->register(new Silex\Provider\TwigServiceProvider(),array(
    'twig.path' => 'views',
));

//trasnforma a active em uma variavel global
$app->before(function (Request $request) use ($app) {
    $app['twig']->addGlobal('active', $request->get("_route"));
});

//Debug
$app['debug'] = true;


// GET

$app->get('/', function() use ($app){
    return $app['twig']->render('index.twig');
})->bind('index');

$app->get('/noticia', function() use ($app){
    return $app['twig']->render('pages/noticia.twig');
})->bind('noticia');

$app->get('/idoso', function() use ($app){
    return $app['twig']->render('pages/idoso.twig');
})->bind('idoso');

$app->get('/contato', function() use ($app){
    return $app['twig']->render('pages/contato.twig');
})->bind('contato');

$app->get('/admin', function() use ($app){
    return $app['twig']->render('pages/admin.twig');
})->bind('admin');

$app->run();