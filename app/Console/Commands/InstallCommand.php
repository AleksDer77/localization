<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
    protected $signature = 'install';

    protected $description = 'Установка приложения';

    public function handle()
    {
        $this->call(command: InstallLanguagesCommand::class);

        $this->info('Приложение установлено');
    }
}
