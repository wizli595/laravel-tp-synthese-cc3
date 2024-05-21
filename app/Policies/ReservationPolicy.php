<?php

namespace App\Policies;

use App\Models\Reservation;
use App\Models\User;

class ReservationPolicy
{
    public Reservation $reservation;
    /**
     * Create a new policy instance.
     */
    public function __construct($reservation)
    {
        $this->reservation = $reservation;
    }
    public function view(User $user, Reservation $reservation): bool
    {
        return $user->id === $reservation->client_id;
    }
    public function delete(User $user, Reservation $reservation): bool
    {
        return $user->id === $reservation->client_id;
    }
}
