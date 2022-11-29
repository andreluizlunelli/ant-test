<?php

use App\AntPath\File;
use App\AntPath\Matcher;
use App\AntPath\PathProps;

beforeEach(function () {
    $resourcesPath = dirname(dirname(__DIR__)) . '/Resources';

    app()->bind(PathProps::class, fn() => new PathProps($resourcesPath));
});

it('can match business path with test path', function () {
    $business = File::fromFileInfo(
        new SplFileInfo(base_path('tests/Resources/app/Model/Team.php'))
    );

    $testClass = File::fromFileInfo(
        new SplFileInfo(base_path('tests/Resources/tests/Model/TeamTest.php'))
    );

    expect((new Matcher($business, $testClass))->matchPath())->toBeTrue();
});

it('can match wrong business name with s with test name', function () {
    $business = File::fromFileInfo(
        new SplFileInfo(base_path('tests/Resources/app/Model/Team.php'))
    );

    $testClass = File::fromFileInfo(
        new SplFileInfo(base_path('tests/Resources/tests/Model/TeamTest.php'))
    );

    expect((new Matcher($business, $testClass))->matchName())->toBeTrue();
});
