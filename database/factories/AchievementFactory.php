<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Achievement;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Achievement>
 */
class AchievementFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<\Illuminate\Database\Eloquent\Model>
     */
    protected $model = Achievement::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title="";
        $req=1;
        $type=array_rand([" Comment", " Lesson"]);
        if($type.equalTo(" Lesson")){
            $number=array_rand(["First","5","10","25","50"]);
            if($number!="First"){
                $req=(int)$number;
                $type+="s";
            }
            $title= $number + $type + " Watched";
        }
        else{
            $number=array_rand(["First","3","5","10","20"]);
            $title = $number + $type + " Written";
            if($number!="First"){
                $req=(int)$number;
                $type+="s";
            }
        }
        return [
            'title'=> $title,
            'required_num'=> $req,
        ];
    }
}
