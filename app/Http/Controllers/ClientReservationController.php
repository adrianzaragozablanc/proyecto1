<?php

namespace App\Http\Controllers;

use App\Models\ClientReservation;
use Illuminate\Http\Request;

class ClientReservationController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'dni' => 'required|string',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'phone_number' => 'required|string',
            'address' => 'required|string',
            'city' => 'required|string',
            'reservation_id' => 'required|exists:reservations,id',
        ]);

        $clientReservation = ClientReservation::create($request->all());

        return redirect()->route('reservations.show', $request->reservation_id);
    }

    public function update(Request $request, $id)
    {
        $clientReservation = ClientReservation::findOrFail($id);

        $request->validate([
            'dni' => 'required|string',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'phone_number' => 'required|string',
            'address' => 'required|string',
            'city' => 'required|string',
        ]);

        $clientReservation->update($request->all());

        return redirect()->route('reservations.show', $clientReservation->reservation_id);
    }

    public function destroy($id)
    {
        $clientReservation = ClientReservation::findOrFail($id);
        $reservationId = $clientReservation->reservation_id;
        $clientReservation->delete();
        return redirect()->route('reservations.show', $reservationId);
    }
}
