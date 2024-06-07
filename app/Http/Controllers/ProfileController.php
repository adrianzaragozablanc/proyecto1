<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function updateSession(Request $request)
    {
        $user = Auth::user();
        $minutos = $user->minutos;
        $user->minutos = $minutos + $request->input('sessionDuration');
        $user->save();

        session(['last_update_mark' => now()]);

        return response()->json(['success' => true]);
    }
}
