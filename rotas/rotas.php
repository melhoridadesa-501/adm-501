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

$app->get('/noticiaform', function() use ($app){
    return $app['twig']->render('pages/noticia/noticiaform.twig');
})->bind('noticiaform');

$app->get('/noticialist', function() use ($app){
    return $app['twig']->render('pages/noticia/noticialist.twig');
})->bind('noticialist');

$app->get('/idosolist', function() use ($app){
    return $app['twig']->render('pages/idoso/idosolist.twig');
})->bind('idosolist');

$app->get('/contatolist', function() use ($app){
    return $app['twig']->render('pages/contato/contatolist.twig');
})->bind('contatolist');

$app->get('/imagemform', function() use ($app){
    return $app['twig']->render('pages/imagem/imagemform.twig');
})->bind('imagemform');

$app->get('/imagemlist', function() use ($app){
    return $app['twig']->render('pages/imagem/imagemlist.twig');
})->bind('imagemlist');

$app->get('/usuarioform', function() use ($app){
    return $app['twig']->render('pages/usuario/usuarioform.twig');
})->bind('usuarioform');

$app->get('/usuariolist', function() use ($app){
    return $app['twig']->render('pages/usuario/usuariolist.twig');
})->bind('usuariolist');

$app->run();