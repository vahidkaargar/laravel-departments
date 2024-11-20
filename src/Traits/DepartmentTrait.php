<?php

/*
 * Example of usage
 * $department = Departments::create($payload);
 * or
 * $department = Departments::find($id);
 * Assign department to user
 * User::find(6)->assignDepartment($department)
 */


namespace vahidkaargar\LaravelDepartments\Traits;

use vahidkaargar\LaravelDepartments\Facades\Departments;
use vahidkaargar\LaravelDepartments\Services\AssignUserToDepartments;


trait DepartmentTrait
{
    public function deAssignDepartment(Departments $departments)
    {
        return AssignUserToDepartments::unset($departments, $this->id) ? $departments->refresh() : false;
    }

    public function assignDepartment(Departments $departments)
    {
        return AssignUserToDepartments::set($departments, $this->id) ? $departments->refresh() : false;
    }

    public function getDepartments()
    {
        return $this->departments()->get();
    }

    public function departments()
    {
        return $this->hasManyThrough(DepartmentModel::class, UserDepartment::class);
    }
}