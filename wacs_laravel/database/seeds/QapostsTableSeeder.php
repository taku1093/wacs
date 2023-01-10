<?php

use Illuminate\Database\Seeder;
use App\Models\Qacomment;
use App\Models\Qapost;

class QapostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(Qapost::class, 50)
            ->create()
            ->each(function ($qapost) {
                $qacomments = factory(Qacomment::class, 2)->make();
                $qapost->qacomments()->saveMany($qacomments);
            }
        );
    }
}
