<?php

namespace Database\Factories\Shop;


use App\Models\Shop\ShopCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ShopCategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ShopCategory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'parent_id' => rand(1, 60),
            'name' => $this->faker->name,
            'slug' => $this->faker->streetName,
        ];
    }
}
