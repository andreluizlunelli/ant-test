<?php

namespace App\AntPath;

class PathProps
{
    public function __construct(public string $basePath = '')
    {
        $this->basePath = $this->basePath ?: dirname(__DIR__);
    }
}
