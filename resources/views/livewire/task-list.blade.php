<div>
    @forelse ($groupedTasks as $groupName => $tasks)
        <h2 class="ml-2 text-3xl font-normal">{{ $groupName }}</h2>
        <div class="mt-3 mx-10">
            <hr class="border-b border-gray-400">
        </div>
        <ul class="">
            @foreach ($tasks as $task)
            <li class="flex items-center justify-center  bg-gray-300 shadow-lg rounded-lg overflow-hidden m-4">
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2">{{ $task->task }}</div>
                    <p class="text-gray-700 text-base">
                        <span class="font-bold">Desde </span> {{ $task->start_date }} -  <span class="font-bold">Hasta </span> {{ $task->end_date }}
                    </p>
                    <div class="">
                        <span class="font-bold">Frequency </span> {{ $task->frequency }}
                    </div>
                </div>
                <div class="px-6 py-4">
                    <button wire:click="completeTask({{ $task->id }})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition hover:scale-105">
                        Completar tarea
                    </button>
                </div>
            </li>
            @endforeach
        </ul>
    @empty
        <div class="flex items-center justify-center">
            <p class="text-center text-gray-500">No hay tareas.</p>
        </div>
    @endforelse
</div>
