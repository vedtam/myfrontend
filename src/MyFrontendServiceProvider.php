<?php
namespace Vedtam\Presets\MyFrontend;
use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\Console\PresetCommand;

class MyFrontendServiceProvider extends ServiceProvider
{
    public function boot()
    {
        PresetCommand::macro('myfrontend', function ($command) {
            MyFrontendPreset::install();
            $command->info('My frontend scaffolding installed successfully.');
        });
    }
}
