<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Models\User;
use App\Models\Post;
use App\Models\Follower;
use App\Models\Post_good;

class UsersController extends Controller
{
    //
    // private $form_show = 'UsersController@show';
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

        public function show(User $user, Post $post, Follower $follower, Post_good $post_good)
        {
            $login_user = auth()->user();
            $is_following = $login_user->isFollowing($user->id);
            $is_followed = $login_user->isFollowed($user->id);
            $is_good = $login_user->isGood($user->id);
            $timelines = $post->getUserTimeLine($user->id);

            // フォローユーザ
            $following_id = $follower->followingIds($user->id);
            $following_ids = $following_id->pluck('followed_id')->toArray();
            $user_following = $user->getUserInfo($user->id, $following_ids);

            // フォロワーユーザ
            $follower_id = $follower->followerIds($user->id);
            $follower_ids = $follower_id->pluck('following_id')->toArray();
            $user_follower = $user->getUserInfo($user->id, $follower_ids);

            // いいねユーザ
            $good_id = $post_good->goodIds($user->id);
            $goods_id = $good_id->pluck('post_id')->toArray();
            $timeline_goods = $post->getUsergoodTimeLine($goods_id);

            $post_count = $post->getPostCount($user->id);
            $follow_count = $follower->getFollowCount($user->id);
            $follower_count = $follower->getFollowerCount($user->id);
        
    
            return view('users.show', [
                'user'           => $user,
                'is_following'   => $is_following,
                'is_followed'    => $is_followed,
                'is_good'       => $is_good,
                'timelines'      => $timelines,
                'timeline_goods' => $timeline_goods,
                'following_ids' => $following_ids,
                'follower_ids' => $follower_ids,
                'user_followings' => $user_following,
                'user_followers' => $user_follower,
                // 'following_ids' => $following_ids,
                'post_count'    => $post_count,
                'follow_count'   => $follow_count,
                'follower_count' => $follower_count,
                // 'post'           => $post
            ]);
        }

        // マイページ編集
        public function edit(User $user)
        {
            $user = auth()->user();
            return view('users.edit', ['user' => $user]);
        }
    
        public function update(Request $request, User $user)
        {

            // $input = $request->session()->get("form_input");

            // // 戻るボタン
            // if ($request->has("back")) {
            //     return redirect()->action($this->form_show)
            //         ->withInput($input);
            // }

            // //セッションに値が無い時はフォームに戻る
            // if (!$input) {
            //     return redirect()->action($this->form_show);
            // }

            $data = $request->all();
            $validator = Validator::make($data, [
                
                'user_icon' => ['file', 'mimes:jpeg,png,jpg', 'max:2048'],
                'user_name'   => ['string', 'max:50'],
                'user_name_kana'   => [ 'string', 'max:50'],
                'user_screen_name'   => ['string', 'max:50'],
                // 'user_gen' => ['required', 'string', 'max:255'],
                'year' => ['required', 'string', 'max:255'],
                'month' => ['required', 'string', 'max:255'],
                'date' => ['required', 'string', 'max:255'],
                'user_pre' => ['string', 'max:255'],
                'user_city' => ['required', 'string', 'max:255'],
                'user_tell' => ['required', 'string'],
                'email'         => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
                'user_intro' =>['required', 'string', 'max:255']
            ]);

            if($request->has("user_gen")){
                $validator = Validator::make($data, [
                    'user_gen' => ['required', 'string', 'max:255'],
                ]);
            }
            $validator->validate();
            $user->updateProfile($data);
    
            return redirect('DIY_home');
        }

        public function destroy(User $user, Post $post, Follower $follower, Post_good $post_good)
        {
            $user = auth()->user();
            $user->userDestroy($user->id);

            // $post_id = $post->postIds($user->id);
            // $post_ids = $post_id->pluck('followed_id')->toArray();
            // $user_following = $user->getUserInfo($user->id, $following_ids);

            // $post->postDestroy($user->id, $post->id);

            return redirect('DIY_home');
        }

        // 確認画面
        public function confirm()
    {
        return view('users.conf');
    }
}
