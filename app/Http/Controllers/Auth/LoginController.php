<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

        if (!$usuario || !Hash::check($request->password, $usuario->credencial->contraseña_hash)) {
            return back()->withErrors([
                'correo' => 'Credenciales incorrectas'
            ]);
        }

        Auth::login($usuario);

        return redirect('/dashboard');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
