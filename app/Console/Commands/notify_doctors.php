<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Mail\NotifyDoctors;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class notify_doctors extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:notify_doctors';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'notify doctors with today\'s table';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $doctors = User::all();
        foreach ($doctors as $doctor) {
            Mail::to($doctor->email)->send(new NotifyDoctors($doctor));
        }
    }
}
