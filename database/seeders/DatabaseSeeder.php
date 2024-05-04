<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(AdminSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(ClinicsSeeder::class);
        $this->call(LocationsSeeder::class);
        $this->call(DoctorsSeeder::class);
        $this->call(PatientsSeeder::class);
        $this->call(AssistantsSeeder::class);
        // 
        // $this->call(ClinicDoctorSeeder::class);
        // $this->call(MedicinesSeeder::class);
        // $this->call(PrescriptionsSeeder::class);
        // $this->call(MedicinePrescriptionSeeder::class);
        //
        // $this->call(BillsSeeder::class);
        // $this->call(PaymentMethodsSeeder::class);
        // $this->call(BillPaymentSeeder::class);
    }
}
