<?php

namespace Andreluizlunelli\AntTest;

use Andreluizlunelli\AntTest\HelloWorld\HelloWorld;

class Main
{
    public static function run(array $args)
    {
        $helloWorld = new HelloWorld();
        $helloWorld->sayHello();
    }
}