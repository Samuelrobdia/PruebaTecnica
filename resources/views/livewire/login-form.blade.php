<div class="min-h-screen flex items-center justify-center">
    
        {{-- @if (session('error'))
            <h6 class="alert bg-red-600 text-white">{{ session('error') }}</h6>
        @endif

        @if (session('success'))
            <h6 class="alert bg-green-600 text-white">{{ session('success') }}</h6>
        @endif --}}
    
    <div class="max-w-md w-full bg-gray-300 p-8 rounded-lg">
      <h2 class="text-3xl font-bold text-black mb-4">Welcome !</h2>
      <h3 class="text-regularred font-semibold text-xl mb-8">Sign In</h3>
      <form  wire:submit="login" >
        @csrf
        <div class="mb-4">
          <label for="email" class="block text-black mb-2">Email</label>
          <input type="email" wire:model="email" class="w-full px-4 py-2 rounded-md bg-gray-350 text-black" placeholder="Enter your email">
          @error('email') <span>{{ $message }}</span> @enderror
        </div>
        <div class="mb-6">
          <label for="password" class="block text-black mb-2">Password</label>
          <input type="password" wire:model="password" class="w-full px-4 py-2 rounded-md bg-gray-350 text-black" placeholder="Enter your password">
          @error('password') <span>{{ $message }}</span> @enderror
        </div>
        <button type="submit" class="w-full mt-0 p-2 rounded-md bg-regularred text-white font-bold text-center">Login</button>
      </form>
      <p class="mt-4 text-black font-extralight flex items-center justify-center">Don't have an Account? <a href="/register" class="font-bold ml-1">Register</a></p>
    </div>
</div>