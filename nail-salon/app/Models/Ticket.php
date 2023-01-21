<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    public function status() {
        return $this->hasOne(TicketStatus::class, 'id', 'status_id');
    }
    public function employee() {
        return $this->hasOne(User::class, 'id', 'employee_id');
    }
    public function ticket_details() {
        return $this->hasMany(TicketDetail::class, "id", "bill_id");
    }
}
