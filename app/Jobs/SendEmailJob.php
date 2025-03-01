<?php

namespace App\Jobs;

use App\Mail\LeadVerificationMail;
use App\Models\Lead;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class SendEmailJob implements ShouldQueue
{
    use Queueable;
    public Lead $lead;
    /**
     * Create a new job instance.
     */
    public function __construct(Lead $lead)
    {
        //
        $this->lead = $lead;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //
        Mail::to($this->lead->email)->send(new LeadVerificationMail([
            'first_name' => $this->lead->first_name,
            'email' => $this->lead->email,
       ]));
    }
}
