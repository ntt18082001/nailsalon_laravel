<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceCategory extends Model
{
    use HasFactory;

    protected $guarded = [];
    public function list_nail_services() {
        return $this->hasMany(NailServices::class, "service_cate_id", "id");
    }
}
