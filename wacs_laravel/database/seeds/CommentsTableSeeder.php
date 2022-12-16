<?php

use Illuminate\Database\Seeder;
use App\Models\Comment;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //ユーザごとに１つテストコメント
        for ($i = 1; $i <= 10; $i++) {
            Comment::create([
                'user_id' => 1,
                'post_id' => $i,
                'comment_text' => 'これはテストコメント' .$i,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
