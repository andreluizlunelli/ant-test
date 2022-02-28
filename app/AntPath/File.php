<?php

namespace App\AntPath;

use Illuminate\Support\Str;

class File
{
    private \SplFileInfo $fileInfo;

    public function __construct(private PathProps $props)
    {}

    public static function fromFileInfo(\SplFileInfo $file): static
    {
        $that = resolve(static::class);
        $that->fileInfo = $file;

        return $that;
    }

    public function classPath(): string
    {
        return Str::remove($this->props->basePath, $this->fileInfo->getPath());
    }
}