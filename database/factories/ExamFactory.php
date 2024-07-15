<?php

namespace Database\Factories;

use App\Models\Skill;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Exam>
 */
class ExamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'skill_id'=>Skill::inRandomOrder()->first()->id,
            'name'=>json_encode([
                'ar'=>fake()->name(),
                'en'=>fake()->name()
            ]),
            'image'=>'img\exam3.jpg',
            'duration_minates'=>30,
            'difficulty'=>3,
            'questions'=>10,
            'slug'=>fake()->name()
        ];
    }
}
