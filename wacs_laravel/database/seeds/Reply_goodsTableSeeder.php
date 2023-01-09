<?php

use Illuminate\Database\Seeder;
use App\Models\Reply_good;

class Reply_goodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i = 2; $i <= 10; $i++) {
            Reply_good::create([
                'user_id' => 1,
                'reply_id' => $i
            ]);
        }
    }
}
