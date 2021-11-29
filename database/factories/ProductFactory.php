<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(2),
            'description' => $this->faker->sentence(15),
            'price' => $this->faker->numberBetween(10,50),
            'cover_img' => $this->faker->imageUrl($width = 640, $height = 480),
            "product_ref" => $this->faker->numberBetween(1234,7890),
        ];
    }
}
