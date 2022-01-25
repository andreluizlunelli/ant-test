<?php
Phar::mapPhar('ant-test.phar');

include_once 'phar://ant-test.phar/src/autoload.php';

\Andreluizlunelli\AntTest\Main::run($argv);

__HALT_COMPILER();