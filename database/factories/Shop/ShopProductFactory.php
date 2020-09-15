<?php

namespace Database\Factories\Shop;

use App\Models\Shop\ShopProduct;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ShopProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ShopProduct::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id' => rand(1 , 60),
            'title' => $this->faker->streetName,
            'description' => $this->faker->name,
        ];
    }
}
