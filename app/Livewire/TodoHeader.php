<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class TodoHeader extends Component
{
    // Renderizado del componente
    public function render()
    {
        return view('livewire.todo-header');
    }

    // Desloguear al usuario
    public function logout(){
    
        Auth::logout();
    
        return redirect('/')->with('success','See you later!');
    }
}
