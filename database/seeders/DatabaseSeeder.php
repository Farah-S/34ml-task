<?php

namespace Database\Seeders;

use App\Models\Achievement;
use App\Models\Lesson;
use App\Models\Course;
use App\Models\User;
use Illuminate\Support\Facades\DB;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(3)->create();
        User::create(['name'=>'tester', 'email' => 'tester@example.com','email_verified_at' => now(),
            'password' => "1234", 'remember_token' => Str::random(10)]);
        Course::factory(5)->has(Lesson::factory()->count(rand(3,10)))->create();
       
        DB::table('achievements')->insert([
            'title' => "First Lesson Watched",
            'required_num' => 1,
        ]);
        DB::table('achievements')->insert([
            'title' => "5 Lessons Watched",
            'required_num' => 5,
        ]);
        DB::table('achievements')->insert([
            'title' => "10 Lesson Watched",
            'required_num' => 10,
        ]);
        DB::table('achievements')->insert([
            'title' => "25 Lesson Watched",
            'required_num' => 25,
        ]);
        DB::table('achievements')->insert([
            'title' => "50 Lesson Watched",
            'required_num' => 50,
        ]);


        DB::table('achievements')->insert([
            'title' => "First Comment Written",
            'required_num' => 1,
        ]);
        DB::table('achievements')->insert([
            'title' => "3 Comments Written",
            'required_num' => 3,
        ]);
        DB::table('achievements')->insert([
            'title' => "5 Comments Written",
            'required_num' => 5,
        ]);
        DB::table('achievements')->insert([
            'title' => "10 Comments Written",
            'required_num' => 10,
        ]);
        DB::table('achievements')->insert([
            'title' => "20 Comments Written",
            'required_num' => 20,
        ]);

        DB::table('badges')->insert([
            'title' => "Beginner: 0 Achievements",
            'required_ach' => 0,
        ]);

        DB::table('badges')->insert([
            'title' => "Intermediate: 4 Achievements",
            'required_ach' => 4,
        ]);
        
        DB::table('badges')->insert([
            'title' => "Advanced: 8 Achievements",
            'required_ach' => 8,
        ]);

        DB::table('badges')->insert([
            'title' => "Master: 10 Achievements",
            'required_ach' => 10,
        ]);
    }
}
