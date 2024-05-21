<div>

    <h1>Client {{$reservation->client->nom}}</h1>
    <table class="reservation-table">
        <thead>
            <tr>
                <th>Room</th>
                <th>Check In</th>
                <th>Check Out</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            {{-- @dd($reservations) --}}
            @foreach($reservation->client->$reservations as $res)
            <tr>
                <td>{{$res->room->room_number}}</td>
                <td>{{$res->checkin}}</td>
                <td>{{$res->checkout}}</td>
                <td>{{$res->total}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
