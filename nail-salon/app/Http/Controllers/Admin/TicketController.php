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
    function index(Request $request)
    {
        $conf = WebConfigs::where('name', '=', 'time_cancel')->get();
        if (isset($request->cus_name) || isset($request->cus_phone) || isset($request->status_id)) {
            $cus_name = isset($request->cus_name) ? $request->cus_name : false;
            $cus_phone = isset($request->cus_phone) ? $request->cus_phone : false;
            $status_id = isset($request->status_id) ? $request->status_id : false;

            $query = Ticket::query();
            if ($cus_name) {
                $query->where('cus_name', 'like', "%$cus_name%");
            }
            if ($cus_phone) {
                $query->where('cus_phone', 'like', "%$cus_phone%");
            }
            if ($status_id) {
                $query->where('status_id', '=', $status_id);
            }
            $result = $query->orderByDesc('id')->paginate();
            return view('admin.ticket.index')->with('data', $result)->with('time_cancel', $conf[0]->value);
        } else {
            $result = Ticket::orderByDesc('id')->paginate();
            return view('admin.ticket.index')->with('data', $result)->with('time_cancel', $conf[0]->value);
        }
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
            'title' => "$user->name canceled appoinment!",
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
        $ticket->save();
        return response()->json(["message" => true]);
    }
    function delete($id)
    {
        $data = Ticket::findOrFail($id);
        $data->delete();
        return redirect()->route("admin.ticket.index");
    }
}
