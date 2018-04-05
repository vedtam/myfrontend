<?php

namespace Vedtam\Presets\MyFrontend;

use Illuminate\Container\Container;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Arr;
use Illuminate\Foundation\Console\Presets\Preset;

class MyFrontendPreset extends Preset
{
    public static function install()
    {
        static::updateWelcomePage();
    }
    protected static function updateWelcomePage()
    {
        (new Filesystem)->delete(resource_path('views/welcome.blade.php'));
        copy(__DIR__ . '/frontend-stubs/master.blade.php', resource_path('views/master.blade.php'));

        // (new Filesystem)->copyDirectory(__DIR__.'/bootstrap-stubs/views', resource_path('views'));
    }
}
