<?php

namespace App\Mail;

use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Route;

class BirthdayEmail extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $url = url('') . "/" . Route::getRoutes()->getByName('admin.customer.index')->uri;
        return $this->view('mail.birthday')
                    ->subject('Thông báo cho Admin')
                    ->with('url', $url);
    }
}
