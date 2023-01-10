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
                'name' => 'DIY',

            ]);

            Qacategory::create([
            
                'created_at' => now(),
                'updated_at' => now(),
                'is_deleted' => 0,
                'name' => 'Laravel',

            ]);

            Qacategory::create([

                'created_at' => now(),
                'updated_at' => now(),
                'is_deleted' => 0,
                'name' => 'WEBサービス',
            ]);

            Qacategory::create([

                'created_at' => now(),
                'updated_at' => now(),
                'is_deleted' => 0,
                'name' => 'カメラ',
            ]);

            Qacategory::create([

                'created_at' => now(),
                'updated_at' => now(),
                'is_deleted' => 0,
                'name' => 'Javascript',
            ]);
        // }   
    }
}
