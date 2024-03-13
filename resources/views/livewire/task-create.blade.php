<div class="p-10 mx-12 justify-center items-center">
    <form wire:submit.prevent="saveTask">
        @csrf
        <div class="mb-4">
            <label for="task" class="block text-black mb-2">Task</label>
            <input type="text" wire:model="task" class="w-full px-4 py-2 rounded-md bg-gray-350 text-black" placeholder="Enter Task">
           
        </div>
        <div class="mb-4">
            <label for="start_date" class="block text-black mb-2">Start Date</label>
            <input type="date" wire:model="start_date" class="w-full px-4 py-2 rounded-md bg-gray-350 text-black" placeholder="Enter date start">
            
        </div>
        <div class="mb-6">
            <label for="end_date" class="block text-black mb-2">End Date</label>
            <input type="date" wire:model="end_date" class="w-full px-4 py-2 rounded-md bg-gray-350 text-black" placeholder="Enter date end">
            
        </div>
        <div class="flex justify-center items-center"> 
            <button type="submit" class="w-1/3 mt-0 p-2 rounded-md bg-regulargreen text-white font-bold text-center transition hover:scale-105">Create Task</button>
        </div>
    </form>
</div>
