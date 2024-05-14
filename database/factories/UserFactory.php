<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'phone' => '01111111111',
            'address' => [
                'street' => 'Dhanmondi',
                'city' => 'Dhaka',
                'state' => 'Dhaka',
                'zipcode' => 1209,
                'country' => 'BD',
            ]
        ];
    }
}
