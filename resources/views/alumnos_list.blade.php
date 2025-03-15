<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Alumnos</title>
    @vite('resources/css/app.css')
    <!-- Flowbite CSS (opcional si lo necesitas) -->
</head>

<body class="bg-gray-100">
    <div class="container mx-auto py-8">
        <h1 class="text-4xl font-bold mb-6 text-center">Lista de Alumnos</h1>

        <!-- Botón para abrir el modal -->
        <div class="mb-6 text-center">
            <button id="openModalBtn" data-modal-target="alumnoModal" data-modal-toggle="alumnoModal"
                class="bg-purple-500 hover:bg-purple-600 text-white font-semibold py-2 px-4 rounded transition duration-200">
                Agregar Nuevo Alumno
            </button>
        </div>

        <!-- Lista de alumnos -->
        <div class="bg-white shadow-md rounded p-6">
            @if ($alumnos->count())
                <ul id="alumnosList" class="divide-y divide-gray-200">
                    @foreach ($alumnos as $alumno)
                        <li class="py-4 flex flex-col md:flex-row justify-between items-start md:items-center">
                            <div>
                                <p class="text-xl font-medium text-gray-900">
                                    {{ $alumno->nombre }} {{ $alumno->apellido }}
                                </p>
                                <p class="text-sm text-gray-500">
                                    Matrícula: {{ $alumno->matricula }} | Email: {{ $alumno->email }}
                                </p>
                                <p class="text-sm text-gray-500">
                                    Fecha de Nacimiento:
                                    {{ \Carbon\Carbon::parse($alumno->fecha_nacimiento)->format('d/m/Y') }}
                                </p>
                            </div>
                            <div class="mt-2 md:mt-0">
                                <span class="text-xs text-gray-400">
                                    Registrado: {{ \Carbon\Carbon::parse($alumno->created_at)->format('d/m/Y H:i') }}
                                </span>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-center text-gray-500">No hay alumnos registrados.</p>
            @endif
        </div>

        <div class="mt-6 text-center">
            <a href="{{ route('menu') }}"
                class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded transition duration-200">
                Regresar al Menú
            </a>
        </div>
    </div>

    <!-- Modal de Agregar Nuevo Alumno -->
    <div id="alumnoModal" tabindex="-1" aria-hidden="true"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
        <div class="relative w-full max-w-2xl h-full md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Agregar Nuevo Alumno
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 rounded-lg p-1.5 ml-auto inline-flex items-center"
                        data-modal-toggle="alumnoModal">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Cerrar modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-6 space-y-6">
                    <form id="alumnoForm">
                        @csrf
                        <div class="mb-4">
                            <label for="matricula" class="block text-white">Matrícula</label>
                            <input type="text" id="matricula" name="matricula"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required />
                        </div>
                        <div class="mb-4">
                            <label for="nombre" class="block text-white">Nombre</label>
                            <input type="text" id="nombre" name="nombre"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required />
                        </div>
                        <div class="mb-4">
                            <label for="apellido" class="block text-white">Apellido</label>
                            <input type="text" id="apellido" name="apellido"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required />
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-white">Email</label>
                            <input type="email" id="email" name="email"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required />
                        </div>
                        <div class="mb-4">
                            <label for="fecha_nacimiento" class="block text-white">Fecha de Nacimiento</label>
                            <input type="date" id="fecha_nacimiento" name="fecha_nacimiento"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required />
                        </div>
                        <div class="flex justify-end">
                            <button type="submit"
                                class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded">
                                Guardar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    <!-- JavaScript para manejar el envío del formulario vía AJAX -->
    <script>
        document.getElementById("alumnoForm").addEventListener("submit", function(event) {
            event.preventDefault(); // Prevenir el envío normal del formulario

            const form = event.target;
            const formData = new FormData(form);

            fetch("{{ route('alumno_create') }}", {
                    method: "POST",
                    body: formData,
                    headers: {
                        "X-Requested-With": "XMLHttpRequest",
                    },
                })
                .then((response) => response.json())
                .then((data) => {
                    if (data.success) {
                        // Recargar la página para mostrar la lista actualizada y quitar el overlay
                        window.location.reload();
                    } else {
                        alert("Error al guardar el alumno: " + data.error);
                    }
                })
                .catch((error) => {
                    console.error("Error en fetch:", error);
                    alert("Ocurrió un error al enviar el formulario.");
                });
        });
    </script>
</body>

</html>
