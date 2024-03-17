<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;

class LoginForm extends Component
{
    // Validar los datos introducidos
    #[Validate('required|email', message: 'Please provide a email')]
    public $email;
    
    #[Validate('required|min:6', message: 'Please provide a password')]
    public $password;

    
    public function login(){
        
        // Valida los usuarios
        $this->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ], [
            'email.required' => 'Please provide an email',
            'email.email' => 'Please provide a valid email',
            'password.required' => 'Please provide a password',
            'password.min' => 'The password must be at least 6 characters',
        ]);

        // Comprobar las credenciales válidas
        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            return redirect()->intended('/home');
        } else {
            // Si no son validas se devuelve un error
            session()->flash('errors', 'These credentials do not match our records.');
        }
       
    }
    

    // Renderizado de la vista
    public function render()
    {
        return view('livewire.login-form');
    }

}
