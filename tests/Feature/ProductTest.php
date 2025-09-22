<?php


use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    public function test_returns_a_successful_response()
    {
        $category = Category::factory()->create();

        Product::factory()->create([
            'category_id' => $category->id,
        ]);

        $response = $this->get('/categories/1/products/1');

        $response->assertStatus(200);
    }
}
