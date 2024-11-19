<?php

namespace vahidkaargar\LaravelDepartments\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserDepartmentModel extends Model
{
    use SoftDeletes;

    protected $fillable = ['department_id', 'user_id', 'is_active'];
}