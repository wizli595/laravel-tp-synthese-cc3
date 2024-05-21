<div>
    <form action="{{ route('reservations.update',$reservation) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{ $reservation->id }}">
        <div>
            <label for="checkin">checkin</label>
            <input type="date" name="checkin" value="{{ $reservation->checkin }}">
        </div>
        <div>
            <label for="checkout">checkout</label>
            <input type="date" name="checkout" value="{{ $reservation->checkout }}">
        </div>
        <div>
            <label for="total">total</label>
            <input type="text" name="total" value="{{ $reservation->total }}">
        </div>
        <div>
            <select name="room_id">
                @foreach($chambres as $chambre)
                <option value="{{ $chambre->id }}" {{ $chambre->numChambre == $reservation->numChambre ? 'selected' : ''
                    }}>
                    {{$chambre->room_number }}
                </option>
                @endforeach
            </select>
        </div>
        <div>
            <select name="client_id">
                @foreach($clients as $client)
                <option value="{{ $client->codeClient }}" {{ $client->codeClient == $reservation->codeClient ?
                    'selected' : '' }}>
                    {{$client->nom }}
                </option>
                @endforeach
            </select>
        </div>
        <div>
            <button>update</button>
        </div>
    </form>
    @if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif


</div>
