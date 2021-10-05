<?php
declare(strict_types=1);
namespace App;
use Twig\Environment;

require __DIR__ . '/../vendor/autoload.php';


final class TwigView implements ViewInterface {

    private Environment $twig;

    /**
     * @return void
     */
    public function init(): void
    {
        $loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/View');
        $this->twig = new \Twig\Environment($loader);
    }

    /**
     * @param string $template
     * @param array $context
     *
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function render(string $template, array $context): void
    {
        echo $this->twig->render($template, $context);
    }


}


