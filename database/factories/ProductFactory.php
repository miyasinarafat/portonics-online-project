<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

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
    public function definition(): array
    {
        return [
            'name' => rtrim($this->faker->sentence(2), '.'),
            'details' => $this->faker->paragraph,
            'price' => $this->faker->numberBetween(10, 200),
            'currency' => 'BDT',
        ];
    }
}
