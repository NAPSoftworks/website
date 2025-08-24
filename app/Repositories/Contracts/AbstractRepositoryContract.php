<?php
namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Database\Eloquent\Model;

/**
 * @template TModel of \Illuminate\Database\Eloquent\Model
 */
interface AbstractRepositoryContract
{
    /**
     * Retrieve all data.
     *
     * @return \Illuminate\Database\Eloquent\Collection<int, TModel>
     */
    public function get(): EloquentCollection;

    /**
     * Retrieve data where a column's value matches the provided array.
     *
     * @param string $column
     * @param array $values
     * @return \Illuminate\Database\Eloquent\Collection<int, TModel>
     */
    public function whereIn(string $column, array $values): EloquentCollection;

    /**
     * Retrieve the first row of data.
     *
     * @return TModel|null
     */
    public function first(): ?Model;

    /**
     * Find a single row of data by its primary key.
     *
     * @param mixed $id
     * @return TModel|null
     */
    public function find(mixed $id): ?Model;

    /**
     * Find many rows of data by their primary key.
     *
     * @param array|int[] $ids
     * @return \Illuminate\Database\Eloquent\Collection<int, TModel>
     */
    public function findMany(array $ids): EloquentCollection;

    /**
     * Find a single row of data by the value of provided column.
     *
     * @param string $column
     * @param mixed $value
     * @return TModel|null
     */
    public function findBy(string $column, mixed $value): ?Model;

    /**
     * Create a resource.
     *
     * @param array $data
     * @return TModel
     */
    public function create(array $data): Model;

    /**
     * Fetch the first resource found or create a new one.
     *
     * @param array $attributes
     * @param array $values
     * @return TModel
     */
    public function firstOrCreate(array $attributes, array $values = []): Model;

    /**
     * Update the first resource found or create a new one.
     *
     * @param array $attributes
     * @param array $values
     * @return TModel
     */
    public function updateOrCreate(array $attributes, array $values = []): Model;

    /**
     * Update a resource.
     *
     * @param TModel $model
     * @param array $data
     * @return void
     */
    public function update(Model $model, array $data): void;

    /**
     * Delete a resource.
     *
     * @param TModel $model
     * @return void
     */
    public function destroy(Model $model): void;

}
