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
        static::updateFrontEnd();
        static::updateControllers();
        static::updateRoutes();
    }

    protected static function updateFrontEnd()
    {
        (new Filesystem)->delete(resource_path('views/welcome.blade.php'));
        copy(__DIR__ . '/resources/assets/sass/app.scss', resource_path('assets/sass/app.scss'));
        (new Filesystem)->copyDirectory(__DIR__.'/resources/views', resource_path('views'));
    }

    protected static function updateControllers()
    {
        (new Filesystem)->copyDirectory(__DIR__.'/controllers/', app_path('Http/Controllers/'));
    }

    protected static function updateRoutes()
    {
        file_put_contents(
            base_path('routes/web.php'),
            file_get_contents(__DIR__.'/routes/web.php')
        );
    }
}
