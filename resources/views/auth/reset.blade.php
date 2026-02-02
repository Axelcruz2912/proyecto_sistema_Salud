<x-layouts.app title="Restablecer contraseña">

    <div class="min-h-screen flex items-center justify-center
                bg-gradient-to-b from-slate-900 via-slate-950 to-black">

        <div class="w-full max-w-md px-6">

            <div class="bg-slate-900 border border-slate-800
                        shadow-2xl rounded-2xl p-8">

                <h2 class="text-2xl font-bold text-white mb-2 text-center">
                    Nueva contraseña
                </h2>

                <p class="text-slate-400 text-sm text-center mb-6">
                    Ingresa una nueva contraseña para tu cuenta.
                </p>

                @if($errors->any())
                    <div class="bg-red-500/10 border border-red-500
                                text-red-400 px-4 py-3 rounded-lg mb-4">
                        Corrige los errores marcados abajo.
                    </div>
                @endif

                <form method="POST" action="/reset" class="space-y-5">
                    @csrf

                    <input type="hidden" name="token" value="{{ $token }}">

                    {{-- PASSWORD --}}
                    <div>
                        <label class="flex items-center gap-2
                                      text-sm font-medium text-slate-400 mb-1">
                            Nueva contraseña
                            <span class="cursor-help flex items-center justify-center
                                         w-4 h-4 rounded-full bg-blue-500/20
                                         text-blue-400 text-xs font-bold"
                                  title="Mínimo 8 caracteres, una mayúscula y un número">
                                ?
                            </span>
                        </label>

                        <input type="password" name="password"
                               class="w-full bg-slate-800 border
                                      {{ $errors->has('password') ? 'border-red-500' : 'border-slate-700' }}
                                      text-white rounded-lg px-3 py-2
                                      focus:ring-2 focus:ring-blue-500 focus:outline-none">

                        @error('password')
                            <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- CONFIRM PASSWORD --}}
                    <div>
                        <label class="flex items-center gap-2
                                      text-sm font-medium text-slate-400 mb-1">
                            Confirmar contraseña
                            <span class="cursor-help flex items-center justify-center
                                         w-4 h-4 rounded-full bg-blue-500/20
                                         text-blue-400 text-xs font-bold"
                                  title="Debe coincidir con la nueva contraseña">
                                ?
                            </span>
                        </label>

                        <input type="password" name="password_confirmation"
                               class="w-full bg-slate-800 border
                                      {{ $errors->has('password_confirmation') ? 'border-red-500' : 'border-slate-700' }}
                                      text-white rounded-lg px-3 py-2
                                      focus:ring-2 focus:ring-blue-500 focus:outline-none">

                        @error('password_confirmation')
                            <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <button
                        class="w-full bg-blue-600 hover:bg-blue-700
                               text-white font-semibold py-3 rounded-lg transition">
                        Cambiar contraseña
                    </button>
                </form>

                {{-- VOLVER --}}
                <div class="mt-6 border-t border-slate-800 pt-6 text-center">
                    <a href="/recuperar"
                       class="inline-flex items-center justify-center w-full
                              bg-slate-800 hover:bg-slate-700
                              text-white font-medium py-2 rounded-lg transition">
                        ← Volver a recuperar cuenta
                    </a>
                </div>

            </div>

        </div>

    </div>

</x-layouts.app>
