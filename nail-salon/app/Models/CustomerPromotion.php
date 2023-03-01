<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerPromotion extends Model
{
    use HasFactory;
    public function customer() {
        return $this->hasOne(User::class, 'id', 'cus_id');
    }
    public function walkin_guest() {
        return $this->hasOne(User::class, 'id', 'walkin_guest_id');
    }
}
