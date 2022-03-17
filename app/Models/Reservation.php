<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'phone'
    ];
    protected $dates = ['date_start','date_end'];

    public $timestamps = false;

    public function room(){
        return $this->hasOne(Room::class,"id","room_id");
    }
    public function generatorUuid(){
        return (string) Str::uuid();
    }
}
