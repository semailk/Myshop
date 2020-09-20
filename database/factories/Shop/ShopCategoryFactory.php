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
        $name = $this->faker->words(2,true);

        return [
            'parent_id' => null,
            'name' => $name,
            'slug' => rand(1,1000) .'-'.Str::slug($name),
        ];
    }
}
