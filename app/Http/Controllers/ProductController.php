<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Repositories\Eloquent\CategoryRepository;
use Inertia\Inertia;
use Inertia\Response as InertiaResponse;

class ProductController extends Controller
{
    /**
     * @param \App\Repositories\Eloquent\CategoryRepository $categoryRepository
     */
    public function __construct(private readonly CategoryRepository $categoryRepository)
    {
        //
    }

    /**
     * @param \App\Models\Category $category
     * @param \App\Models\Product $product
     * @return \Inertia\Response
     */
    public function show(Category $category, Product $product): InertiaResponse
    {
        return Inertia::render('Product/Show', [
            'category' => $category,
            'product' => $product
        ]);
    }
}
