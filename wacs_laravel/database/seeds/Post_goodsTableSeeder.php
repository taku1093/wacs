<?php

use Illuminate\Database\Seeder;
use App\Models\Favorite;
use App\Models\Post_good;

class Post_goodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //テストユーザ以外の人にテスト１いいね
        for ($i = 2; $i <= 10; $i++) {
            Post_good::create([
                'user_id' => 1,
                'post_id' => $i
            ]);
        }
    }
}
