<?php

namespace App\AntPath;

use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;

class FileIterator
{
    public function __construct(private PathProps $props)
    {}

    public function files()
    {
        $files = collect();

        $objects = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($this->props->basePath));

        foreach($objects as $object){
            if ($object->isFile()) {
                $files[] = File::fromFileInfo($object);
            }
        }

        return $files;
    }
}