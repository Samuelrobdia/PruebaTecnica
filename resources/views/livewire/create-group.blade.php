<div>
    <h2 class="text-2xl font-semibold mb-2">Create new Group</h2>

    <form wire:submit.prevent="createGroup">
        <div class="mb-4">
            <label class=" block text-gray-700 mb-2" for="name">Name:</label>
            <input wire:model="name" type="text" id="name" name="name" class="border-solid border-2 border-black w-full px-4 py-2 rounded-md bg-gray-300 text-gray-700">
        </div>
        
        <div class="mb-4">
            <label class="  text-gray-700 mb-2" for="description">Description:</label>
            <textarea wire:model="description" id="description" name="description" class="border-solid border-2 border-black block w-full px-4 py-2 rounded-md bg-gray-300 text-gray-700"></textarea>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="w-1/3 mt-0 p-2 rounded-md bg-regulargreen text-white font-bold text-center transition hover:scale-105">Create Group</button>
        </div>
    </form>
</div>
