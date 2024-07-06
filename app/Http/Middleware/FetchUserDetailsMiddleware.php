<?php
namespace App\Http\Middleware;

use Closure;
use App\Models\Course;
use App\Http\Controllers\Api\AchievementController;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class FetchUserDetailsMiddleware
{
    public function handle($request, Closure $next)
    {
        $response = app(AchievementController::class)->unlockedAchievements();

        // Handle the response as needed
        $data = json_decode($response->getContent(), true);

        $achievements=[];
        if ($data['status']=='success') { 
            $achievements =json_decode($data['achievements'], true);
            
        }
        $profile['achievements'] = $achievements;    
        
        $profile['courses'] = Auth::user()->courses;
        
        $profile['badges'] = Auth::user()->badges;
       
        View::share('profile', $profile); 

        return $next($request);
    }
}
?>