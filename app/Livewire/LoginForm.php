<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;

class LoginForm extends Component
{
    #[Validate('required|email', message: 'Please provide a email')]
    public $email;
    
    #[Validate('required|min:6', message: 'Please provide a password')]
    public $password;

    
    public function login(){
        
        //Valida los usuarios
        $validate = $this->validate();


        // Comprobar las credenciales validas
        if (Auth::attempt($validate)) {

            return redirect()->intended('/home');
        }

        return redirect()->intended('/login');
       
    }
    

    public function render()
    {
        return view('livewire.login-form');
    }

}
