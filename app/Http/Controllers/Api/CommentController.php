<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CommentController extends Controller
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
         // Update the database based on the request data
        // $user = User::find($request->input('user_id'));
        $text = $request->input('text');
        $lesson_id = $request->input('lesson_id');
        $object = $request->input('object');
        
        $request->validate([
            'text' => 'required|string',
        ]);
                // DB::enableQueryLog();

        $comment = Comment::create([
            'text' => $text,
            'user_id' => Auth::user()->id,
            'lesson_id' => $lesson_id,
        ]);
        // dd(DB::getQueryLog());

        $comment->save();
        $object['comments'][]=$comment;
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
