<?php

namespace App\Jobs\Auth;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;
use App\Mail\Auth\RegistrationMail;

use App\Models\Setting;

class RegistrationUserEmailJob implements ShouldQueue
{
    use Queueable;

    protected $user, $password, $token;

    /**
     * Create a new job instance.
     */
    public function __construct($user, $password, $token)
    {
        $this->user = $user;
        $this->password = $password;
        $this->token = $token;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $settings = Setting::first();
        Mail::to($this->user->email)->send(new RegistrationMail($this->user, $this->password, $this->token, $settings));
    }
}
