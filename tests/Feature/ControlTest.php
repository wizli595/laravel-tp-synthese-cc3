<?php

namespace Tests\Feature;

use App\Models\Reservation;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ControlTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function test_reservations_index(): void
    {
        $reservation = Reservation::factory(3)->create();
        $response = $this->get('/reservations')->assertViewIs('reservations.index')
            ->assertViewHas('reservations', $reservation);
        $this->assertCount(3, $response->viewData('reservations'));


        $response->assertStatus(200);
    }
    public function test_reservations_show(): void
    {
        $response = $this->get('/reservations/1');

        $response->assertStatus(200);
    }
    public function test_reservations_edit(): void
    {
        $reservation= Reservation::factory()->create();
        $response = $this->get("/reservations/{$reservation->numReservation}/edit");
        $this->assertEquals($reservation->numReservation,
             $response->viewData('reservation')->numReservation);
        $response->assertStatus(200);
    }
    public function test_reservations_update(): void
    {
        $reservation= Reservation::factory()->create();
        $newData= [
            'dateDebut' => '2021-12-12',
            'dateFin' => '2021-12-15',
            'client_id' => 1,
            'chambre_id' => 1,
        ];
        $response = $this->put("/reservations/{$reservation->numReservation}"
        ,$newData)->assertRedirect('/reservations');
        $reservation->refresh();

        $this->assertEquals($newData, $reservation->toArray());
        $response->assertStatus(200);
    }
}
