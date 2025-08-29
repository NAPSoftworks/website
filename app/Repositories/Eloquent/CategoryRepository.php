<?php

namespace App\Repositories\Eloquent;

use App\Models\Category;
use App\Repositories\Contracts\CategoryRepositoryContract;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Database\Eloquent\Model;

class CategoryRepository extends AbstractRepository implements CategoryRepositoryContract
{
    /**
     * @param Category $category
     */
    public function __construct(private readonly Category $category)
    {
        $this->model = $category;
    }


    /**
     * @param mixed $id
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function findWithProducts(mixed $id): ?Model
    {
        return $this
            ->newQuery()
            ->with('products')
            ->find($id);
    }

    /**
     * @param int $limit
     * @param int $offset
     * @return \Illuminate\Database\Eloquent\Collection<int, \App\Models\Category>
     */
    public function getWithProducts(int $limit = 10, int $offset = 0): EloquentCollection
    {
        return $this
            ->newQuery()
            ->with('products')
            ->limit($limit)
            ->offset($offset)
            ->get();
    }
}
