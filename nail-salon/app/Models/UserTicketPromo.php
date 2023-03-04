<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserTicketPromo extends Model
{
    use HasFactory, SoftDeletes;
    public function user_ticket_details() {
        return $this->hasMany(TicketPromoDetail::class, "ticket_id", "id");
    }
    public function details() {
        return $this->hasMany(TicketPromoDetail::class);
    }
}
