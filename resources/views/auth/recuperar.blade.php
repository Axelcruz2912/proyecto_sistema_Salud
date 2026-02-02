<x-layouts.app title="Recuperar cuenta">

    <div class="min-h-screen flex items-center justify-center
                bg-gradient-to-b from-slate-900 via-slate-950 to-black">

        <div class="w-full max-w-md px-6">

            <div class="bg-slate-900 border border-slate-800
                        shadow-2xl rounded-2xl p-8">

                <h2 class="text-2xl font-bold text-white mb-2 text-center">
                    Recuperar cuenta
                </h2>

                <p class="text-slate-400 text-sm text-center mb-6">
                    Ingresa tu correo y te enviaremos instrucciones para recuperar tu acceso.
                </p>

                @if(session('success'))
                    <div class="bg-green-500/10 border border-green-500
                                text-green-400 px-4 py-3 rounded-lg mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="bg-red-500/10 border border-red-500
                                text-red-400 px-4 py-3 rounded-lg mb-4">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form method="POST" action="/recuperar" class="space-y-5">
                    @csrf

                    {{-- CORREO --}}
                    <div>
                        <label class="flex items-center gap-2
                                      text-sm font-medium text-slate-400 mb-1">
                            Correo
                            <span class="cursor-help flex items-center justify-center
                                         w-4 h-4 rounded-full bg-blue-500/20
                                         text-blue-400 text-xs font-bold"
                                  title="Debe ser el correo con el que te registraste">
                                ?
                            </span>
                        </label>

                        <input type="email" name="correo"
                               value="{{ old('correo') }}"
                               class="w-full bg-slate-800 border
                                      {{ $errors->has('correo') ? 'border-red-500' : 'border-slate-700' }}
                                      text-white rounded-lg px-3 py-2
                                      focus:ring-2 focus:ring-blue-500 focus:outline-none"
                               placeholder="correo@ejemplo.com">

                        @error('correo')
                            <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <button
                        class="w-full bg-blue-600 hover:bg-blue-700
                               text-white font-semibold py-3 rounded-lg transition">
                        Enviar
                    </button>
                </form>

                {{-- LINKS --}}
                <div class="mt-6 border-t border-slate-800 pt-6 text-center space-y-3">

                    <a href="/login"
                       class="inline-flex items-center justify-center w-full
                              bg-slate-800 hover:bg-slate-700
                              text-white font-medium py-2 rounded-lg transition">
                        ← Volver al login
                    </a>

                </div>

            </div>

        </div>

    </div>

</x-layouts.app>
