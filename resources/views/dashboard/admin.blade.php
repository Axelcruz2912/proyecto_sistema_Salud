<x-layouts.app title="Dashboard Admin">

    <div class="min-h-screen bg-black text-white p-10 flex flex-col gap-6">

        <div>
            <h1 class="text-3xl font-bold mb-2">Panel Administrador</h1>
            <p class="text-slate-400">
                Bienvenido {{ auth()->user()->nombre }}
            </p>
        </div>

        {{-- BOTÓN CERRAR SESIÓN --}}
        <form method="POST" action="/logout" class="mt-6">
            @csrf
            <button
                type="submit"
                class="w-fit bg-red-600 hover:bg-red-700 text-white font-semibold px-6 py-2 rounded-lg transition flex items-center gap-2"
            >
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1m0-10V5" />
                </svg>
                Cerrar sesión
            </button>
        </form>

    </div>

</x-layouts.app>
