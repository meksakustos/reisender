@component('mail::message')
    <p>
        Vielen Dank, dass Sie unseren Service nutzen.
        Ihre Buchungsdetails sind unten aufgeführt.
    </p>
    <div class="table">
        <table>
            <thead>
                <tr>
                    <td>Bookers Name</td>
                    <td>Zimmer</td>
                    <td>Date booking:</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$reservation->name}}</td>
                    <td>{{$reservation->room->name}}</td>
                    <td>{{Carbon\Carbon::parse($reservation->date_start)->format('d.m.Y')}} - {{Carbon\Carbon::parse($reservation->date_end)->format('d.m.Y')}}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <p>Um Ihre Buchung anzuzeigen oder zu ändern, klicken Sie auf die Schaltfläche unten.</p>
    @component('mail::button', ['url' => route('edit_reservation',['id' =>$reservation->uuid]), 'color' => 'success'])
        Reservierung ansehen
    @endcomponent

@endcomponent
