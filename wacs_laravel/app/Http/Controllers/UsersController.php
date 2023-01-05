<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Models\User;
use App\Models\Post;
use App\Models\Follower;

class UsersController extends Controller
{
    //
    public function index(User $user)
    {
        $all_users = $user->getAllUsers(auth()->user()->id);

        return view('users.index', [
            'all_users'  => $all_users
        ]);
    }

        // フォロー
        public function follow(User $user)
        {
            $follower = auth()->user();
            // フォローしているか
            $is_following = $follower->isFollowing($user->id);
            if(!$is_following) {
                // フォローしていなければフォローする
                $follower->follow($user->id);
                return back();
            }
        }
    
        // フォロー解除
        public function unfollow(User $user)
        {
            $follower = auth()->user();
            // フォローしているか
            $is_following = $follower->isFollowing($user->id);
            if($is_following) {
                // フォローしていればフォローを解除する
                $follower->unfollow($user->id);
                return back();
            }
        }

        public function show(User $user, Post $post, Follower $follower)
        {
            $login_user = auth()->user();
            $is_following = $login_user->isFollowing($user->id);
            $is_followed = $login_user->isFollowed($user->id);
            $timelines = $post->getUserTimeLine($user->id);
            $post_count = $post->getPostCount($user->id);
            $follow_count = $follower->getFollowCount($user->id);
            $follower_count = $follower->getFollowerCount($user->id);
        
    
            return view('users.show', [
                'user'           => $user,
                'is_following'   => $is_following,
                'is_followed'    => $is_followed,
                'timelines'      => $timelines,
                'post_count'    => $post_count,
                'follow_count'   => $follow_count,
                'follower_count' => $follower_count,
                // 'post'           => $post
            ]);
        }

        // マイページ編集
        public function edit(User $user)
        {
            return view('users.edit', ['user' => $user]);
        }
    
        public function update(Request $request, User $user)
        {
            $data = $request->all();
            $validator = Validator::make($data, [
                'user_screen_name'   => ['required', 'string', 'max:50', Rule::unique('users')->ignore($user->id)],
                'screen_name'          => ['required', 'string', 'max:255'],
                'user_icon' => ['file', 'mimes:jpeg,png,jpg', 'max:2048'],
                'email'         => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)]
            ]);
            $validator->validate();
            $user->updateProfile($data);
    
            return redirect('DIY_home');
        }
}
