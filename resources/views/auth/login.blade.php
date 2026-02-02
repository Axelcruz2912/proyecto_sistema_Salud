<x-layouts.app title="Login">

    <div class="min-h-screen flex items-center justify-center bg-gradient-to-b from-slate-900 via-slate-950 to-black">

        <div class="w-full max-w-md px-6">

            <div class="bg-slate-900 border border-slate-800 shadow-2xl rounded-2xl p-8">

                <h2 class="text-2xl font-bold text-white mb-6 text-center">
                    Iniciar sesión
                </h2>

                @if($errors->any())
                    <div class="bg-red-500/10 border border-red-500 text-red-400 px-4 py-3 rounded-lg mb-4 text-sm">
                        Corrige los errores marcados abajo.
                    </div>
                @endif

                <form method="POST" action="/login" class="space-y-5">
                    @csrf

                    {{-- CORREO --}}
                    <div>
                        <label class="flex items-center gap-2 text-sm font-medium text-slate-400 mb-1">
                            Correo

                            <span class="relative group cursor-pointer text-slate-500">
                                ?
                                <span
                                    class="absolute left-1/2 -translate-x-1/2 bottom-full mb-2 hidden group-hover:block
                                           bg-black text-white text-xs rounded px-3 py-2 w-52 text-center shadow-lg">
                                    Ingresa el correo con el que te registraste.
                                </span>
                            </span>
                        </label>

                        <input type="email"
                               name="correo"
                               value="{{ old('correo') }}"
                               class="w-full bg-slate-800 border {{ $errors->has('correo') ? 'border-red-500' : 'border-slate-700' }}
                                      text-white rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                               placeholder="correo@ejemplo.com">

                        @error('correo')
                            <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- PASSWORD --}}
                    <div>
                        <label class="flex items-center gap-2 text-sm font-medium text-slate-400 mb-1">
                            Contraseña

                            <span class="relative group cursor-pointer text-slate-500">
                                ?
                                <span
                                    class="absolute left-1/2 -translate-x-1/2 bottom-full mb-2 hidden group-hover:block
                                           bg-black text-white text-xs rounded px-3 py-2 w-52 text-center shadow-lg">
                                    Debe coincidir con la contraseña registrada.
                                </span>
                            </span>
                        </label>

                        <input type="password"
                               name="password"
                               class="w-full bg-slate-800 border {{ $errors->has('password') ? 'border-red-500' : 'border-slate-700' }}
                                      text-white rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">

                        @error('password')
                            <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <button
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-lg transition">
                        Ingresar
                    </button>

                </form>

                {{-- LINKS --}}
                <div class="mt-6 text-center space-y-2">

                    <a href="/recuperar-cuenta"
                       class="block text-sm text-blue-400 hover:text-blue-300 transition">
                        ¿Olvidaste tu contraseña?
                    </a>

                    <a href="/usuarios/create"
                       class="block text-sm text-slate-400 hover:text-white transition">
                        Crear una cuenta nueva
                    </a>

                </div>

            </div>

        </div>

    </div>

</x-layouts.app>
