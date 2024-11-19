<?php
namespace vahidkaargar\LaravelDepartments\ServiceProviders;

use Illuminate\Support\ServiceProvider;

class DepartmentsServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../Configs/departments.php', 'departments');
        $this->loadMigrationFrom(__DIR__ . '/../Database/Migrations');
    }

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../Configs/departments.php' => config_path('departments.php'),
            ], 'departments-config');
        }

        require_once __DIR__ . '/../Helpers/helpers.php';
    }
}