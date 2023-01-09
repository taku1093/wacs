<?php

use Illuminate\Database\Seeder;
use App\Models\Comment_good;

class Comment_goodsTableSeeder extends Seeder
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
            Comment_good::create([
                'user_id' => 1,
                'comment_id' => $i
            ]);
        }
    }
}
