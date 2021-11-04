<?php

namespace Database\Factories;

use App\Models\Inmueble;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\InmobCategory;

class InmuebleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Inmueble::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
       $title = $this->faker->unique()->text(30);
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'price' => $this->faker->randomElement([15000, 40000, 20000, 50000,35000]),
            'desc' => $this->faker->text(250),
            'status' => $this->faker->randomElement(['1', '2']),
            'locality' => $this->faker->word(25),
            'bath' => $this->faker->randomElement([1,2,3,4,5]),
            'hab' => $this->faker->randomElement([1,2,3,4,5]),
            'est' => $this->faker->randomElement([1,2,3,4,5]),
            'pool' => $this->faker->randomElement([1,2,3,4,5]),
            'size' => $this->faker->randomElement([60,120, 230, 400, 300]),
            'user_id' => User::all()->random()->id,
            'inmob_category_id' => InmobCategory::all()->random()->id
            
        ];
    }
}
