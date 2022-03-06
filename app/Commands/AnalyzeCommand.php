<?php

namespace App\Commands;

use App\Actions\Analyze;
use App\AntPath\File;
use App\AntPath\FileIterator;
use App\AntPath\PathProps;
use LaravelZero\Framework\Commands\Command;

class AnalyzeCommand extends Command
{
    protected $signature = 'analyze {file?}';

    protected $description = 'Analyze if the tests files or classes in directory, match with his corresponding business classes or files';

    public function handle()
    {
        $iterator = new FileIterator(new PathProps(dirname(dirname(__DIR__))));

        $iterator->testFiles()->each(function (File $file) {
            $this->info($file->fullPath());
        });
    }
}
