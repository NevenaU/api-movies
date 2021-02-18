<?php

namespace Database\Factories;

use App\Models\Movie;
use Illuminate\Database\Eloquent\Factories\Factory;

class MovieFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Movie::class;
    private $genres = ['action', 'sci-fi', 'horror', 'comedy'];

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' =>  $this->faker->sentence($nbWords = 5, $variableNbWords = true),
            'director' =>  $this->faker->name(),
            'imageUrl'  =>  $this->faker->imageUrl(),
            'duration'  =>  $this->faker->numberBetween($min = 1, $max = 500),
            'releaseDate'  =>  $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'genre'  =>  $this->genres[random_int(0, 3)],
        ];
        
    }
}
