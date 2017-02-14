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
                'category' => 1,
                'credit_point' => 2
            ],
            [
                'category' => 2,
                'credit_point' => 4
            ],
            [
                'category' => 3,
                'credit_point' => 7
            ],
            [
                'category' => 4,
                'credit_point' => 8
            ],
            [
                'category' => 5,
                'credit_point' => 10
            ]
        ];

        foreach ($records as $record) {

            DB::table('credit_scores')->insert($record);
        }
    }
}
