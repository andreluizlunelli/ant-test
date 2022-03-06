<?php

namespace App\AntPath;

use Illuminate\Support\Collection;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;

class FileIterator
{
    public function __construct(public PathProps $props)
    {}

    public function files(): Collection
    {
        $files = collect();

        $objects = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($this->props->basePath));

        foreach($objects as $object) {
            if (!$object->isFile()) {
                continue;
            }

            $file = File::fromFileInfo($object);

            if ($file->isFromVendor()) {
                continue;
            }

            $files[] = $file;
        }

        return $files;
    }

    public function testFiles(): Collection
    {
        return $this->files()->filter(fn(File $file) => $file->isTestFile());
    }
}
