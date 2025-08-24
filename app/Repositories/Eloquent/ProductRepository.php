<?php

namespace App\Repositories\Eloquent;

use App\Models\Product;
class ProductRepository extends AbstractRepository
{
    /**
     * @param Product $product
     */
    public function __construct(private readonly Product $product)
    {
        $this->model = $product;
    }
}
