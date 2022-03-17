<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Room;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ReservationsController extends Controller
{
    public $request;

    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->request = $request;
            return $next($request);
        });
    }

    public function list()
    {
        $rooms = Room::all();
        return view('reservation.create_reservation', [
            "rooms" => $rooms,
        ]);
    }

    public function view($id)
    {
        $reservation = Reservation::where('uuid',$id)->first();
        $room = $reservation->room;
        return view('reservation.view_reservation', [
            'room' => $room,
            'reservation' => $reservation
        ]);
    }

    public function create()
    {
        $validator = Validator::make($this->request->all(), [
            "name_client" => "required",
            "email"      => "required|max:100",
            "phone"       => "required",
            "date_start"   => "required",
            "date_end"   => "required",
        ]);

        if ($validator->fails()) {
            return $this->sendError($validator->errors()->all());
        }
        try {
            DB::transaction(function () {
                $reservation = new Reservation();
                $reservation->name = $this->request->name_client;
                $reservation->email = $this->request->email;
                $reservation->phone = $this->request->phone;
                $reservation->date_start = Carbon::createFromFormat('d-m-Y', $this->request->date_start);
                $reservation->date_end = Carbon::createFromFormat('d-m-Y', $this->request->date_end);
                $reservation->room_id = $this->request->room_name;
                $reservation->uuid = $reservation->generatorUuid();
                $reservation->save();
            });
            return redirect('/');
        } catch (\Exception $exception) {
            $code_errors_array = [4444];
            if (in_array($exception->getCode(),$code_errors_array)){
                return $this->sendError([$exception->getMessage()]);
            }else{
                return $this->sendError(["Ошибка сохранения данных"]);
            }
        }
    }

    public function delete()
    {

    }
}
