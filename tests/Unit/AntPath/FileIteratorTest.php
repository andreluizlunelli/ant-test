<?php

use App\AntPath\FileIterator;
use App\AntPath\PathProps;

beforeEach(function () {
    $resourcesPath = dirname(dirname(__DIR__)) . '/Resources';

    app()->bind(PathProps::class, fn() => new PathProps($resourcesPath));
});

it('can make a collection from test files', function () {
    /** @var FileIterator $fileIterator */
    $fileIterator = resolve(FileIterator::class); // todo use array recursive iterator to represent folder structure @see https://www.php.net/manual/en/class.recursivearrayiterator.php

    $files = $fileIterator->testFiles();

    expect($files)->toHaveCount(3);
});
