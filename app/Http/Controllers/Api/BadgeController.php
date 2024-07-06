<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Badge;
use Illuminate\Http\Request;

class BadgeController extends Controller
{
    public function badges()
    {
        $user = Auth::user();
  
        $currentBadge=$user->badges()->latest('badge_user.created_at')->get();
        $nextBadge=Badge::where('id', '>', $currentBadge[count($currentBadge) - 1]->id)->orderBy('id')->first();
        $remaining=$nextBadge->required_ach - $currentBadge[count($currentBadge) - 1]->required_ach;
        
        return response()->json(['status' => 'success', 'current_badge' => $currentBadge[count($currentBadge) - 1]->title ,'next_badge'=>$nextBadge->title, 'remaining_to_unlock_next_badge'=>$remaining]);
    
    }
}
