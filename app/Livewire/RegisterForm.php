<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class RegisterForm extends Component
{

    public $name;
    public $email;
    public $password;

    public function register()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);
        
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);
        
        if($user){
            return redirect('/login')->with('success', 'Cuenta creada con exito.');
        }

        return redirect('/register')->with('error', 'Se ha producido un error.');
    }

    public function render()
    {
        return view('livewire.register-form');
    }
}
