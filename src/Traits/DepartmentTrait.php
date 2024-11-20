<?php

namespace vahidkaargar\LaravelDepartments\Traits;

use Illuminate\Support\Collection;
use vahidkaargar\LaravelDepartments\Models\DepartmentModel;
use vahidkaargar\LaravelDepartments\Models\UserDepartmentModel;
use vahidkaargar\LaravelDepartments\Services\AssignUserToDepartments;


/**
 * @method hasManyThrough(string $class, string $class1)
 */
trait DepartmentTrait
{
    /**
     * @param DepartmentModel $departments
     * @return bool|DepartmentModel
     */
    public function deAssignDepartment(DepartmentModel $departments): bool|DepartmentModel
    {
        return AssignUserToDepartments::unset($departments, $this->id) ? $departments : false;
    }

    /**
     * @param DepartmentModel $departments
     * @return bool|DepartmentModel
     */
    public function assignDepartment(DepartmentModel $departments): bool|DepartmentModel
    {
        return AssignUserToDepartments::set($departments, $this->id) ? $departments : false;
    }

    /**
     * @return Collection
     */
    public function getDepartments(): Collection
    {
        return $this->departments()->get()->collect();
    }

    public function departments()
    {
        return $this->hasManyThrough(DepartmentModel::class, UserDepartmentModel::class);
    }
}