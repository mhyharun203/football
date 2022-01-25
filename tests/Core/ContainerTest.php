<?php

namespace AppTests\Core;

use App\Core\Container;
use PHPUnit\Framework\TestCase;

class ContainerTest extends TestCase
{


    public function testSet(): void
    {
        $value = 'blatt';

        $container = new Container();
        $container->set($key = 'baum', $value);
        $message = $container->get($key);


        self::assertSame($value, $message);
    }



    public function testSetNegativ(): void
    {

        $value = 'philippisthässlich';
        $container = new Container();
        $container->set($key = 'baum', $value);
        $message = $container->get($key);



        self::assertNotSame($value,$message='Philippistgay');


    }




}