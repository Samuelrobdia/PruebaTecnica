<div>
    <h2 class="text-2xl font-semibold mb-2">Create new Group</h2>

    <form wire:submit.prevent="createGroup">
        <div class="mb-4">
            <label class=" block text-gray-700 mb-2" for="name">Name:</label>
            <input wire:model="name" type="text" id="name" name="name" class="border-solid border-2 border-black w-full px-4 py-2 rounded-md bg-gray-300 text-gray-700">
            @error('name') <div class="mt-2"> <span class="mt-1 rounded-md bg-red-200 px-2 py-1 text-xs font-medium text-red-700 ring-1 ring-inset ring-red-700/10">{{ $message }}</span> </div>@enderror

        </div>
        
        <div class="mb-4">
            <label class="  text-gray-700 mb-2" for="description">Description:</label>
            <textarea wire:model="description" id="description" name="description" class="border-solid border-2 border-black block w-full px-4 py-2 rounded-md bg-gray-300 text-gray-700"></textarea>
            @error('description') <div class="mt-2"> <span class="mt-1 rounded-md bg-red-200 px-2 py-1 text-xs font-medium text-red-700 ring-1 ring-inset ring-red-700/10">{{ $message }}</span> </div>@enderror

        </div>
        <div class="flex justify-end">
            <button type="submit" class="w-1/3 mt-0 p-2 rounded-md bg-regulargreen text-white font-bold text-center transition hover:scale-105">Create Group</button>
        </div>
    </form>
</div>
