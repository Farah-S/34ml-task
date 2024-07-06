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
        $response = app(AchievementController::class)->achievements();

        // Handle the response as needed
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
        
        $profile['badges'] = Auth::user()->badges;
       
        View::share('profile', $profile); 

        return $next($request);
    }
}
?>