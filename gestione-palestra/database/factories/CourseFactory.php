<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $date = $this->faker->dateTimeBetween('now', '30 days');
        $dateEnd  = clone $date;
        $dateEnd->modify('+7 days');
        $corsi = ['Pugilato', 'Aerobica', 'Pilates', 'Yoga'];
        return [
            'name' => $corsi[array_rand($corsi)],
            'description' => $this->faker->text(),
            'start_date' => $date,
            'end_date' => $dateEnd
        ];
    }
}
