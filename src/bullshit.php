<?php


require __DIR__ . '/../vendor/autoload.php';


$container = new App\Core\Container();
$baum = $container->set('baum', 'blatt');
$a = $container->get('baum');
var_dump($a);