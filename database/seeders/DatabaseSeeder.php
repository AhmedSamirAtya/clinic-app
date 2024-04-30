<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(RolesSeeder::class);
        $this->call(AdminSeeder::class);
        // $this->call(DoctorsSeeder::class);
        // $this->call(PatientsSeeder::class);
        // $this->call(AssistantsSeeder::class);
        // $this->call(NursesSeeder::class);
        // $this->call(ClinicsSeeder::class);
        // $this->call(ClinicDoctorSeeder::class);
        // $this->call(MedicinesSeeder::class);
        // $this->call(PrescriptionsSeeder::class);
        // $this->call(MedicinePrescriptionSeeder::class);
        //$this->call(LocationsSeeder::class);
        // $this->call(BillsSeeder::class);
        // $this->call(PaymentMethodsSeeder::class);
        // $this->call(BillPaymentSeeder::class);
    }
}
