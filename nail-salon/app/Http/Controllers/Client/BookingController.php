<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\NailServices;
use App\Models\Ticket;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    function index() {
        return view('client.booking.index');
    }

    function save(Request $request) {
        $data = $request->all();
        unset($data["_token"]);

        $service = NailServices::findOrFail($data['service_id']);
        $ticket = new Ticket();
        $ticket->cus_name = $data["cus_name"];
        $ticket->cus_phone = $data["cus_phone"];
        $ticket->cus_email = $data["cus_email"];
        $ticket->cus_note = '';
        $ticket->status_id = 1;
        $ticket->employee_id = $data["employee_id"];
        $ticket->start_at = strtotime($data["start_at"]) * 1000;
        $ticket->total = $service->price_couleur;
        $ticket->update_at = Carbon::now();
        
        $ticket->save();
        $ticket->ticket_details()->create([
            'bill_id' => $ticket->id,
            'service_id' => $data['service_id'],
            'service_name' => $service->name,
            'price' => $service->price_couleur,
            'img_path' => $service->cover_path
        ]);

        return redirect()->route('client.booking.index')->with('successMsg', "Booking success!");
    }
}
