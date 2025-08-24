<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Contracts\AbstractRepositoryContract;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Database\Eloquent\Model;
use RuntimeException;

/**
 * @template TModel of \Illuminate\Database\Eloquent\Model
 *
 * @implements \App\Repositories\Contracts\AbstractRepositoryContract<TModel>
 */
abstract class AbstractRepository implements AbstractRepositoryContract
{
    /**
     * The repository's model.
     *
     * @var TModel|null
     */
    protected ?Model $model = null;

    /**
     * @inheritDoc
     */
    public function get(): EloquentCollection
    {
        return $this
            ->newQuery()
            ->get();
    }

    /**
     * @inheritDoc
     */
    public function whereIn(string $column, array $values): EloquentCollection
    {
        return $this
            ->newQuery()
            ->whereIn($column, $values)
            ->get();
    }

    /**
     * @inheritDoc
     */
    public function first(): ?Model
    {
        return $this->newQuery()->first();
    }

    /**
     * @inheritDoc
     */
    public function find(mixed $id): ?Model
    {
        return $this->newQuery()->find($id);
    }

    /**
     * @inheritDoc
     */
    public function findMany(array $ids): EloquentCollection
    {
        return $this
            ->newQuery()
            ->findMany($ids);
    }

    /**
     * @inheritDoc
     */
    public function findBy(string $column, mixed $value): ?Model
    {
        return $this
            ->newQuery()
            ->where($column, $value)
            ->first();
    }

    /**
     * @inheritDoc
     */
    public function create(array $data): Model
    {
        return $this->newQuery()->create($data);
    }

    /**
     * @inheritDoc
     */
    public function firstOrCreate(array $attributes, array $values = []): Model
    {
        return $this->newQuery()->firstOrCreate($attributes, $values);
    }

    /**
     * @inheritDoc
     */
    public function updateOrCreate(array $attributes, array $values = []): Model
    {
        return $this->newQuery()->updateOrCreate($attributes, $values);
    }

    /**
     * @inheritDoc
     */
    public function update(Model $model, array $data): void
    {
        $model->touch();
        $model->update($data);
    }

    /**
     * @inheritDoc
     */
    public function destroy(Model $model): void
    {
        $model->delete();
    }

    /**
     * Get the repository's model.
     *
     * @return TModel
     */
    protected function getModel(): Model
    {
        if ($this->model) {
            return $this->model;
        }

        throw new RuntimeException("Repository's model has not been set.");
    }

    /**
     * Get a new builder for the model.
     *
     * @return \Illuminate\Database\Eloquent\Builder<TModel>
     */
    protected function newQuery(): EloquentBuilder
    {
        return $this->getModel()->newQuery();
    }
}
