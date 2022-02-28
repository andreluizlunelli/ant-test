<?php

namespace App\AntPath;

class Matcher
{
    public function __construct(private PathProps $props)
    {
    }

    public function path(File $business, File $test): bool
    {
        $count = 1;

        return str_replace('app', '', $business->classPath(), $count)
            === str_replace('tests', '', $test->classPath(), $count);
    }
}