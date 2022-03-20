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

    public function validate() {
        $start_date = $this->date_start;
        $end_date = $this->date_end;
        $room_id = $this->room_id;
        $id = $this->getKey();
        return 0 == Reservation::
            where(function($query) use ($start_date, $end_date, $room_id, $id) {
                if ($id) {
                    $query->where('id', '<>', $id);
                }
                $query->where('room_id', '==', $room_id);
                $query->whereDate('date_start', '>=', $start_date);
                $query->whereDate('date_start', '<=', $end_date);
            })->orWhere(function($query) use ($start_date, $end_date, $room_id, $id) {
                if ($id) {
                    $query->where('id', '<>', $id);
                }
                $query->where('room_id', '==', $room_id);
                $query->whereDate('date_end', '>=', $start_date);
                $query->whereDate('date_end', '<=', $end_date);
            })->count();
    }
}
