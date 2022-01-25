<?php
try {
    unlink(dirname(__DIR__) . '/dist/ant-test.phar');
    $phar = new Phar(dirname(__DIR__) . '/dist/ant-test.phar', 0, 'ant-test.phar');
    $phar = $phar->convertToExecutable();
    $phar->setStub(file_get_contents( dirname(__DIR__) . "/build/stub.php"));

    $phar->startBuffering();
    $phar->buildFromIterator(new RecursiveIteratorIterator(new RecursiveDirectoryIterator( dirname(__DIR__) . '/src')), dirname(__DIR__));
    $phar->stopBuffering();

} catch (Exception $e) {
    echo 'Could not open Phar: ', $e;
}

__HALT_COMPILER();