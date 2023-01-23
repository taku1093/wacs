<?php

use Illuminate\Database\Seeder;
use App\Models\Qacategory;

class QacategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    // for ($i = 1; $i <= 10; $i++) {
            Qacategory::create([
                
                'created_at' => now(),
                'updated_at' => now(),
                'is_deleted' => 0,
                'name' => '椅子',

            ]);

            Qacategory::create([
            
                'created_at' => now(),
                'updated_at' => now(),
                'is_deleted' => 0,
                'name' => '机',

            ]);

            Qacategory::create([

                'created_at' => now(),
                'updated_at' => now(),
                'is_deleted' => 0,
                'name' => '棚',
            ]);

            Qacategory::create([

                'created_at' => now(),
                'updated_at' => now(),
                'is_deleted' => 0,
                'name' => 'テラス',
            ]);

            Qacategory::create([

                'created_at' => now(),
                'updated_at' => now(),
                'is_deleted' => 0,
                'name' => 'ベランダ/バルコニー',
            ]);

            Qacategory::create([
                
                'created_at' => now(),
                'updated_at' => now(),
                'is_deleted' => 0,
                'name' => 'ペット',

            ]);

            Qacategory::create([
            
                'created_at' => now(),
                'updated_at' => now(),
                'is_deleted' => 0,
                'name' => 'ポスト/表札',

            ]);

            Qacategory::create([

                'created_at' => now(),
                'updated_at' => now(),
                'is_deleted' => 0,
                'name' => 'キッチン',
            ]);

            Qacategory::create([

                'created_at' => now(),
                'updated_at' => now(),
                'is_deleted' => 0,
                'name' => '100均DIY',
            ]);

            Qacategory::create([

                'created_at' => now(),
                'updated_at' => now(),
                'is_deleted' => 0,
                'name' => 'その他',
            ]);
        // }   
    }
}
