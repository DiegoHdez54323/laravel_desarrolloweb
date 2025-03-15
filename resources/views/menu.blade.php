<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Principal</title>
    @vite('resources/css/app.css') {{-- Tailwind CSS --}}
</head>

<body class="bg-gray-100">
    <div class="min-h-screen flex flex-col items-center pt-10">
        <h1 class="text-4xl font-bold mb-8">Menú Principal</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 w-full max-w-4xl px-4">
            <!-- Cada enlace apunta a la vista "module" pasando el nombre del módulo -->
            <a href="{{ route('module', ['module_name' => 'Archivo']) }}"
                class="block bg-blue-500 hover:bg-blue-600 text-white font-semibold py-4 px-6 rounded shadow text-center transition duration-200">
                Archivo
            </a>
            <a href="{{ route('module', ['module_name' => 'Catálogos']) }}"
                class="block bg-green-500 hover:bg-green-600 text-white font-semibold py-4 px-6 rounded shadow text-center transition duration-200">
                Catálogos
            </a>
            <a href="{{ route('module', ['module_name' => 'Procesos']) }}"
                class="block bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-4 px-6 rounded shadow text-center transition duration-200">
                Procesos
            </a>
            <a href="{{ route('module', ['module_name' => 'Reportes']) }}"
                class="block bg-red-500 hover:bg-red-600 text-white font-semibold py-4 px-6 rounded shadow text-center transition duration-200">
                Reportes
            </a>
            <a href="{{ route('alumnos_list') }}"
                class="block bg-purple-500 hover:bg-purple-600 text-white font-semibold py-4 px-6 rounded shadow text-center transition duration-200">
                Alumnos
            </a>
            <a href="{{ route('module', ['module_name' => 'Salir']) }}"
                class="block bg-gray-700 hover:bg-gray-800 text-white font-semibold py-4 px-6 rounded shadow text-center transition duration-200">
                Salir
            </a>
        </div>
    </div>
</body>

</html>
