<?php

namespace vahidkaargar\LaravelDepartments\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class DepartmentModel extends Model
{
    use SoftDeletes;

    protected $table = 'departments';
    protected $fillable = ['title', 'body', 'is_active'];

    public function userDepartment(): HasMany
    {
        return $this->hasMany(DepartmentModel::class);
    }
}