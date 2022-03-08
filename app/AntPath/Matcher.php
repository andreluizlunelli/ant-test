<?php

namespace App\AntPath;

class Matcher
{
    public function __construct(public File $business, public File $test)
    {
    }

    public function match(): bool
    {
        return $this->matchName() && $this->matchPath();
    }

    public function matchName()
    {
        return $this->test->fileName() === str_replace('.php', 'Test.php', $this->business->fileName());
    }

    public function matchPath(): bool
    {
        $count = 1;

        return str_replace('app', '', $this->business->path(), $count)
            === str_replace('tests', '', $this->test->path(), $count);
    }
}
