<?php

namespace App\Repositories\Eloquent;

use App\Models\Product;
use App\Repositories\Contracts\ProductRepositoryContract;

class ProductRepository extends AbstractRepository implements ProductRepositoryContract
{
    /**
     * @param Product $product
     */
    public function __construct(private readonly Product $product)
    {
        $this->model = $product;
    }
}
