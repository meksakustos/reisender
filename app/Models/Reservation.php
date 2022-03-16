<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'phone', 'date_start', 'date_end'
    ];

    public function room(){
        return $this->hasOne("Room","id","room_id");

    }
}
