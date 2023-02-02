<?php

namespace App\Jobs;

use App\Mail\AppMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $mail_data, $list_mail_reciver;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($mail_data, $list_mail_reciver)
    {
        $this->mail_data = $mail_data;
        $this->list_mail_reciver = $list_mail_reciver;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $send_mail = new AppMail($this->mail_data);
        Mail::to($this->mail_data['cus_email'], $this->mail_data['mail_admin_reciver'])->send($send_mail);
        foreach ($this->list_mail_reciver as $key => $value) {
            Mail::to($value)->send($send_mail);
        }
    }
}
