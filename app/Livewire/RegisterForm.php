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

        // Validar los datos introducidos
        $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ], [
            'name.required' => 'Please provide an name',
            'email.required' => 'Please provide an email',
            'email.email' => 'Please provide a valid email',
            'password.required' => 'Please provide a password',
            'password.min' => 'The password must be at least 6 characters',
        ]);
        
        // Creacion del usuario
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);
        
        // Comprobacion del usuario 
        if($user){
            return redirect('/')->with('success', 'Account created successfully.');
        }

        // Se ha producido un error de vuelta al registro
        return redirect('/register')->with('error', 'An error has occurred.');
    }

    public function render()
    {
        return view('livewire.register-form');
    }
}
