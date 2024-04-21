<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class BillPaymentSeeder extends Seeder
{
    public function run()
    {
        $bills = DB::table('bills')->pluck('id')->toArray();
        $paymentMethods = DB::table('payment_methods')->pluck('id')->toArray();

        for ($i = 0; $i < 10; $i++) {
            $billId = array_rand($bills);
            $paymentMethodId = array_rand($paymentMethods);

            DB::table('bill_payment')->insert([
                'bill_id' => $bills[$billId],
                'payment_method_id' => $paymentMethods[$paymentMethodId],
                'payment_date' => now(),
                'amount' => 100, 
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}