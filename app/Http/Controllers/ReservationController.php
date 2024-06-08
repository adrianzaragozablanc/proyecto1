<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    /**
     * Store a newly created reservation in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'dni' => 'required|string|max:255',
            'direccion' => 'nullable|string|max:255',
            'poblacion' => 'nullable|string|max:255',
            'telefono' => 'required|string|max:20',
            'correo' => 'required|email|max:255',
            'num_huespedes' => 'required|integer|min:1',
            'num_ninos' => 'nullable|integer|min:0',
            'fecha_entrada' => 'required|date',
            'fecha_salida' => 'required|date|after_or_equal:fecha_entrada',
        ]);

        // Create the reservation
        $reservation = new Reservation();
        $reservation->nombre = $request->input('nombre');
        $reservation->dni = $request->input('dni');
        $reservation->direccion = $request->input('direccion');
        $reservation->poblacion = $request->input('poblacion');
        $reservation->telefono = $request->input('telefono');
        $reservation->correo = $request->input('correo');
        $reservation->num_huespedes = $request->input('num_huespedes');
        $reservation->num_ninos = $request->input('num_ninos');
        $reservation->fecha_entrada = $request->input('fecha_entrada');
        $reservation->fecha_salida = $request->input('fecha_salida');

        // Add the user_id if the user is logged in
        if (Auth::check()) {
            $reservation->user_id = Auth::id();
        }

        $reservation->save();

        return response()->json(['message' => 'Reserva guardada exitosamente']);
    }

    /**
     * Display the specified reservation.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reservation = Reservation::findOrFail($id);
        return view('reserva.show', compact('reservation'));
    }
}
