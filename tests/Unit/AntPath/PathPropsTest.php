<?php

use App\AntPath\PathProps;

it('can set default current path', function () {
    $path = dirname(__DIR__);

    expect((new PathProps($path))->basePath)->toBe($path);
});
