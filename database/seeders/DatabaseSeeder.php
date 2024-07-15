<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Exam;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(20)->create();
        for ($i=0; $i < 50; $i++) {
            DB::table('exam_user')->insert([
                'user_id' =>User::inRandomOrder()->first()->id,
                'exam_id' =>Exam::inRandomOrder()->first()->id,
                'result'=>$i,
                'duration_min'=>$i,
                'satus'=>'close'
            ]);
        }

    }




        // $this->call([
        //     CategorySeeder::class,
        //     SkillSeeder::class,
        //     Examseeder::class,
        //     QuestionSeeder::class,
        // ]);

}
