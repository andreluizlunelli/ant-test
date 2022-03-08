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

    public function path(): string
    {
        return Str::remove($this->props->basePath, $this->fileInfo->getPath());
    }

    public function fullPath(): string
    {
        return Str::remove($this->props->basePath, $this->fileInfo->getPath()) . '/' . $this->fileName();
    }

    public function fileName(): string
    {
        return $this->fileInfo->getFilename();
    }

    public function isTestFile(): bool
    {
        return Str::contains($this->path(), '/tests');
    }

    public function isFromVendor(): bool
    {
        return Str::contains($this->path(), '/vendor/');
    }
}
