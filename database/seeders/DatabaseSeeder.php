<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Talky',
            'email' => 'talky@napsoftworks.dev',
        ]);

        $categories = [];

        $categories[] = Category::factory()
            ->create([
                'name' => '2D',
                'is_public' => true,
            ]);

        $categories[] = Category::factory()
            ->create([
                'name' => '3D',
                'is_public' => true,
            ]);

        $categories[] = Category::factory()
            ->create([
                'name' => 'Plugins',
                'is_public' => true,
            ]);

        $categories[] = Category::factory()
            ->create([
                'name' => 'Other',
                'is_public' => true,
            ]);

        $this->populateCategories($categories);
    }

    private function populateCategories(array $categories): void
    {
        foreach ($categories as $category) {
            Product::factory()->count(10)->create([
                'category_id' => $category->id,
            ]);
        }
    }
}
