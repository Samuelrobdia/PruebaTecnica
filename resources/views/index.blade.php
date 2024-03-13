<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TODO</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @livewireStyles
    @vite('resources/css/app.css')
</head>
<body>
    <div class="flex">
        <div class="w-1/4">
            <livewire:task-group />
        </div>
        <div class="w-3/4">
            <header>
                <livewire:todo-header />
            </header>  
            {{-- <div class="mx-12">
                <hr class="border-b border-gray-400">
            </div> --}}
            <livewire:task-create />

            <livewire:task-list />
        </div>
    </div>
</body>
</html>
