<?php

use App\AntPath\File;
use App\AntPath\PathProps;

beforeEach(function () {
    $resourcesPath = dirname(dirname(__DIR__)) . '/Resources';

    app()->bind(PathProps::class, fn() => new PathProps($resourcesPath));
});

it('can fetch class path from file', function () {
    $file = new SplFileInfo(base_path('tests/Resources/app/BusinessFile.php'));

    expect(File::fromFileInfo($file)->classPath())->toBe('/app');
});

it('can fetch class path from class', function () {
    $file = new SplFileInfo(base_path('tests/Resources/app/BusinessClass.php'));

    expect(File::fromFileInfo($file)->classPath())->toBe('/app');
});
