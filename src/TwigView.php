<?php
declare(strict_types=1);
namespace App;
require __DIR__ . '/../vendor/autoload.php';




final class TwigView implements ViewInterface {
    public function render($template,$key,$value) {

        $loader = new \Twig\Loader\FilesystemLoader('View');
        $twig = new \Twig\Environment($loader);


        echo $twig->render($template, [$key => $value]);


    }


}


