<?php

namespace App\Services\Category;

use App\Repositories\Eloquent\CategoryRepository;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;

readonly class CategoryFetcher
{
    /**
     * @param \App\Repositories\Eloquent\CategoryRepository $categoryRepository
     */
    public function __construct(private CategoryRepository $categoryRepository)
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
