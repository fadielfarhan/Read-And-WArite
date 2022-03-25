<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transaction_headers')->insert([
            'date' => Carbon::now(),
            'user_id' => 2
        ]);

        DB::table('transaction_details')->insert([
            'transaction_id' => 1,
            'product_id' => 1,
            'quantity' => 15
        ]);

        DB::table('transaction_details')->insert([
            'transaction_id' => 1,
            'product_id' => 4,
            'quantity' => 10
        ]);

        DB::table('transaction_details')->insert([
            'transaction_id' => 1,
            'product_id' => 7,
            'quantity' => 35
        ]);

        DB::table('transaction_details')->insert([
            'transaction_id' => 1,
            'product_id' => 10,
            'quantity' => 20
        ]);
    }
}
