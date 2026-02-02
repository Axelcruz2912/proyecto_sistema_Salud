<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Acceso;

class LoginController extends Controller
{
    public function form()
    {
        return view('auth.login');
    }


    public function login(Request $request)
{
    $request->validate([
        'correo' => 'required|email',
        'password' => 'required'
    ]);

    $usuario = Usuario::with('credencial')
        ->where('correo', $request->correo)
        ->first();

    // ❌ Usuario no existe
    if (!$usuario) {

        Acceso::create([
            'id_usuario' => null,
            'direccion_ip' => $request->ip(),
            'exito' => false
        ]);

        return back()->withErrors([
            'correo' => 'El usuario no existe'
        ]);
    }

    // ❌ Contraseña incorrecta
    if (!Hash::check($request->password, $usuario->credencial->contraseña_hash)) {

        Acceso::create([
            'id_usuario' => $usuario->id_usuario,
            'direccion_ip' => $request->ip(),
            'exito' => false
        ]);

        return back()->withErrors([
            'password' => 'Contraseña incorrecta'
        ]);
    }

    // ✅ Login correcto
    Acceso::create([
        'id_usuario' => $usuario->id_usuario,
        'direccion_ip' => $request->ip(),
        'exito' => true
    ]);

    Auth::login($usuario);

    return redirect('/dashboard');
}


    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
