<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NailServices extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $dates = ["discount_from", "discount_to"];
    public function service_cate() {
        return $this->hasOne(ServiceCategory::class, 'id', 'service_cate_id');
    }
}
