<?php

namespace App\Services\Category;

use App\Repositories\Contracts\CategoryRepositoryContract;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;

readonly class CategoryFetcher
{
    /**
     * @param \App\Repositories\Contracts\CategoryRepositoryContract $categoryRepository
     */
    public function __construct(private CategoryRepositoryContract $categoryRepository)
    {
        //
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getWithProducts(): EloquentCollection
    {
        return $this->categoryRepository->getWithProducts();
    }
}
