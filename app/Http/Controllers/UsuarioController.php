<?php
namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Rol;
use App\Models\Credencial;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function create()
    {
        $roles = Rol::all();
        return view('usuarios.create', compact('roles'));
    }

    public function store(Request $request)
{
    $request->validate([
        'nombre' => [
            'required',
            'string',
            'min:2',
            'max:50',
            'regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/'
        ],
        'apellido_p' => [
            'required',
            'string',
            'min:2',
            'max:50',
            'regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/'
        ],
        'apellido_m' => [
            'nullable',
            'string',
            'min:2',
            'max:50',
            'regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/'
        ],
        'correo' => [
            'required',
            'email:rfc,dns',
            'max:100',
            'unique:usuario,correo'
        ],
        'password' => [
            'required',
            'string',
            'min:8',
            'max:50',
            'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/'
        ],
        'id_rol' => [
            'required',
            'integer',
            'exists:rol,id_rol'
        ],
    ], [
        'nombre.required' => 'El nombre es obligatorio',
        'nombre.min' => 'El nombre debe tener al menos 2 caracteres',
        'nombre.regex' => 'El nombre solo puede contener letras y espacios',

        'apellido_p.required' => 'El apellido paterno es obligatorio',
        'apellido_p.min' => 'El apellido paterno debe tener al menos 2 caracteres',
        'apellido_p.regex' => 'El apellido paterno solo puede contener letras y espacios',

        'apellido_m.min' => 'El apellido materno debe tener al menos 2 caracteres',
        'apellido_m.regex' => 'El apellido materno solo puede contener letras y espacios',

        'correo.required' => 'El correo es obligatorio',
        'correo.email' => 'El correo no tiene un formato válido',
        'correo.unique' => 'Este correo ya está registrado',

        'password.required' => 'La contraseña es obligatoria',
        'password.min' => 'La contraseña debe tener mínimo 8 caracteres',
        'password.regex' => 'La contraseña debe incluir mayúsculas, minúsculas y números',

        'id_rol.required' => 'Debes seleccionar un rol',
        'id_rol.exists' => 'El rol seleccionado no es válido',
    ]);

    $u = Usuario::create([
        'nombre' => trim($request->nombre),
        'apellido_p' => trim($request->apellido_p),
        'apellido_m' => $request->apellido_m ? trim($request->apellido_m) : null,
        'correo' => strtolower($request->correo),
        'id_estado' => 1, // Activo
        'id_rol' => $request->id_rol
    ]);

    Credencial::create([
        'id_usuario' => $u->id_usuario,
        'contraseña_hash' => Hash::make($request->password)
    ]);

    return redirect('/dashboard')
        ->with('success', 'Usuario creado correctamente');
}

}
