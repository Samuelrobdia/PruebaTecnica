<div class="flex justify-between items-center p-4 m-4">
    <div class="flex items-center">
        <img src="{{ asset('svg/todo.svg') }}" alt="To-Do App" class="h-10">
        <span class="ml-2 text-3xl font-normal">To - Do App</span>
    </div>
    <div class="relative mr-20">
        <label for="dropdown-toggle" class="flex items-center gap-x-2 text-xl text-regularred ">
            @auth
                <img src="{{ asset('svg/user.svg') }}" alt="User" class="h-9">
                <span class="font-semibold">{{ Auth::guard('web')->user()->name }}</span>
                <button wire:click.prevent="logout" class="transition hover:scale-110">
                    <img src="{{ asset('svg/logout.svg') }}" alt="User" class="h-9">
                </button>
            @endauth
        </label>
    </div>
</div>
