<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Models\TicketDetail;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    function index()
    {
        $result = Ticket::orderByDesc('id')->paginate();
        return view('admin.ticket.index')->with('data', $result);
    }
    function detail($id)
    {
        $data = Ticket::findOrFail($id);
        $childs = TicketDetail::where('bill_id', '=', $data->id)->get();
        return view("admin.ticket.detail", compact("data", "childs"));
    }

    function updateStatus($id, $id_status) {
        $ticket = Ticket::findOrFail($id);
        $ticket->status_id = $id_status;
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
