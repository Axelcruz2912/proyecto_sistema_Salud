<x-layouts.app title="Crear usuario">

    <div class="min-h-screen bg-gradient-to-b from-slate-900 via-slate-950 to-black py-12">
        <div class="max-w-2xl mx-auto px-6">

            <div class="bg-slate-900 border border-slate-800 shadow-2xl rounded-2xl p-8">

                <h2 class="text-2xl font-bold text-white mb-6">
                    Crear usuario
                </h2>

                @if($errors->any())
                    <div class="bg-red-500/10 border border-red-500 text-red-400 px-4 py-3 rounded-lg mb-4">
                        Corrige los errores marcados abajo.
                    </div>
                @endif

                <form method="POST" action="/usuarios" class="space-y-5">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                        {{-- NOMBRE --}}
                        <div>
                            <label class="flex items-center gap-2 text-sm font-medium text-slate-400 mb-1">
                                Nombre
                                <span class="cursor-help flex items-center justify-center w-4 h-4 rounded-full bg-blue-500/20 text-blue-400 text-xs font-bold"
                                      title="Solo letras. Mínimo 2 caracteres.">
                                    ?
                                </span>
                            </label>
                            <input name="nombre"
                                   value="{{ old('nombre') }}"
                                   class="w-full bg-slate-800 border {{ $errors->has('nombre') ? 'border-red-500' : 'border-slate-700' }} text-white rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                                   placeholder="Nombre">
                            @error('nombre')
                                <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- APELLIDO PATERNO --}}
                        <div>
                            <label class="flex items-center gap-2 text-sm font-medium text-slate-400 mb-1">
                                Apellido paterno
                                <span class="cursor-help flex items-center justify-center w-4 h-4 rounded-full bg-blue-500/20 text-blue-400 text-xs font-bold"
                                      title="Obligatorio. Solo letras.">
                                    ?
                                </span>
                            </label>
                            <input name="apellido_p"
                                   value="{{ old('apellido_p') }}"
                                   class="w-full bg-slate-800 border {{ $errors->has('apellido_p') ? 'border-red-500' : 'border-slate-700' }} text-white rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                                   placeholder="Apellido paterno">
                            @error('apellido_p')
                                <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- APELLIDO MATERNO --}}
                        <div>
                            <label class="flex items-center gap-2 text-sm font-medium text-slate-400 mb-1">
                                Apellido materno
                                <span class="cursor-help flex items-center justify-center w-4 h-4 rounded-full bg-blue-500/20 text-blue-400 text-xs font-bold"
                                      title="Opcional. Solo letras.">
                                    ?
                                </span>
                            </label>
                            <input name="apellido_m"
                                   value="{{ old('apellido_m') }}"
                                   class="w-full bg-slate-800 border {{ $errors->has('apellido_m') ? 'border-red-500' : 'border-slate-700' }} text-white rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                                   placeholder="Apellido materno">
                            @error('apellido_m')
                                <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- CORREO --}}
                        <div>
                            <label class="flex items-center gap-2 text-sm font-medium text-slate-400 mb-1">
                                Correo
                                <span class="cursor-help flex items-center justify-center w-4 h-4 rounded-full bg-blue-500/20 text-blue-400 text-xs font-bold"
                                      title="Debe ser un correo válido. Ej: usuario@dominio.com">
                                    ?
                                </span>
                            </label>
                            <input name="correo" type="email"
                                   value="{{ old('correo') }}"
                                   class="w-full bg-slate-800 border {{ $errors->has('correo') ? 'border-red-500' : 'border-slate-700' }} text-white rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                                   placeholder="correo@ejemplo.com">
                            @error('correo')
                                <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- PASSWORD --}}
                        <div>
                            <label class="flex items-center gap-2 text-sm font-medium text-slate-400 mb-1">
                                Contraseña
                                <span class="cursor-help flex items-center justify-center w-4 h-4 rounded-full bg-blue-500/20 text-blue-400 text-xs font-bold"
                                      title="Mínimo 8 caracteres, una mayúscula y un número.">
                                    ?
                                </span>
                            </label>
                            <input name="password" type="password"
                                   class="w-full bg-slate-800 border {{ $errors->has('password') ? 'border-red-500' : 'border-slate-700' }} text-white rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                            @error('password')
                                <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- ROL --}}
                        <div>
                            <label class="flex items-center gap-2 text-sm font-medium text-slate-400 mb-1">
                                Rol
                                <span class="cursor-help flex items-center justify-center w-4 h-4 rounded-full bg-blue-500/20 text-blue-400 text-xs font-bold"
                                      title="Define los permisos del usuario en el sistema.">
                                    ?
                                </span>
                            </label>
                            <select name="id_rol"
                                    class="w-full bg-slate-800 border {{ $errors->has('id_rol') ? 'border-red-500' : 'border-slate-700' }} text-white rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                                <option value="">Selecciona un rol</option>
                                @foreach($roles as $rol)
                                    <option value="{{ $rol->id_rol }}"
                                        {{ old('id_rol') == $rol->id_rol ? 'selected' : '' }}>
                                        {{ $rol->nombre_rol }}
                                    </option>
                                @endforeach
                            </select>
                            @error('id_rol')
                                <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>

                    <div class="pt-4">
                        <button class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-lg transition">
                            Crear usuario
                        </button>
                    </div>

                </form>

                <div class="mt-6 border-t border-slate-800 pt-6 text-center space-y-3">

                    <a href="/login"
                       class="inline-flex items-center justify-center w-full
                              bg-slate-800 hover:bg-slate-700 text-white
                              font-medium py-2 rounded-lg transition">
                        ← Volver al login
                    </a>

                    <a href="/recuperar-cuenta"
                       class="block text-sm text-blue-400 hover:text-blue-300 transition">
                        ¿Olvidaste tu contraseña?
                    </a>

                </div>
            </div>

        </div>
    </div>

</x-layouts.app>
