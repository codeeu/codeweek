<?php


namespace App\Achievements\Console;


use Illuminate\Console\Command;

class GenerateAchievementCommand extends Command
{
    protected $signature = 'make:achievement {name}';

    protected $description = 'Generate a new Achievement class stub.';

    public function handle()
    {
        $path = app_path('Achievements/Types/'.$this->argument('name') . '.php');

        file_put_contents($path, $this->compileTemplate());

        $this->info($path . ' was created!');
    }

    protected function compileTemplate()
    {
        $stub = file_get_contents(app_path('Achievements/Console/achievement.stub'));

        return str_replace('{{CLASS}}',$this->argument('name'), $stub);
    }
}