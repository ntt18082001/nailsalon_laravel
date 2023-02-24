<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Jobs\SendMail;
use App\Mail\AppMail;
use App\Models\NailServices;
use App\Models\Ticket;
use App\Models\TicketDetail;
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
        $ticket->branch = $data['branch'];
        $ticket->update_at = Carbon::now();

        $arrSerivce = [];
        array_pop($data['service_id']);
        foreach($data['service_id'] as $key => $value) {
            if(isset($value)) {
                $service = NailServices::findOrFail($value);
                array_push($arrSerivce, $service);
                $ticket->total += $service->price_couleur;
            }
        }
        $ticket->save();
        foreach($arrSerivce as $item) {
            $ticket->ticket_details()->create([
                'bill_id' => $ticket->id,
                'service_id' => $key,
                'service_name' => $item->name,
                'price' => $item->price_couleur,
                'img_path' => $item->cover_path
            ]);
        }

        $ticket_details = TicketDetail::where('bill_id', $ticket->id)->get();

        $config = WebConfigs::where('name', '=', 'brand_name')
            ->orWhere('name', '=', 'time_cancel')
            ->orWhere('name', '=', 'list_mail_reciver')
            ->orWhere('name', '=', 'brand_phone')->get();
        $name = $config[0]->value;
        $time_cancel = $config[2]->value;
        $mail_details = [
            'cus_name' => $data["cus_name"],
            'cus_email' => $data["cus_email"],
            'cus_phone' => $data["cus_phone"],
            'brand_name' => $name,
            'time' => $data["start_at"],
            'title' => "Vous avez pris rendez-vous avec succès !!",
            'body' => "Vous pouvez annuler votre rendez-vous avant $time_cancel minutes",
            'branch' => $data['branch'],
            'services' => $ticket_details,
            'brand_phone' => $config[1]->value
        ];
        $list_mail = str_replace(array('[', ']', '{', '}', '"', "value:"), "", $config[3]->value);
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
        $ticket_details = TicketDetail::where('bill_id', $id)->get();
        $ticket->status_id = 3;
        $ticket->save();

        $config = WebConfigs::where('name', '=', 'brand_name')
            ->orWhere('name', '=', 'time_cancel')
            ->orWhere('name', '=', 'list_mail_reciver')
            ->orWhere('name', '=', 'brand_phone')->get();
        $name = $config[0]->value;
        $mail_details = [
            'cus_name' => $ticket->cus_name,
            'cus_email' => $ticket->cus_email,
            'cus_phone' => $ticket->cus_phone,
            'brand_name' => $name,
            'time' => date("d-m-Y H:i:s", ($ticket->start_at / 1000)),
            'title' => "$ticket->cus_name rendez-vous annulé!",
            'body' => "",
            'branch' => $ticket->branch,
            'services' => $ticket_details,
            'brand_phone' => $config[1]->value
        ];
        $list_mail = str_replace(array('[', ']', '{', '}', '"', "value:"), "", $config[3]->value);
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
