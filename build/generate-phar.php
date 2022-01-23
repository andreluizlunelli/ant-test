<?php
try {
    unlink(dirname(__DIR__) . '/dist/ant-test.phar');
    $p = new Phar(dirname(__DIR__) . '/dist/ant-test.phar', 0, 'ant-test.phar');
    $p = $p->convertToExecutable();

    $p->startBuffering();
    $p->buildFromIterator(new RecursiveIteratorIterator(new RecursiveDirectoryIterator( dirname(__DIR__) . '/src')), dirname(__DIR__));
    $p['vendor/autoload.php'] = file_get_contents(dirname(__DIR__) . '/vendor/autoload.php');
    $p['index.php'] = file_get_contents(dirname(__DIR__) . '/index.php');
    $p->stopBuffering();

} catch (Exception $e) {
    echo 'Could not open Phar: ', $e;
}

__HALT_COMPILER();