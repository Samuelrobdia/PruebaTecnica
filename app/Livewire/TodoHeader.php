<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class TodoHeader extends Component
{
    public function render()
    {
        return view('livewire.todo-header');
    }

    public function logout(){
    
        Auth::logout();
    
        return redirect('/')->with('success','See you later!');
    }
}
