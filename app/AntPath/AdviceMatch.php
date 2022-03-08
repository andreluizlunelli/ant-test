<?php

namespace App\AntPath;

class AdviceMatch
{
    public File $business;
    public File $test;

    public function __construct(public Matcher $matcher)
    {
    }

    public static function from(File $business, File $test): self
    {
        $advice = resolve(self::class);
        $advice->business = $business;
        $advice->test = $test;

        return $advice;
    }
}