<?php

use VahidKaargar\LaravelDepartments\Departments;

if (!function_exists('departments')) {
    /**
     * Get the Departments instance from the service container.
     *
     * @return Departments
     */
    function departments(): Departments
    {
        return app(Departments::class);
    }
}
