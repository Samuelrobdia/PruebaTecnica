<div class="p-10 border border-gray-300 bg-gray-300">
<div>
   <div class="flex items-center justify-center  gap-x-2">
      <h2 class="text-3xl font-normal text-center">Task Group</h2>
      <button wire:click="$toggle('showCreateGroupForm')" class="inline-block">
         <img src="{{ asset('svg/buttonTaskGroup.svg') }}" alt="Create Group" class="h-auto w-8">
     </button>
   </div>
   <div class=" mt-3 mx-10">
      <hr class="border-b border-gray-400">
  </div>

   <ul >
       @foreach ($groups as $group)
           <li class="mt-3 p-2 bg-regulargreen rounded-lg">
               <strong>ID:</strong> {{ $group->id }} <br>
               <strong>Nombre:</strong> {{ $group->name }} <br>
               <strong>Descripción:</strong> {{ $group->description }}
           </li>
           <br>
       @endforeach
   </ul>

   @if($showCreateGroupForm)
      <livewire:create-group />
   @endif

</div>

</div>
