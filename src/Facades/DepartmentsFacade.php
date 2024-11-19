<?php

namespace vahidkaargar\LaravelDepartments\Facades;

use Illuminate\Support\Facades\Facade;

class DepartmentsFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'departments';
    }
}
