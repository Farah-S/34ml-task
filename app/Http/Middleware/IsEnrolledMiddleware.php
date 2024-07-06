<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Course;
use Illuminate\Support\Facades\View;

class IsEnrolledMiddleware
{
    public function handle($request, Closure $next)
    {
        $lesson = $request->route('lesson');
        $c_id = DB::table('lessons')
            ->select('user_id')->where('user_id', '=', Auth::id())->where('course_id','=',$lesson->course_id)
            ->get();
        $result = DB::table('course_user')
            ->select('user_id')->where('user_id', '=', Auth::id())->where('course_id','=',$lesson->course_id)
            ->get();
        if(count($result)==1){
            return $next($request);
        }
        return redirect("/");
    }
}
?>