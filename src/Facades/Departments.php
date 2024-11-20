<?php

namespace vahidkaargar\LaravelDepartments\Facades;

use Illuminate\Support\Facades\Facade;

class Departments extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Departments';
    }
}
