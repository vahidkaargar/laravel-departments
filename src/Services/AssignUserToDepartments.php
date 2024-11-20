<?php

namespace vahidkaargar\LaravelDepartments\Services;

use vahidkaargar\LaravelDepartments\Models\DepartmentModel;
use vahidkaargar\LaravelDepartments\Models\UserDepartmentModel;

class AssignUserToDepartments
{
    public static function unset(DepartmentModel $departments, int $userId): bool
    {
        return UserDepartmentModel::query()
            ->where('department_id', $departments->id)
            ->where('user_id', $userId)
            ->delete();
    }

    public static function set(DepartmentModel $departments, int $userId): bool|DepartmentModel
    {
        $payload = [
            'user_id' => $userId,
            'department_id' => $departments->id,
        ];

        return UserDepartmentModel::query()->firstOrCreate($payload)
            ? $departments->refresh()
            : false;
    }
}