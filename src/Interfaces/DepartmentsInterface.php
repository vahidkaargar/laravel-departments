<?php

namespace vahidkaargar\LaravelDepartments\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use vahidkaargar\LaravelDepartments\Models\DepartmentModel;

interface DepartmentsInterface
{
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
     * @return DepartmentModel|null
     */
    public function find(int $id): ?DepartmentModel;

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
