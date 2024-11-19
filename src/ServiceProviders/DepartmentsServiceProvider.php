<?php

namespace vahidkaargar\LaravelDepartments\ServiceProviders;

use Illuminate\Support\ServiceProvider;
use vahidkaargar\LaravelDepartments\Departments;

class DepartmentsServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->singletonFromDepartmentsClass();

        // load files
        $this->mergeConfigFrom(__DIR__ . '/../Configs/departments.php', 'departments');
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
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

        require_once __DIR__ . '/../Helpers/helpers.php';
    }

    private function singletonFromDepartmentsClass(): void
    {
        $this->app->singleton('departments', function ($app) {
            return new Departments();
        });
    }
}