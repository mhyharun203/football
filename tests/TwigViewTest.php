<?php
declare(strict_types=1);


use PHPUnit\Framework\TestCase;

class TwigViewTest extends TestCase {

    private $testData = ['hallo' =>"h",
        'baum' => 'wie gehts',
        'busch' => 'was machst du'
    ];



    public function testRender() {
        $twig = new \App\TwigView();
        $loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../../football/src/View');
        $this->twig = new \Twig\Environment($loader);


        self::assertSame($this->testData['hallo'],$this->twig->render('testTemplate.twig'),'hallo');
    }

}