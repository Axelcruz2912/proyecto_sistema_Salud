<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Sistema de Salud' }}</title>

    @vite('resources/css/app.css')
</head>
<body class="bg-slate-100">

    {{ $slot }}

</body>
</html>
