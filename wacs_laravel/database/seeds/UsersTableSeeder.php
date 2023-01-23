<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //テストユーザ10人作成
        for ($i = 1; $i <= 10; $i++) {
            User::create([
                'screen_name'    => 'test_user' .$i,
                'user_screen_name'=> 'TEST' .$i,
                // 'user_icon'      => 'https://placehold.jp/50x50.png',
                'email'          => 'test' .$i .'@test.com',
                // 'user_psw'       => Hash::make('12345678'),
                'password'       => Hash::make('12345678'),
                'remember_token' => str_random(10),
                'created_at'     => now(),
                'updated_at'     => now()

                // 'screen_name'    => 'test_user' .$i,
                // 'name'           => 'TEST' .$i,
                // 'profile_image'  => 'https://placehold.jp/50x50.png',
                // 'email'          => 'test' .$i .'@test.com',
                // 'password'       => Hash::make('12345678'),
                // 'remember_token' => str_random(10),
                // 'created_at'     => now(),
                // 'updated_at'     => now()
            ]);
        }

        // 管理者
        User::create([
            'screen_name'    => '管理者',
            'user_screen_name'=> 'TEST-ADMIN',
            'email'          => 'test0@test.com',
            'password'       => Hash::make('12345678'),
            'user_admin'     => 1,
            'remember_token' => str_random(10),
            'created_at'     => now(),
            'updated_at'     => now()
        ]);
    }
}
