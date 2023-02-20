<?php

namespace App\Mail;

use App\Models\WebConfigs;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AppMail extends Mailable
{
    use Queueable, SerializesModels;
    public $details;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $brand_name = WebConfigs::where('name', '=', 'brand_name')->get();
        $name = $brand_name[0]->value;
        return $this->subject("Confirmation de votre rdv | Salon manicure $name")
            ->view('mail.index');
    }
}
