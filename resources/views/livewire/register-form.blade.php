<div class="min-h-screen flex items-center justify-center">
    <div class="max-w-md w-full bg-gray-300 p-8 rounded-lg">
      <h2 class="text-3xl font-bold text-black mb-4">Hello !</h2>
      <h3 class="text-regularred font-semibold text-xl mb-8">Sign Up</h3>
      
      <form wire:submit="register">
        @csrf
        <div class="mb-4">
            <label for="email" class="block text-black mb-2">Email</label>
            
            <input type="email"  wire:model="email" class="w-full px-4 py-2 rounded-md bg-gray-350 text-black" placeholder="Enter your email">
          </div>
        <div class="mb-4">
          <label for="email" class="block text-black mb-2">Name</label>
          <input type="text" wire:model="name" class="w-full px-4 py-2 rounded-md bg-gray-350 text-black" placeholder="Enter your name">
        </div>
        <div class="mb-6">
          <label for="password" class="block text-black mb-2">Password</label>
          <input type="password" wire:model="password" class="w-full px-4 py-2 rounded-md bg-gray-350 text-black" placeholder="Enter your password">
        </div>
        <button type="submit" class="w-full mt-0 p-2 rounded-md bg-regularred text-white font-bold text-center">Register</button>
      </form>
    </div>
</div>