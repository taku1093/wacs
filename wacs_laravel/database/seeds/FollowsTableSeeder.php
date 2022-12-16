<?php

use App\Models\Follow;
use Illuminate\Database\Seeder;


class FollowsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //各ユーザをフォロー
        for ($i = 2; $i <= 10; $i++) {
            Follow::create([
                'following_id' => $i,
                'followed_id' => 1
            ]);
        }
    }
}
