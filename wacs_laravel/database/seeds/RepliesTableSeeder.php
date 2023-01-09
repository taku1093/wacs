<?php

use Illuminate\Database\Seeder;
use App\Models\Reply;

class RepliesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //ユーザごとに１つテストコメント
        for ($i = 1; $i <= 10; $i++) {
            Reply::create([
                'user_id' => 1,
                'comment_id' => $i,
                'reply_text' => 'これは返信テスト' .$i,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
