<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Api Rest - Posgrado</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&family=Varela+Round&display=swap"
        rel="stylesheet">

    @vite('resources/css/app.css')

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-50 dark:bg-slate-900">
    <div class="w-4/5 m-auto mb-10">
        <h1 class="text-center text-5xl mt-10 p-5 text-blue-900 dark:text-white" style="font-weight: 800">API REST -
            POSGRADO</h1>
        <hr>
        <h3 class="font-bold text-center p-5 text-3xl text-zinc-800 dark:text-white">Endpoints</h3>
        <div class="grid grid-cols-2 gap-5">
            {{-- Api Departamentos --}}
            <div
                class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-slate-800 dark:border-slate-700">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Departamento</h5>
                <ul
                    class="w-full text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">GET -
                        /api/departamento</li>
                    <li class="py-2 px-4 w-full border-b border-gray-200 dark:border-gray-600">GET -
                        /api/departamento/{id}</li>
                </ul>
            </div>
            {{-- Api Provincipias --}}
            <div
                class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-slate-800 dark:border-slate-700">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Provincia</h5>
                <ul
                    class="w-full text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">GET -
                        /api/provincia</li>
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">GET -
                        /api/provincia/{id}</li>
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">GET -
                        /api/provincia/departamento/{id}</li>
                </ul>
            </div>
            {{-- Api Distritos --}}
            <div
                class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-slate-800 dark:border-slate-700">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Distrito</h5>
                <ul
                    class="w-full text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">GET -
                        /api/distrito</li>
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">GET -
                        /api/distrito/{id}</li>
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">GET -
                        /api/distrito/provincia/{id}</li>
                </ul>
            </div>
            {{-- Api Universidades --}}
            <div
                class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-slate-800 dark:border-slate-700">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Universidad</h5>
                <ul
                    class="w-full text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">GET -
                        /api/universidad</li>
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">GET -
                        /api/universidad/{id}</li>
                </ul>
            </div>
            {{-- Api Personas --}}
            <div
                class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-slate-800 dark:border-slate-700">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Persona</h5>
                <ul
                    class="w-full text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">GET -
                        /api/persona</li>
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">GET -
                        /api/persona/{id}</li>
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">GET -
                        /api/persona/documento/{documento}</li>
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">POST -
                        /api/persona</li>
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">PUT -
                        /api/persona/{id}</li>
                </ul>
            </div>
            {{-- Api Inscripcion --}}
            <div
                class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-slate-800 dark:border-slate-700">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Inscripcion</h5>
                <ul
                    class="w-full text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">GET -
                        /api/inscripcion</li>
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">GET -
                        /api/inscripcion/{id}</li>
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">POST -
                        /api/inscripcion</li>
                </ul>
            </div>
            {{-- Api Pagos --}}
            <div
                class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-slate-800 dark:border-slate-700">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Pago</h5>
                <ul
                    class="w-full text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">GET -
                        /api/pago</li>
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">GET -
                        /api/pago/{id}</li>
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">POST -
                        /api/pago</li>
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">PUT -
                        /api/pago/{id}</li>
                </ul>
            </div>
            {{-- Api Detalle Pago --}}
            <div
                class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-slate-800 dark:border-slate-700">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Detalle Pago</h5>
                <ul
                    class="w-full text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">GET -
                        /api/detalle-pago</li>
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">GET -
                        /api/detalle-pago/{id}</li>
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">GET -
                        /api/detalle-pago/pago/{id}</li>
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">POST -
                        /api/detalle-pago</li>
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">PUT -
                        /api/detalle-pago/{id}</li>
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">PUT -
                        /api/detalle-pago/desacticate/{id}</li>
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">PUT -
                        /api/detalle-pago/activate/{id}</li>
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">PUT -
                        /api/detalle-pago/pago/{id}</li>
                </ul>
            </div>
            {{-- Api Expediente --}}
            <div
                class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-slate-800 dark:border-slate-700">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Expediente</h5>
                <ul
                    class="w-full text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">GET -
                        /api/expediente</li>
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">GET -
                        /api/expediente/{id}</li>
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">POST -
                        /api/expediente</li>
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">PUT -
                        /api/expediente/{id}</li>
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">PUT -
                        /api/expediente/desacticate/{id}</li>
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">PUT -
                        /api/expediente/activate/{id}</li>
                </ul>
            </div>
            {{-- Api Detalle Expediente --}}
            <div
                class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-slate-800 dark:border-slate-700">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Detalle Expediente</h5>
                <ul
                    class="w-full text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">GET -
                        /api/detalle-expediente</li>
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">GET -
                        /api/detalle-expediente/{id}</li>
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">GET -
                        /api/detalle-expediente/expediente/{id}</li>
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">POST -
                        /api/detalle-expediente</li>
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">PUT -
                        /api/detalle-expediente/{id}</li>
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">PUT -
                        /api/detalle-expediente/desacticate/{id}</li>
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">PUT -
                        /api/detalle-expediente/activate/{id}</li>
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">PUT -
                        /api/detalle-expediente/expediente/{id}</li>
                </ul>
            </div>
            {{-- Api Plan --}}
            <div
                class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-slate-800 dark:border-slate-700">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Plan</h5>
                <ul
                    class="w-full text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">GET -
                        /api/plan</li>
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">GET -
                        /api/plan/{id}</li>
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">POST -
                        /api/plan</li>
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">PUT -
                        /api/plan/{id}</li>
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">PUT -
                        /api/plan/desacticate/{id}</li>
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">PUT -
                        /api/plan/activate/{id}</li>
                </ul>
            </div>
            {{-- Api Sede --}}
            <div
                class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-slate-800 dark:border-slate-700">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Sede</h5>
                <ul
                    class="w-full text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">GET -
                        /api/sede</li>
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">GET -
                        /api/sede/{id}</li>
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">GET -
                        /api/sede/plan/{plan}</li>
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">POST -
                        /api/sede</li>
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">PUT -
                        /api/sede/{id}</li>
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">PUT -
                        /api/sede/desacticate/{id}</li>
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">PUT -
                        /api/sede/activate/{id}</li>
                </ul>
            </div>
            {{-- Api Programa --}}
            <div
                class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-slate-800 dark:border-slate-700">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Programa</h5>
                <ul
                    class="w-full text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">GET -
                        /api/programa</li>
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">GET -
                        /api/programa/{id}</li>
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">GET -
                        /api/programa/sede/{sede}</li>
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">POST -
                        /api/programa</li>
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">PUT -
                        /api/programa/{id}</li>
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">PUT -
                        /api/programa/desacticate/{id}</li>
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">PUT -
                        /api/programa/activate/{id}</li>
                </ul>
            </div>
            {{-- Api Facultad --}}
            <div
                class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-slate-800 dark:border-slate-700">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Facultad</h5>
                <ul
                    class="w-full text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">GET -
                        /api/facultad</li>
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">GET -
                        /api/facultad/{id}</li>
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">POST -
                        /api/facultad</li>
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">PUT -
                        /api/facultad/{id}</li>
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">PUT -
                        /api/facultad/desacticate/{id}</li>
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">PUT -
                        /api/facultad/activate/{id}</li>
                </ul>
            </div>
            {{-- Api Subprograma --}}
            <div
                class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-slate-800 dark:border-slate-700">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Subprograma</h5>
                <ul
                    class="w-full text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">GET -
                        /api/subprograma</li>
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">GET -
                        /api/subprograma/{id}</li>
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">GET -
                        /api/subprograma/programa/{programa}</li>
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">GET -
                            /api/subprograma/facultad/{facultad}</li>
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">POST -
                        /api/subprograma</li>
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">PUT -
                        /api/subprograma/{id}</li>
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">PUT -
                        /api/subprograma/desacticate/{id}</li>
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">PUT -
                        /api/subprograma/activate/{id}</li>
                </ul>
            </div>
            {{-- Api Mencion --}}
            <div
                class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-slate-800 dark:border-slate-700">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Mencion</h5>
                <ul
                    class="w-full text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">GET -
                        /api/mencion</li>
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">GET -
                        /api/mencion/{id}</li>
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">GET -
                        /api/mencion/subprograma/{subprograma}</li>
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">POST -
                        /api/mencion</li>
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">PUT -
                        /api/mencion/{id}</li>
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">PUT -
                        /api/mencion/desacticate/{id}</li>
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">PUT -
                        /api/mencion/activate/{id}</li>
                </ul>
            </div>
            {{-- Api Enumerado --}}
            <div
                class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-slate-800 dark:border-slate-700">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Enumerado</h5>
                <ul
                    class="w-full text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">GET -
                        /api/enumerado</li>
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">GET -
                        /api/enumerado/{id}</li>
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">POST -
                        /api/enumerado</li>
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">PUT -
                        /api/enumerado/{id}</li>
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">PUT -
                        /api/enumerado/desacticate/{id}</li>
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">PUT -
                        /api/enumerado/activate/{id}</li>
                </ul>
            </div>
            {{-- Api Enumerado Data --}}
            <div
                class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-slate-800 dark:border-slate-700">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Enumerado Data</h5>
                <ul
                    class="w-full text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">GET -
                        /api/enumerado-data</li>
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">GET -
                        /api/enumerado-data/{id}</li>
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">GET -
                        /api/enumerado-data/enumerado/{enumerado}</li>
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">POST -
                        /api/enumerado-data</li>
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">PUT -
                        /api/enumerado-data/{id}</li>
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">PUT -
                        /api/enumerado-data/desacticate/{id}</li>
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">PUT -
                        /api/enumerado-data/activate/{id}</li>
                </ul>
            </div>
            {{-- Api Admision Duracion --}}
            <div
                class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-slate-800 dark:border-slate-700">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Admision Duracion</h5>
                <ul
                    class="w-full text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">GET -
                        /api/admision-duracion</li>
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">GET -
                        /api/admision-duracion/{id}</li>
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">POST -
                        /api/admision-duracion</li>
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">PUT -
                        /api/admision-duracion/{id}</li>
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">PUT -
                        /api/admision-duracion/desacticate/{id}</li>
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">PUT -
                        /api/admision-duracion/activate/{id}</li>
                </ul>
            </div>
            {{-- Api Usuario Inscripcion --}}
            <div
                class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-slate-800 dark:border-slate-700">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Usuario Inscripcion</h5>
                <ul
                    class="w-full text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">GET -
                        /api/usuario-inscripcion</li>
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">GET -
                        /api/usuario-inscripcion/{id}</li>
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">GET -
                        /api/usuario-inscripcion/inscripcion/{inscripcion}</li>
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">POST -
                        /api/usuario-inscripcion</li>
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">PUT -
                        /api/usuario-inscripcion/{id}</li>
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">PUT -
                        /api/usuario-inscripcion/desacticate/{id}</li>
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">PUT -
                        /api/usuario-inscripcion/activate/{id}</li>
                </ul>
            </div>
        </div>
    </div>
</body>

</html>
