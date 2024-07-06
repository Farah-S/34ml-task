<?php
namespace App\Http\Middleware;

use Closure;
use App\Models\Course;
use App\Http\Controllers\Api\AchievementController;
use App\Http\Controllers\Api\BadgeController;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class FetchUserDetailsMiddleware
{
    public function handle($request, Closure $next)
    {
        $response = app(AchievementController::class)->achievements();

        $data = json_decode($response->getContent(), true);

        $achievements=[];
        $nextAch=[];
        if ($data['status']=='success') { 
            $achievements =json_decode($data['unlocked_achievements'], true);
            $nextAch =json_decode($data['next_available_achievements'], true);
        }
        $profile['unlocked_achievements'] = $achievements;    
        $profile['next_available_achievements'] = $nextAch;    
        
        $profile['courses'] = Auth::user()->courses;
        
        $response = app(BadgeController::class)->badges();

        $data = json_decode($response->getContent(), true);
       
        $profile['badges']['current_badge'] = $data['current_badge'];
        $profile['badges']['next_badge'] = $data['next_badge'];
        $profile['badges']['remaining_to_unlock_next_badge'] = $data['remaining_to_unlock_next_badge'];
       
        View::share('profile', $profile); 

        return $next($request);
    }
}
?>