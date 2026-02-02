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

        $usuario = Usuario::with(['credencial', 'rol'])
            ->where('correo', $request->correo)
            ->first();

        if (!$usuario) {
            Acceso::create([
                'id_usuario' => null,
                'direccion_ip' => $request->ip(),
                'exito' => false
            ]);

            return back()->withErrors([
                'correo' => 'El usuario no existe'
            ])->withInput();
        }

        if (!Hash::check($request->password, $usuario->credencial->contraseña_hash)) {
            Acceso::create([
                'id_usuario' => $usuario->id_usuario,
                'direccion_ip' => $request->ip(),
                'exito' => false
            ]);

            return back()->withErrors([
                'password' => 'Contraseña incorrecta'
            ])->withInput();
        }

        Acceso::create([
            'id_usuario' => $usuario->id_usuario,
            'direccion_ip' => $request->ip(),
            'exito' => true
        ]);

        Auth::login($usuario);
        $request->session()->regenerate();

        if ($usuario->rol->nombre_rol === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('usuario.dashboard');
    }


    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
