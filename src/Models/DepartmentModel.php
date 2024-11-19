<?php

namespace vahidkaargar\LaravelDepartments\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DepartmentModel extends Model
{
    use SoftDeletes;

    protected $fillable = ['title', 'body', 'is_active'];
}