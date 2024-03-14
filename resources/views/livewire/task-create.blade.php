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

        <div class="mb-4 ">
            <label class="block text-gray-700">Frequency</label>
            <div class="mt-2">
                <input type="radio" wire:model="frequency" name="frequency" id="daily" value="daily" class="mr-2" required>
                <label for="daily" class="mr-4">Daily</label>

                <input type="radio" wire:model="frequency" name="frequency"  id="weekly" value="weekly" class="mr-2" required>
                <label for="weekly" class="mr-4">Weekly</label>
                
                <input type="radio" wire:model="frequency" name="frequency"  id="multiple_days" value="multiple_days" class="mr-2" required>
                <label for="monthly" class="mr-4">multiple_days</label>
                
                <input type="radio" wire:model="frequency" name="frequency" id="monthly" value="monthly" class="mr-2" required>
                <label for="monthly" class="mr-4">monthly</label>
                
                <input type="radio" wire:model="frequency" name="frequency" id="yearly" value="yearly" class="mr-2" required>
                <label for="monthly" class="mr-4">yearly</label>

            </div>
            
            <div class="mb-4 relative">
                <label class="block text-gray-700 mb-2">Group</label>
                <select name="group_id" wire:model="group_id" class="w-full appearance-none px-4 py-2 rounded-md bg-gray-350 text-black" required>
                    <option value="">Selecciona un grupo</option>
                    @foreach($groups as $id => $name)
                        <option value="{{ $id }}">{{ $name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="flex justify-center items-center"> 
            <button type="submit" class="w-1/3 mt-0 p-2 rounded-md bg-regulargreen text-white font-bold text-center transition hover:scale-105">Create Task</button>
        </div>
    </form>
</div>
