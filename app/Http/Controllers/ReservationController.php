<?php

namespace App\Http\Controllers;

use App\Models\Chambre;
use App\Models\Client;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ReservationController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Reservation::class, 'reservation');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd(Reservation::all());
        return view('reservations.index', [
            'reservations' => Reservation::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        return view('reservations.show', [
            'reservation' => $reservation,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        $clients = Client::all();
        $chambres = Chambre::all();
        return view('reservations.edit', [
            'reservation' => $reservation,
            'clients' => $clients,
            'chambres' => $chambres,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservation $reservation)
    {
        $reservation->update($request->all());
        Mail::to($reservation->client->email)->send(new \App\Mail\ReservationMail($reservation));
        return redirect()->route('reservations.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        //
    }
}
