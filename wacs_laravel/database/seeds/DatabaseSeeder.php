<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        // 親子関係の順に中位
        $this->call([
            UsersTableSeeder::class,
            PostsTableSeeder::class,
            CommentsTableSeeder::class,
            Post_goodsTableSeeder::class,
            FollowsTableSeeder::class,
            FollowersTableSeeder::class,
        ]);
    }
}
