<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Jobs\SendMail;
use App\Mail\AppMail;
use App\Models\NailServices;
use App\Models\Ticket;
use App\Models\WebConfigs;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class BookingController extends Controller
{
    function index()
    {
        return view('client.booking.index');
    }

    function save(Request $request)
    {
        $data = $request->all();
        unset($data["_token"]);

        $service = NailServices::findOrFail($data['service_id']);
        $ticket = new Ticket();
        if (Auth::check()) {
            $ticket->cus_id = Auth::id();
        }
        $ticket->cus_name = $data["cus_name"];
        $ticket->cus_phone = $data["cus_phone"];
        $ticket->cus_email = $data["cus_email"];
        $ticket->cus_note = empty($data['cus_note']) ? "" : $data['cus_note'];
        $ticket->status_id = 1;
        $ticket->start_at = strtotime($data["start_at"]) * 1000;
        $ticket->total = $service->price_couleur;
        $ticket->branch = $data['branch'];
        $ticket->update_at = Carbon::now();

        $ticket->save();
        $ticket->ticket_details()->create([
            'bill_id' => $ticket->id,
            'service_id' => $data['service_id'],
            'service_name' => $service->name,
            'price' => $service->price_couleur,
            'img_path' => $service->cover_path
        ]);

        $config = WebConfigs::where('name', '=', 'brand_name')
            ->orWhere('name', '=', 'time_cancel')
            ->orWhere('name', '=', 'list_mail_reciver')->get();
        $name = $config[0]->value;
        $time_cancel = $config[1]->value;
        $mail_details = [
            'cus_name' => $data["cus_name"],
            'cus_email' => $data["cus_email"],
            'cus_phone' => $data["cus_phone"],
            'brand_name' => $name,
            'time' => $data["start_at"],
            'title' => "You have successfully booked your appointment!",
            'body' => "You can cancel your appoinment before $time_cancel minutes",
        ];
        $list_mail = str_replace(array('[', ']', '{', '}', '"', "value:"), "", $config[2]->value);
        $array_mail = explode(",", $list_mail);

        $configApp = config('sendmail');
        if ($configApp) {
            $job = (new SendMail($mail_details, $array_mail));
            dispatch($job)->delay(now()->addSeconds(30));
        } else {
            $send_mail = new AppMail($mail_details);
            Mail::to($mail_details['cus_email'])->send($send_mail);
            foreach ($array_mail as $key => $value) {
                Mail::to($value)->send($send_mail);
            }
        }

        return redirect()->route('client.booking.index')->with('successMsg', "Booking success!");
    }
    function cancel_appoinment($id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->status_id = 3;
        $ticket->save();

        $config = WebConfigs::where('name', '=', 'brand_name')
            ->orWhere('name', '=', 'time_cancel')
            ->orWhere('name', '=', 'list_mail_reciver')->get();
        $name = $config[0]->value;
        $mail_details = [
            'cus_name' => $ticket->cus_name,
            'cus_email' => $ticket->cus_email,
            'cus_phone' => $ticket->cus_phone,
            'brand_name' => $name,
            'time' => date("d-m-Y H:i:s", ($ticket->start_at / 1000)),
            'title' => "$ticket->cus_name canceled appoinment!",
            'body' => "",
        ];
        $list_mail = str_replace(array('[', ']', '{', '}', '"', "value:"), "", $config[2]->value);
        $array_mail = explode(",", $list_mail);

        $configApp = config('sendmail');
        if ($configApp) {
            $job = (new SendMail($mail_details, $array_mail));
            dispatch($job)->delay(now()->addSeconds(30));
        } else {
            $send_mail = new AppMail($mail_details);
            Mail::to($mail_details['cus_email'])->send($send_mail);
            foreach ($array_mail as $key => $value) {
                Mail::to($value)->send($send_mail);
            }
        }

        return redirect()->back();
    }
}
