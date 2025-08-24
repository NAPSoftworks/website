<?php

namespace App\Http\Controllers;

use App\Repositories\Eloquent\CategoryRepository;
use Inertia\Inertia;
use Inertia\Response as InertiaResponse;

class CategoryController extends Controller
{
    /**
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(private readonly CategoryRepository $categoryRepository)
    {
        //
    }

    /**
     * @return InertiaResponse
     */
    public function index(): InertiaResponse
    {
        $categories = $this->categoryRepository->getWithProducts();

        return Inertia::render('Category/Index', ['categories' => $categories]);
    }
}
