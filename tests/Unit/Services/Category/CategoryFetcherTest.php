<?php

namespace Services\Category;

use App\Models\Category;
use App\Models\Product;
use App\Services\Category\CategoryFetcher;
use Tests\TestCase;

class CategoryFetcherTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testGetWithProducts(): void
    {
        $categoryFetcher = app()->make(CategoryFetcher::class);

        /** @var \App\Models\Category $category1 */
        $category1 = Category::factory()->create()->each(
            function ($category): void {
                Product::factory()->create(['category_id' => $category->id]);
            }
        );

        /** @var \App\Models\Category $category2 */
        $category2 = Category::factory()->create();

        /** @var \App\Models\Product $product1 */
        $product1 = Product::factory()->create(['category_id' => $category1->id]);

        $categories = $categoryFetcher->getWithProducts();

        $this->assertCount(2, $categories);
        $this->assertTrue($categories->contains($category1));
        $this->assertTrue($categories->contains($category2));
        $this->assertTrue($categories->first()->products->contains($product1));
        $this->assertEmpty($categories->last()->products);
    }
}
