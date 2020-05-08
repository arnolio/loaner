<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LoanTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('loan_types')->insert([
            'name' => "student",
            'fee' => 0,
            'created_at' => '2020-05-08 11:05:00',
            'updated_at' => '2020-05-08 11:05:00'
        ]);
        DB::table('loan_types')->insert([
            'name' => "auto",
            'fee' => 500,
            'created_at' => '2020-05-08 11:05:00',
            'updated_at' => '2020-05-08 11:05:00'
        ]);
        DB::table('loan_types')->insert([
            'name' => "personal",
            'fee' => 750,
            'created_at' => '2020-05-08 11:05:00',
            'updated_at' => '2020-05-08 11:05:00'
        ]);
        DB::table('loan_types')->insert([
            'name' => "mortgage",
            'fee' => 1500,
            'created_at' => '2020-05-08 11:05:00',
            'updated_at' => '2020-05-08 11:05:00'

        ]);

    }
}
