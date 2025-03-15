<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Módulo de {{ $module_name }}</title>
    @vite('resources/css/app.css') {{-- Tailwind CSS --}}
</head>

<body class="bg-gray-100">
    <div class="min-h-screen flex flex-col justify-center items-center">
        <div class="bg-white p-8 rounded shadow-md text-center">
            <h2 class="text-3xl font-bold mb-4">Módulo de {{ $module_name }}</h2>
            <p class="mb-6">Bienvenido al módulo de {{ $module_name }}.</p>
            <a href="{{ route('menu') }}"
                class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded transition duration-200">
                Regresar al Menú
            </a>
        </div>
    </div>
</body>

</html>
