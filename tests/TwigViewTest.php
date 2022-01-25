<?php
declare(strict_types=1);

namespace AppTests;

use PHPUnit\Framework\TestCase;

class TwigViewTest extends TestCase
{

    private $testData = ['hallo' => "h",
        'baum' => 'wie gehts',
        'busch' => 'was machst du'
    ];


    public function testRender()
    {
        $twig = new \App\TwigView();
        $loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../../football/src/View');
        $this->twig = new \Twig\Environment($loader);

        $message = $this->twig->render('testTemplate.twig', ['hallo']);
        $this->assertStringContainsString($this->testData['hallo'], $message);


    }


    public function testRenderNegativ()
    {
        $twig = new \App\TwigView();
        $loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../../football/src/View');
        $this->twig = new \Twig\Environment($loader);


        $message = $this->twig->render('testTemplate.twig', ['hallo']);
        $this->assertStringNotContainsString($this->testData['baum'], $message);
    }

}


