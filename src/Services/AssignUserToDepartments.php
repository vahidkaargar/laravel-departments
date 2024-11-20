<?php

namespace vahidkaargar\LaravelDepartments\Services;

use vahidkaargar\LaravelDepartments\Facades\Departments;
use vahidkaargar\LaravelDepartments\Models\UserDepartmentModel;

class AssignUserToDepartments
{
    public static function unset(Departments $departments, int $userId): bool
    {
        return UserDepartmentModel::query()
            ->where('department_id', $departments->id)
            ->where('user_id', $userId)
            ->delete();
    }

    public static function set(Departments $departments, int $userId)
    {
        return UserDepartmentModel::firstOrCreate([
            'user_id' => $userId,
            'department_id' => $departments->id,
        ]) ? $departments->refresh() : false;
    }
}