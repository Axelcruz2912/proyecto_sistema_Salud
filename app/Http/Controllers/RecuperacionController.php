<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\RecuperacionCuenta;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class RecuperacionController extends Controller
{
    // 👉 Vista para pedir correo
    public function form()
    {
        return view('auth.recuperar');
    }

    // 👉 Generar token
    public function solicitar(Request $request)
    {
        $request->validate([
            'correo' => 'required|email'
        ]);

        $usuario = Usuario::where('correo', $request->correo)->first();

        if (!$usuario) {
            return back()->withErrors([
                'correo' => 'Usuario no encontrado'
            ]);
        }

        $token = Str::random(60);

        RecuperacionCuenta::create([
            'id_usuario' => $usuario->id_usuario,
            'token' => $token,
            'fecha_expiracion' => Carbon::now()->addMinutes(30)
        ]);

        // simulamos envío de correo
        return redirect("/reset/$token");
    }

    // 👉 Vista nueva contraseña
    public function resetForm($token)
    {
        $rec = RecuperacionCuenta::where('token', $token)
            ->where('usada', 0)
            ->where('fecha_expiracion', '>', now())
            ->first();

        if (!$rec) {
            abort(403, 'Token inválido o expirado');
        }

        return view('auth.reset', compact('token'));
    }

    // 👉 Guardar nueva contraseña
    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'password' => 'required|min:6|confirmed'
        ]);

        $rec = RecuperacionCuenta::where('token', $request->token)
            ->where('usada', 0)
            ->firstOrFail();

        $usuario = Usuario::findOrFail($rec->id_usuario);

        $usuario->credencial->update([
            'contraseña_hash' => Hash::make($request->password)
        ]);

        $rec->update(['usada' => 1]);

        return redirect('/login')->with('success', 'Contraseña actualizada');
    }
}
