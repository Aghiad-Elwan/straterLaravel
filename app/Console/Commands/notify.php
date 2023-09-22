<?php

namespace App\Console\Commands;

use App\Mail\NotifyEmail;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;



class notify extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'will send email for all user';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $emails=User::pluck('email')->toArray();
        //$emails=User::select('email')->toArray();
        $data=['title'=>'laravel','body'=>'php'];
        foreach ($emails as $email){
            Mail::To($email)->send(new NotifyEmail($data));
        }

    }
}
