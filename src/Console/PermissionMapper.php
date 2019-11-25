<?php

namespace Torralbodavid\DuckFunkCore\Console;

use Illuminate\Console\Command;

class PermissionMapper extends Command
{
    protected $signature = 'duck-funk:permissions';
    protected $description = 'Map Arcturus permission with Duck Funk permissions';

    public function handle()
    {
        $name = $this->anticipate('What is your name?', ['Taylor', 'Dayle']);
    }
}
