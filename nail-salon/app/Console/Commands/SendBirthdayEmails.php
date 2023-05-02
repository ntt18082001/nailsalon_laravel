<?php

namespace App\Console\Commands;

use App\Mail\BirthdayEmail;
use App\Models\Customer;
use App\Models\WebConfigs;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendBirthdayEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'birthday:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send birthday emails to customers';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Get current date
        $today = Carbon::today();
        $dayConfig = config('app.birthday');
        $customers = Customer::whereMonth('date_of_birth', '=', $today->month)
            ->whereDay('date_of_birth', '>=', $today->day)
            ->whereDay('date_of_birth', '<=', $today->day + $dayConfig)
            ->get();
        if ($customers->count()) {
            $config = WebConfigs::where('name', '=', 'list_mail_reciver')->get();
            $list_mail = str_replace(array('[', ']', '{', '}', '"', "value:"), "", $config[0]->value);
            $array_mail = explode(",", $list_mail);
            foreach ($array_mail as $key => $value) {
                Mail::to($value)->send(new BirthdayEmail());
            }
        }
        return 0;
    }
}
