<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $categories = Category::all();
        
        $products = [
            ['name' => 'Smartphone', 'price' => 699.99, 'category' => 'Electronics'],
            ['name' => 'Laptop', 'price' => 1299.99, 'category' => 'Electronics'],
            ['name' => 'T-Shirt', 'price' => 29.99, 'category' => 'Clothing'],
            ['name' => 'Jeans', 'price' => 79.99, 'category' => 'Clothing'],
            ['name' => 'Novel Book', 'price' => 19.99, 'category' => 'Books'],
            ['name' => 'Garden Tools Set', 'price' => 89.99, 'category' => 'Home & Garden'],
            ['name' => 'Football', 'price' => 39.99, 'category' => 'Sports'],
            ['name' => 'Action Figure', 'price' => 24.99, 'category' => 'Toys'],
        ];

        foreach ($products as $product) {
            $category = $categories->where('name', $product['category'])->first();
            
            Product::create([
                'name' => $product['name'],
                'slug' => Str::slug($product['name']),
                'description' => 'High quality ' . $product['name'] . ' with excellent features.',
                'price' => $product['price'],
                'discount_price' => rand(0, 1) ? $product['price'] * 0.9 : null,
                'image' => 'https://via.placeholder.com/300x200',
                'quantity' => rand(10, 100),
                'category_id' => $category->id,
                'is_featured' => rand(0, 1),
                'is_active' => true
            ]);
        }
    }
}