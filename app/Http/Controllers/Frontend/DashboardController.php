<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class DashboardController extends Controller {

    /**
     * @return mixed
     */
    public function index() {
        $user = auth()->user();
        if ($user->user_type = 'General') {
            $user_type = "General user";
        }

        $user_posts = $this->getUserPosts($user->id);
        
        return view('frontend.user.dashboard', compact('user', 'user_type', 'user_posts'));
    }

    /**
     * get the list of published posts of an user
     * 
     * @param INT $user_id
     * @return collection
     */
    public function getUserPosts($user_id) {
        $posts = Post::where('created_by', '=', "$user_id")
                ->where('status', '1')
                ->where('published_at', '<=', Carbon::now())                
                ->orderBy('published_at', 'desc')
                ->paginate(config('settings.forum.posts_per_page'));
        
        return $posts;
    }

}
