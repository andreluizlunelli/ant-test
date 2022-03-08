<?php

use App\AntPath\AdviceMatch;
use App\AntPath\Matcher;
use App\AntPath\MatchIterator;
use App\AntPath\PathProps;

beforeEach(function () {
    $resourcesPath = dirname(dirname(__DIR__)) . '/Resources';

    app()->bind(PathProps::class, fn() => new PathProps($resourcesPath));
});

it('can iterate over test files and check if file doesnt match with business class', function () {
    /** @var MatchIterator $iterator */
    $iterator = resolve(MatchIterator::class);

    $canMatchesWith = ['MyServiceTest', 'UsersTest'];

    $onlyNames = fn (Matcher $matcher): string => $matcher->test->fileName();

    expect($iterator->notMatch()->map($onlyNames)->toArray())->toBe($canMatchesWith);
});