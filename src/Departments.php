<?php

namespace vahidkaargar\LaravelDepartments;

use Illuminate\Database\Eloquent\{Builder, Collection, ModelNotFoundException};
use vahidkaargar\LaravelDepartments\{Interfaces\DepartmentsInterface, Models\DepartmentModel};

class Departments implements DepartmentsInterface
{
    /**
     * @var DepartmentModel
     */
    private DepartmentModel $model;

    /**
     * Constructor to inject the model dependency.
     *
     */
    public function __construct()
    {
        $this->model = new DepartmentModel();
    }

    /**
     * @return Builder
     */
    public function query(): Builder
    {
        return $this->model->newQuery();
    }

    /**
     * Get all department records.
     *
     * @return Collection
     */
    public function all(): Collection
    {
        return $this->model->all();
    }

    /**
     * Find a department by its ID.
     *
     * @param int $id
     * @return \Illuminate\Support\Collection
     */
    public function find(int $id): \Illuminate\Support\Collection
    {
        return $this->query()->find($id)->collect();
    }

    /**
     * Create a new department record.
     *
     * @param array $payload
     * @return DepartmentModel|bool
     */
    public function create(array $payload): DepartmentModel|bool
    {
        $department = $this->model->newInstance()->fill($payload);
        return $department->save() ? $department : false;
    }

    /**
     * Update an existing department record.
     *
     * @param int $id
     * @param array $payload
     * @return DepartmentModel|bool
     */
    public function update(int $id, array $payload): DepartmentModel|bool
    {
        $department = $this->query()->find($id);

        if (blank($department)) {
            return $this->handleError("Department with ID $id not found.");
        }

        $department = $department->fill($payload);

        return $department->save() ? $department->first() : false;
    }

    /**
     * Delete a department record by its ID.
     *
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool
    {
        $department = $this->query()->find($id);
        return filled($department)
            ? $department->delete()
            : $this->handleError("Department with ID $id not found.");
    }

    /**
     * Handle errors based on debug mode.
     *
     * @param string $message
     * @return mixed
     */
    private function handleError(string $message): bool
    {
        if (config('app.debug')) {
            throw new ModelNotFoundException($message);
        }

        return false;
    }
}
