<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\SendMail;
use App\Mail\AppMail;
use App\Models\Ticket;
use App\Models\TicketDetail;
use App\Models\WebConfigs;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class TicketController extends Controller
{
    function index()
    {
        $result = Ticket::orderByDesc('id')->paginate();
        $conf = WebConfigs::where('name', '=', 'time_cancel')->get();
        return view('admin.ticket.index')->with('data', $result)->with('time_cancel', $conf[0]->value);
    }
    function detail($id)
    {
        $data = Ticket::findOrFail($id);
        $childs = TicketDetail::where('bill_id', '=', $data->id)->get();
        return view("admin.ticket.detail", compact("data", "childs"));
    }

    function updateStatus($id, $id_status)
    {
        $user = Auth::user();
        $ticket = Ticket::findOrFail($id);
        $ticket->status_id = $id_status;
        $ticket->save();

        $config = WebConfigs::where('name', '=', 'brand_name')
            ->orWhere('name', '=', 'time_cancel')
            ->orWhere('name', '=', 'mail_reciver')
            ->orWhere('name', '=', 'list_mail_reciver')->get();
        $name = $config[0]->value;
        $mail_admin_reciver = $config[2]->value;
        $mail_details = [
            'cus_name' => $ticket->cus_name,
            'cus_email' => $ticket->cus_email,
            'cus_phone' => $ticket->cus_phone,
            'brand_name' => $name,
            'time' => date("d-m-Y H:i:s", ($ticket->start_at / 1000)),
            'title' => "$user->name canceled appoinment!",
            'body' => "",
            'mail_admin_reciver' => $mail_admin_reciver
        ];
        $list_mail = str_replace(array('[', ']', '{', '}', '"', "value:"), "", $config[3]->value);
        $array_mail = explode(",", $list_mail);

        $job = (new SendMail($mail_details, $array_mail));
        dispatch($job)->delay(now()->addSeconds(30));

        return response()->json(["message" => true]);
    }
    function delete($id)
    {
        $data = Ticket::findOrFail($id);
        $data->delete();
        return redirect()->route("admin.ticket.index");
    }
}
