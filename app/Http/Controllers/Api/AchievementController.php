<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Log; 
use App\Models\Achievement;
use Illuminate\Support\Facades\Auth;
use App\Notifications\AppNotification;
use Illuminate\Http\Request;

class AchievementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function achievements()
    {
        $user = Auth::user();
        $achievements = Achievement::all();
        
        $userAch=$user->achievements()->select('title')->get();
         
        $names=[];
        foreach ($userAch as $a){
            $names[]=$a->title;
        }

        $serializedObject = json_encode($names);
        
        $userAch=$user->achievements()->select('required_num')->where('title', 'LIKE', '%lesson%')->get();
        $amounts=[];
        foreach ($userAch as $a){
            $amounts[]=$a->required_num;
        }
        $nextLesson = Achievement::whereNotIn('required_num', $amounts)
        ->where('title', 'LIKE', '%lesson%')
        ->orderBy('required_num', 'asc')
        ->first();
        $next[]=$nextLesson->title;
        $userAch=$user->achievements()->select('required_num')->where('title', 'LIKE', '%comment%')->get();
        $amounts=[];
        foreach ($userAch as $a){
            $amounts[]=$a->required_num;
        }
        $nextComment = Achievement::whereNotIn('required_num', $amounts)
        ->where('title', 'LIKE', '%comment%')
        ->orderBy('required_num', 'asc')
        ->first();
        $next[]=$nextComment->title;
        
        $serializedNext = json_encode($next);
        return response()->json(['status' => 'success', 'unlocked_achievements' => $serializedObject ,'next_available_achievements'=>$serializedNext]);
    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Achievement $achievement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Achievement $achievement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Achievement $achievement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Achievement $achievement)
    {
        //
    }
}
