<div class="flex justify-between items-center p-4 m-4 ">
    <div class="flex items-center">
        <img src="{{ asset('svg/todo.svg') }}" alt="To-Do App" class="h-10">
        <span class="ml-2 text-3xl font-normal">To - Do App</span>
    </div>
    <div class="flex items-center">
        @auth
            <img src="{{ asset('svg/user.svg') }}" alt="User" class="h-9">
            <span class="ml-2 text-xl text-regularred">{{ Auth::guard('web')->user()->name }}</span>
        @endauth
    </div>
</div>


