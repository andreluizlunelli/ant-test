<?php

namespace App\AntPath;

use Illuminate\Support\Collection;

class MatchIterator
{
    public function __construct(public FileIterator $fileIterator, public Matcher $matcher)
    {}

    public function notMatch(): Collection
    { // todo conf to ignore folders

        $matchesThatDoNotMatch = collect();

        $businessFiles = $this->fileIterator->businessFiles();

        foreach ($this->fileIterator->testFiles() as $test) {
            $matches = $this->seekForMatch($test, $businessFiles);

            $matchesThatDoNotMatch[] = $matches;
        }

        return $matchesThatDoNotMatch->filter();
    }

    private function seekForMatch(File $test, Collection $businessFiles): ?Matcher
    {
        foreach ($businessFiles as $business) {
            $matcher = new Matcher($business, $test);
            if ($matcher->match()) {
                return $matcher;
            }
        }

        return null;
    }
}