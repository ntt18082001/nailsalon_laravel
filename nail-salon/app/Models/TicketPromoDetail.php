<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketPromoDetail extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $dates = ["checkin_date"];
    public function user_ticket() {
        return $this->belongsTo(UserTicketPromo::class, 'ticket_detail');
    }
}
