<div>
    <table>
        <thead>
            <tr>
                <th>Client</th>
                <th>Room</th>
                <th>Check In</th>
                <th>Check Out</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reservations as $reservation)
            <tr>
                <td>{{$reservation->client->nom}}</td>
                <td>{{$reservation->room->room_number}}</td>
                <td>{{$reservation->dateDebut}}</td>
                <td>{{$reservation->dateFin}}</td>
                <td>{{$reservation->montant}}</td>
                <td>
                    <div>

                        <a href="{{route('reservations.show', $reservation->id)}}"> {{">>"}} </a>
                    </div>
                    <a href="{{route('reservations.edit', $reservation->id)}}">Edit</a>
                    <form action="{{route('reservations.destroy', $reservation->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
