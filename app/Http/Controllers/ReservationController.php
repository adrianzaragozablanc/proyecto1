<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function store(Request $request)
    {
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

        $reservation = new Reservation();
        $reservation->nombre = $validated['nombre'];
        $reservation->dni = $validated['dni'];
        $reservation->direccion = $validated['direccion'];
        $reservation->poblacion = $validated['poblacion'];
        $reservation->telefono = $validated['telefono'];
        $reservation->correo = $validated['correo'];
        $reservation->num_huespedes = $validated['num_huespedes'];
        $reservation->num_ninos = $validated['num_ninos'];
        $reservation->fecha_entrada = $validated['fecha_entrada'];
        $reservation->fecha_salida = $validated['fecha_salida'];

        if (Auth::check()) {
            $reservation->user_id = Auth::id();
        }

        $reservation->save();

        return redirect()->route('reservations.index')->with('success', 'Reserva creada exitosamente.');
    }

    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Debes estar autenticado para ver las reservas.');
        }

        $user = Auth::user();

        if ($user->hasRole('admin') || $user->hasRole('trabajador')) {
            $reservations = Reservation::all();
        } else {
            $reservations = $user->reservation;
        }

        return view('showreserva', compact('reservations'));
    }

    public function show($id)
    {
        $reservation = Reservation::findOrFail($id);
        return view('show', compact('reservation'));
    }

    public function edit($id)
    {
        $reservation = Reservation::findOrFail($id);
        return view('edit', compact('reservation'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'dni' => 'required|string|max:10',
            'fecha_entrada' => 'required|date',
            'fecha_salida' => 'required|date|after_or_equal:fecha_entrada',
        ]);

        $reservation = Reservation::findOrFail($id);
        $reservation->update($validated);

        return redirect()->route('reservations.index')->with('success', 'Reserva actualizada exitosamente.');
    }

    public function destroy($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->delete();

        return redirect()->route('reservations.index')->with('success', 'Reserva eliminada exitosamente.');
    }
}
