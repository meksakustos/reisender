@component('mail::message')
    {{$reservation->name}}
    {{$reservation->room->name}}
    {{$reservation->date_start}}
    {{$reservation->date_end}}



    @component('mail::button', ['url' => route('edit_reservation',['id' =>$reservation->uuid]), 'color' => 'success'])
        View Reservation
    @endcomponent

@endcomponent
