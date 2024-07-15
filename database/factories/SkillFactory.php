<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Skill>
 */
class SkillFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>json_encode([
                'ar'=>fake()->name(),
                'en'=>fake()->name()
            ]),
            'category_id'=>Category::inRandomOrder()->first()->id,
            'image'=>'img\exam1.jpg',
            'slug'=>fake()->name()
        ];
    }
}
