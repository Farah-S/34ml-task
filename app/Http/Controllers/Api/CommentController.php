<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Achievement;
use App\Models\Badge;
use App\Notifications\AppNotification;
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
        $this->checkAchievement();
        $object['comments'][]=$comment;
        return back();
    }
    protected function checkAchievement()
    {
        $achievements= Achievement::where('title', 'LIKE', '%comment%')->get();
        $user=Auth::user();
        $commentsCount = $comments = DB::table('comments')
                    ->where('comments.user_id', '=',$user->id)
                    ->count();
            
        foreach($achievements as $a){
            if($commentsCount >= $a->required_num){
                if (!$user->achievements()->where('achievement_id', $a->id)->where('user_id',$user->id )->exists()) {
                    $user->achievements()->attach($a->id);
                    $user->notify(new AppNotification("New Achievement: $a->title"));
                    $this->checkBadge();
                }
            }
        }
    }

    protected function checkBadge()
    {
        $user=Auth::user();
        $achievementCount= $user->achievements()->count();
        $badges= Badge::all();
            
        foreach($badges as $b){
            if($achievementCount >= $b->required_ach){
                if (!$user->badges()->where('badge_id','=', $b->id)->exists()) {
                    $user->badges()->attach($b->id);
                    $user->notify(new AppNotification("New Badge: $b->title"));
                }
            }
        }
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
