<?php

namespace vahidkaargar\LaravelDepartments\ServiceProviders;

use Illuminate\Support\ServiceProvider;
use vahidkaargar\LaravelDepartments\Departments;

class DepartmentsServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton('Departments', function () {
            return new Departments();
        });

        $this->mergeConfigFrom(__DIR__ . '/../Configs/departments.php', 'departments');
    }

    public function boot(): void
    {
        if ($this->app->runningInConsole()) {

            $this->publishes([
                __DIR__ . '/../Configs/departments.php' => config_path('departments.php'),
            ], 'departments-config');

            $this->publishes([
                __DIR__ . '/../Database/Migrations' => database_path('migrations'),
            ], 'departments-migrations');

        }

        // load migrations for considered in "php artisan migrate"
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
    }
}