<?php

namespace Database\Seeders;

use App\Models\Shop\ShopCategory;
use App\Models\Shop\ShopProduct;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->times(10)->create();

        ShopCategory::factory()->times(10)->create();
        for($i = 1; $i <= 60; $i++){
            ShopCategory::factory()->times(5)->create(['parent_id' => $i]);
        }

        for ($i = 1; $i <= 100; $i++) {
            ShopProduct::factory()->times(10)->create();
        }
    }
}

