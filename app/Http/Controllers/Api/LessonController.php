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

        $comments = DB::table('comments')
                    ->join('users', 'comments.user_id', '=', 'users.id')
                    ->select('users.name', 'comments.*')
                    ->get();

        $lessons =    DB::table('lessons')
                    ->join('lesson_user', 'lesson_user.lesson_id', '=', 'lessons.id')
                    ->where('lesson_user.user_id', '=', Auth::user()->id)
                    ->select('lesson_user.completed', 'lessons.*')
                    ->get();

        $object['course'] =$object['course'][0];
        $object['course']['lessons'] = $lessons;
        $object['comments']=$comments;
        // $object['course']=$course;
        // Pass the parameters to the view
        return view('lesson', compact('object'));
    }

    public function check(Lesson $lesson)
    {
        $result = DB::table('course_user')
            ->select('user_id')->where('user_id', '=', Auth::id())->where('course_id','=',$lesson->course_id)
            ->get();
        $course = DB::table('courses')
            ->select()->where('id','=',$lesson->course_id)
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
    public function update(Request $request)
    {
        $lesson_id = $request->input('lesson_id');
        $course_id = $request->input('course_id');
        
        $lessonUser = Auth::user()->lessons()->where('lesson_id', $lesson_id)->first()->pivot;
        $lessonUser->completed = true; 
        $lessonUser->save();
        
        $course = DB::table('courses')
            ->select()->where('id','=',$course_id)
            ->get();
        

        $lesson =    DB::table('lessons')
                    ->where('lessons.id', '=', $lesson_id)
                    ->select()
                    ->get();

        $object['course'] =$course;
        $object['lesson'] =$lesson[0];
        $serializedObject = json_encode($object);
        return redirect()->route('lesson', ['object' => $serializedObject]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lesson $lesson)
    {
        //
    }
}
