<?php

namespace vahidkaargar\LaravelDepartments\Interfaces;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use vahidkaargar\LaravelDepartments\Models\DepartmentModel;

interface DepartmentsInterface
{
    /**
     * @return Builder
     */
    public function query(): Builder;

    /**
     * Get all department records.
     *
     * @return Collection
     */
    public function all(): Collection;

    /**
     * Find a department by its ID.
     *
     * @param int $id
     * @return \Illuminate\Support\Collection
     */
    public function find(int $id): \Illuminate\Support\Collection;

    /**
     * Create a new department record.
     *
     * @param array $payload
     * @return DepartmentModel|bool
     */
    public function create(array $payload): DepartmentModel|bool;

    /**
     * Update an existing department record.
     *
     * @param int $id
     * @param array $payload
     * @return DepartmentModel|bool
     */
    public function update(int $id, array $payload): DepartmentModel|bool;

    /**
     * Delete a department record by its ID.
     *
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool;
}
