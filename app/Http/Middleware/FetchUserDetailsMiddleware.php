<?php
namespace App\Http\Middleware;

use Closure;
use App\Models\Course;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class FetchUserDetailsMiddleware
{
    public function handle($request, Closure $next)
    {
        $profile['courses'] = Auth::user()->courses;
        $profile['achievements'] = Auth::user()->achievements;
        $profile['badges'] = Auth::user()->badges;
       
        View::share('profile', $profile); 

        return $next($request);
    }
}
?>