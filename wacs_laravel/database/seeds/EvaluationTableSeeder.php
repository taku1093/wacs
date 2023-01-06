<?php

use Illuminate\Database\Seeder;
use App\Models\Evaluation;

class EvaluationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //各ユーザを評価
        for ($i = 2; $i <= 5; $i++) {
            Evaluation::create([
                'user_id' => 1,
                'eval_user_id' => $i,
                'eval_number' => 3
            ]);
        }

        for ($i = 6; $i <= 10; $i++) {
            Evaluation::create([
                'user_id' => 1,
                'eval_user_id' => $i,
                'eval_number' => 4
            ]);
        }


        for ($i = 3; $i <= 5; $i++) {
            Evaluation::create([
                'user_id' => 2,
                'eval_user_id' => $i,
                'eval_number' => 3
            ]);
        }

        for ($i = 6; $i <= 10; $i++) {
            Evaluation::create([
                'user_id' => 2,
                'eval_user_id' => $i,
                'eval_number' => 4
            ]);
        }
    }
}
