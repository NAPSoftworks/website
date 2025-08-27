<?php

namespace App\Http\Controllers;

use App\Repositories\Eloquent\CategoryRepository;
use App\Services\Category\CategoryFetcher;
use Inertia\Inertia;
use Inertia\Response as InertiaResponse;

class CategoryController extends Controller
{
    /**
     * @param \App\Services\Category\CategoryFetcher $categoryFetcher
     */
    public function __construct(private readonly CategoryFetcher $categoryFetcher)
    {
        //
    }

    /**
     * @return InertiaResponse
     */
    public function index(): InertiaResponse
    {
        $categories = $this->categoryFetcher->getWithProducts();

        return Inertia::render('Category/Index', ['categories' => $categories]);
    }
}
