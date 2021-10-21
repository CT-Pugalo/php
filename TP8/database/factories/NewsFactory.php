<?php

namespace Database\Factories;

use App\Models\News;
use Illuminate\Database\Eloquent\Factories\Factory;

class NewsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = News::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->realText(20, 1),
            'message' => $this->faker->realText(500, 2),
            'date' => $this->faker->dateTimeBetween('-1 years', 'now', 'Europe/Paris')
        ];
    }

}
