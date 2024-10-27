<?php

namespace Insoutt\EcValidatorLaravel\Commands;

use Illuminate\Console\Command;

class EcValidatorLaravelCommand extends Command
{
    public $signature = 'ec-validator-laravel';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
