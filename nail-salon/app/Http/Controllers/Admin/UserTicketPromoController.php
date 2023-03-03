<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TicketPromoDetail;
use App\Models\UserTicketPromo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserTicketPromoController extends Controller
{
    function index(Request $request)
    {
        if (isset($request->cus_name) || isset($request->cus_phone)) {
            $cus_name = isset($request->cus_name) ? $request->cus_name : false;
            $cus_phone = isset($request->cus_phone) ? $request->cus_phone : false;

            $query = UserTicketPromo::query();
            if ($cus_name) {
                $query->where('name', 'like', "%$cus_name%");
            }
            if ($cus_phone) {
                $query->where('phone_number', 'like', "%$cus_phone%");
            }
            $result = $query->orderByDesc('id')->paginate();
            return view('admin.ticketpromo.index')->with('data', $result);
        }
        $result = UserTicketPromo::with('user_ticket_details')->where('is_old_ticket', '=', null)->orderByDesc('id')->paginate();
        return view('admin.ticketpromo.index')->with('data', $result);
    }
    function create()
    {
        return view('admin.ticketpromo.create');
    }
    function save(Request $request)
    {
        $data = $request->all();
        unset($data["_token"]);
        $this->customValidate($data);
        $user_ticket = new UserTicketPromo();
        $user_ticket->name = $data['name'];
        $user_ticket->email = $data['email'];
        $user_ticket->phone_number = $data['phone_number'];
        $user_ticket->user_ticket_no = 1;
        $user_ticket->save();

        foreach($data['ticket_detail'] as $key => $value) {
            if($value != null) {
                $user_ticket->user_ticket_details()->create([
                    'ticket_id' => $user_ticket->id,
                    'checkin_date' => $value
                ]);
            }
        }
        return redirect()->route('admin.ticketpromo.index');
    }
    function delete($id)
    {
        UserTicketPromo::where('id', $id)->delete();
        return redirect()->route('admin.ticketpromo.index');
    }
    private function customValidate($data)
    {
        $rules = [
            "name" => ['required'],
            "phone_number" => ["required"],
        ];

        $fields = [
            'name' => 'Fullname',
            'email' => "Email",
            "phone_number" => "Phone number",
        ];
        $validator = Validator::make($data, $rules, [], $fields);
        $validator->validate();
    }
    function reset($id) {
        $oldTicket = UserTicketPromo::findOrFail($id);
        $oldTicket->is_old_ticket = true;
        $oldTicket->save();

        $newTicket = new UserTicketPromo();
        $newTicket->name = $oldTicket->name;
        $newTicket->email = $oldTicket->email;
        $newTicket->phone_number = $oldTicket->phone_number;
        $newTicket->user_ticket_no = $oldTicket->user_ticket_no + 1;
        $newTicket->save();
        return redirect()->route('admin.ticketpromo.index');
    }
    function addChecked(Request $request) {
        $tDetail = new TicketPromoDetail();
        $tDetail->ticket_id = $request->id;
        $tDetail->checkin_date = $request->date;
        $tDetail->save();
        return true;
    }
}
