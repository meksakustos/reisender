<?php

namespace App\Http\Controllers;

use App\Mail\reservationLink;
use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Room;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ReservationsController extends Controller
{
    public $request;
    public $uuidForUrl;

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
        if (null === $reservation) {
            return $this->sendError(["Booking not found."]);
        }
        $room = $reservation->room;
        return view('reservation.edit_reservation', [
            'current_room' => $room,
            'rooms' => Room::all(),
            'reservation' => $reservation,
            'out_of_service' => time() > strtotime($reservation->date_start)
        ]);
    }

    public function create()
    {
        $validator = Validator::make($this->request->all(), [
            "name_client" => "required",
            "email"      => "required|email",
            "phone"       => "required",
            "date"   => "required",
        ]);

        if ($validator->fails()) {
            return $this->sendError($validator->errors()->all());
        }
        $date = explode(' - ', $this->request->date);

        try {
            DB::transaction(function () use($date) {
                $reservation = new Reservation();
                $reservation->name = $this->request->name_client;
                $reservation->email = $this->request->email;
                $reservation->phone = $this->request->phone;
                $reservation->date_start = Carbon::createFromFormat('d.m.Y', $date[0]);
                $reservation->date_end = Carbon::createFromFormat('d.m.Y', $date[1]);
                $reservation->room_id = $this->request->room_name;
                $reservation->uuid = $reservation->generatorUuid();
                if (!$reservation->validate()) {
                    throw new \Exception('The room is occupied during this period.', 10000);
                }
                $reservation->save();

                Mail::to($this->request->email)->send(new reservationLink($reservation));
                $this->uuidForUrl = $reservation->uuid;
            });

            return redirect(route('edit_reservation',['id' =>$this->uuidForUrl]));
        } catch (\Exception $exception) {
            $code_errors_array = [4444, 10000];
            if (in_array($exception->getCode(),$code_errors_array)){
                return back()->withError($exception->getMessage())->withInput();
            }else{
                return back()->withError($exception->getMessage())->withInput();
            }
        }
    }


    public function update($id = null)
    {
        if (null === $id) {
            return $this->sendError(["Booking not found."]);
        }
        $validator = Validator::make($this->request->all(), [
            "name_client" => "required",
            "email"      => "required|email",
            "phone"       => "required",
            "date"   => "required"
        ]);

        if ($validator->fails()) {
            return $this->sendError($validator->errors()->all());
        }
        $date = explode(' - ', $this->request->date);
        $reservation = Reservation::where('uuid', $id)->first();
        if (null === $reservation) {
            return $this->sendError(["Booking not found."]);
        }
        try {
            DB::transaction(function () use ($reservation, $date) {
                $reservation->name = $this->request->name_client;
                $reservation->email = $this->request->email;
                $reservation->phone = $this->request->phone;
                $reservation->date_start = Carbon::createFromFormat('d.m.Y', $date[0]);
                $reservation->date_end = Carbon::createFromFormat('d.m.Y', $date[1]);
                $reservation->room_id = $this->request->room_name;
                if (!$reservation->validate()) {
                    throw new \Exception('The room is occupied during this period.', 10000);
                }
                $reservation->save();
                Mail::to($this->request->email)->send(new reservationLink($reservation));
            });
            return redirect(route('edit_reservation', $reservation->uuid));
        } catch (\Exception $exception) {
            $code_errors_array = [4444, 10000];
            if (in_array($exception->getCode(),$code_errors_array)){
                return $this->sendError([$exception->getMessage()])->withInput();
            }else{
                return $this->sendError(["Failed to update booking."]);
            }
        }

    }

    public function delete($id)
    {
        $reservation = Reservation::where('uuid', $id)->first();
        if (null === $reservation) {
            return $this->sendError(["Booking not found."]);
        }
        $reservation->delete();
        return redirect(route('booking'));
    }
//    public function getDate(){
//        $id = $this->request->room_id;
//        $response =[];
//        $result = Reservation::where('room_id', $id)->get();
//        $response['reservation'] = $result;
//        return response()->json($response);
//    }
}
