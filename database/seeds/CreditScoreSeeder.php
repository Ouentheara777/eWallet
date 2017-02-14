<?php

use Illuminate\Database\Seeder;

class CreditScoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Manually Defined Credit Scores.
        $records = [
            [
                'category_id' => 1,
                'credit_point' => 2
            ],
            [
                'category_id' => 2,
                'credit_point' => 4
            ],
            [
                'category_id' => 3,
                'credit_point' => 7
            ],
            [
                'category_id' => 4,
                'credit_point' => 8
            ],
            [
                'category_id' => 5,
                'credit_point' => 10
            ]
        ];

        foreach ($records as $record) {

            DB::table('credit_scores')->insert($record);
        }
    }
}
