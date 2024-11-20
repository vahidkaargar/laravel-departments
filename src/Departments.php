<?php

namespace vahidkaargar\LaravelDepartments;

use Illuminate\Database\Eloquent\{Collection, ModelNotFoundException};
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
     * @return DepartmentModel|null
     */
    public function find(int $id): ?DepartmentModel
    {
        return $this->model->find($id);
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
        $department = $this->find($id);

        if (!$department) {
            return $this->handleError("Department with ID {$id} not found.");
        }

        $department->fill($payload);

        return $department->save() ? $department : false;
    }

    /**
     * Delete a department record by its ID.
     *
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool
    {
        $department = $this->find($id);

        if (!$department) {
            return $this->handleError("Department with ID {$id} not found.");
        }

        return (bool)$department->delete();
    }

    /**
     * Handle errors based on debug mode.
     *
     * @param string $message
     * @return mixed
     */
    private function handleError(string $message): mixed
    {
        if (config('app.debug')) {
            throw new ModelNotFoundException($message);
        }

        return false;
    }
}
