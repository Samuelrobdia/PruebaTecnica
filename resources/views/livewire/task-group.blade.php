
<div class="p-10 border border-gray-300 bg-gray-200 ">
<div>
   <div class="flex items-center justify-center gap-x-2">
      <h2 class="text-3xl font-normal text-center">Task Group</h2>
      <button class="transition hover:scale-110" wire:click="$toggle('showCreateGroupForm')" class="">
         <img src="{{ asset('svg/buttonTaskGroup.svg') }}" alt="Create Group" class="mt-2">
     </button>
   </div>
   <div class=" mt-3 mx-10">
      <hr class="border-b border-gray-400 ">
  </div>

     @if($showCreateGroupForm)
        <livewire:create-group />
     @endif

   <ul >
       @forelse ($groups as $group)
           <li class="relative block mt-3 mb-6 p-3 bg-gray-400 rounded-lg shadow-lg">                
               <p class="text-xl font-bold">{{ $group->name }} </p> 
               <hr class="border-b border-white mt-2">
               <p class="mt-2"> {{ $group->description }}</p>
               <div class="mt-3 flex justify-end items-end">
                  <button wire:click="showTasks({{ $group->id }})" class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded transition hover:scale-105 ">Show Task </button>
               </div>
           </li>
        @empty
        <li class="relative mt-3 mb-6 p-3 bg-gray-400 rounded-lg shadow-lg flex justify-center items-center">
            No groups
        </li>
       @endforelse
   </ul>

</div>

@if($selectedGroupId)
<div class="fixed z-10 inset-0 overflow-y-auto"  aria-labelledby="modal-title" role="dialog" aria-modal="true">
   <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
       <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true" wire:click="closeModal"></div>
       <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true"></span>
       <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-3xl sm:w-full">
           <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
               <h3 class="text-2xl font-medium leading-6 text-gray-900" id="modal-title">Group {{ $selectedGroupId }}</h3>
               <div class="grid grid-cols-3 ">
                   @forelse ($tasks as $task)
                      <li class="flex items-start bg-gray-300 shadow-lg rounded-lg overflow-hidden m-4">
                          <div class="px-6 py-4">
                              <div class="font-bold text-sm mb-2">{{ $task->task }}</div>
                              <p class="text-gray-700 text-xs mb-3 flex justify-center items-center">
                                  {{ $task->start_date }} <img src="{{ asset('svg/arrow.svg') }}" class="h-4 w-4" alt="Icono SVG"> {{ $task->end_date }}
                              </p>
                              <span class="inline-flex items-center rounded-md bg-indigo-200 px-2 py-1 text-xs font-medium text-indigo-700 ring-1 ring-inset ring-indigo-700/10">{{ $task->frequency }}</span>
                              @if ($task->completed)
                                 <span class="mt-1 inline-flex items-center rounded-md bg-green-200 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-indigo-700/10">Completed</span>
                              @else
                                 <span class="mt-1 inline-flex items-center rounded-md bg-red-200 px-2 py-1 text-xs font-medium text-red-700 ring-1 ring-inset ring-red-700/10">No Completed</span>
                              @endif

                              <div class="flex justify-center items-center mt-2">
                                  <button wire:click="deleteTask({{ $task->id }})" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm bg-red-400 text-base font-bold text-white hover:bg-red-700 transition hover:scale-105 ">
                                    delete
                                  </button>
                              </div>
                          </div>
                      </li>
                    @empty
                    <div class="flex flex-col items-center justify-end h-full m-4">
                        <p class="text-center text-xl font-normal">No tasks in this group</p>
                        <button wire:click="deleteGroup({{$selectedGroupId}})" class="mt-4 inline-flex justify-center rounded-md border border-transparent shadow-sm bg-red-400 text-base font-bold text-white hover:bg-red-700 transition hover:scale-105 px-4 py-2">
                            Delete Group
                        </button>
                    </div>
                   @endforelse
              </div>

            </div>
           <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
               <button wire:click="closeModal" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-purple-500 hover:bg-purple-700 text-base font-bold text-white transition hover:scale-105 sm:ml-3 sm:w-auto sm:text-sm">
                  Close
               </button>
           </div>
       </div>
   </div>
</div>

@endif
</div>
