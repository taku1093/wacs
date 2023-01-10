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
            QapostsTableSeeder::class,
            QacategoriesTableSeeder::class,
            UsersTableSeeder::class,
            EvaluationTableSeeder::class,
            PostsTableSeeder::class,
            MaterialsTableSeeder::class,
            CommentsTableSeeder::class,
            Comment_goodsTableSeeder::class,
            RepliesTableSeeder::class,
            Reply_goodsTableSeeder::class,
            Post_goodsTableSeeder::class,
            FollowsTableSeeder::class,
            FollowersTableSeeder::class,
        ]);
    }
}
