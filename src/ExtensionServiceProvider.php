<?php

namespace MasterDmx\LaravelExtension;

use Illuminate\Support\ServiceProvider;

class ExtensionServiceProvider extends ServiceProvider
{
    public function register()
    {
        include substr(__DIR__, 0, -4) . DIRECTORY_SEPARATOR . 'functions.php';
        include 'func.php';
    }
}
