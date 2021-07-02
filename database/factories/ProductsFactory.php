<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Products;
class ProductsFactory extends Factory
{

    /**
     * @inheritDoc
     */
    protected $model = Products::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'stock' => $this->faker->numberBetween(0,100),
            'price' => $this->faker->randomFloat(2,0,100),
            'brand' => $this->faker->company
        ];
    }
}
