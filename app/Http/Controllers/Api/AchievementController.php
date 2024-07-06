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
    public function unlockedAchievements()
    {
        $user = Auth::user();
        $queries = DB::getQueryLog();
        $userAch=$user->achievements()->select('title')->get();
        Log::info('Query Log', $queries);   
        $names=[];
        foreach ($userAch as $a){
            $names[]=$a->title;
        }
         $serializedObject = json_encode($names);
        return response()->json(['status' => 'success', 'achievements' => $serializedObject]);
    
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
