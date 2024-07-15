<?php

namespace Database\Factories;

use App\Models\Exam;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Question>
 */
class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'head_of_question'=>fake()->text(),
            'choice_1'=>fake()->name(),
            'choice_2'=>fake()->name(),
            'choice_3'=>fake()->name(),
            'choice_4'=>fake()->name(),
            'correct_anscer'=>2,
            'exam_id'=>Exam::inRandomOrder()->first()->id
        ];
    }
}
