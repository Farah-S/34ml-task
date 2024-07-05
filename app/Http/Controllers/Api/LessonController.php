<?php

namespace App\Http\Controllers\Api;

use App\Models\Lesson;
use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LessonController extends Controller
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
    public function show(Request $request)
    {
        $serializedObject = $request->query('object');
        $object = json_decode($serializedObject, true);
        $comments = DB::table('comments','users')
            ->select('text','name')->where('lesson_id', '=', $object['lesson']['id'])
            ->get();
        $object['comments']=$comments;
        // Pass the parameters to the view
        return view('lesson', compact('object'));
    }

    public function check(Lesson $lesson)
    {
        $result = DB::table('course_user')
            ->select('user_id')->where('user_id', '=', Auth::id())->where('course_id','=',$lesson->course_id)
            ->get();
        $course = DB::table('courses')
            ->select('name')->where('id','=',$lesson->course_id)
            ->get();
      
        // $request->session()->flash('lesson', $lesson);
        // $request->session()->flash('course', $course);

        if(count($result)>0){
            $object = [
                'lesson' => $lesson,
                'course' => $course
            ];

            
            $serializedObject = json_encode($object);
             return redirect()->route('lesson', ['object' => $serializedObject]);
            // return redirect()->route('lesson', []);
        }
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lesson $lesson)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lesson $lesson)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lesson $lesson)
    {
        //
    }
}
