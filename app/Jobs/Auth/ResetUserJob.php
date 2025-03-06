<?php

namespace App\Jobs\Auth;

use App\Mail\Auth\ResetMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

use App\Models\Setting;

class ResetUserJob implements ShouldQueue
{
    use Queueable;

    public $user, $token;
    /**
     * Create a new job instance.
     */
    public function __construct($user, $token)
    {
        $this->user = $user;
        $this->token = $token;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $settings = Setting::first();
        Mail::to($this->user->email)->send(new ResetMail($this->user, $this->token, $settings));
    }
}
