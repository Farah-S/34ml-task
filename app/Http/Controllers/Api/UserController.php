<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\Course;  
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }
    
    public function enroll(Request $request)
    {
        $c_id = $request->input('course_id');
        Auth::user()->courses()->attach($c_id, ['completed' => false]);
        $lessons=DB::table('lessons')
                    ->where('lessons.course_id', '=',$c_id)
                    ->select()
                    ->get();
        foreach($lessons as $l){
            Auth::user()->lessons()->attach($l->id, ['completed' => false]);
        }
        $course = Course::find($c_id);
        return redirect()->route('course', ['course' => $course]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
