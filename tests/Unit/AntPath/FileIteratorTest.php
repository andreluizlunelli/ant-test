<?php

use App\AntPath\FileIterator;
use App\AntPath\PathProps;

beforeEach(function () {
    $resourcesPath = dirname(dirname(__DIR__)) . '/Resources';

    app()->bind(PathProps::class, fn() => new PathProps($resourcesPath));
});

it('can make files a collection with test files', function () {
    $fileIterator = resolve(FileIterator::class);

    $files = $fileIterator->files();

    expect($files)->toHaveCount(7);
});