<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Models\Review;
use App\Models\Cart;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;


    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Usuarios
        $users = User::factory(1000)->create();

        // Categorías
        $categories = Category::factory(20)->create();

        // Productos
        $products = Product::factory(200)->create();

        // Relación muchos a muchos
        foreach ($products as $product) {
            $product->categories()->attach(
                $categories->random(rand(1, 3))->pluck('id')
            );
        }

        // Carritos
        foreach ($users as $user) {
            Cart::create(['user_id' => $user->id]);
        }

        // Órdenes
        $orders = Order::factory(2000)->create();

        // Reviews
        Review::factory(3000)->create();
    }
}
