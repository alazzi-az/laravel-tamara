<?php

namespace AlazziAz\Tamara\Commands;

use Illuminate\Console\Command;

class TamaraCommand extends Command
{
    public $signature = 'laravel-tamara';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
