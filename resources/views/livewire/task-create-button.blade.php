<div class="flex justify-center mt-10">
    <button wire:click="toggleCreateTask" wire:loading.attr="disabled" class="w-1/4 p-3 rounded-md bg-regularred text-white text-center transition hover:scale-105">
       {{ $isCreateFormTaskOpen ? 'Cancel' : 'Create Task' }}
    </button>    
   
</div>
  