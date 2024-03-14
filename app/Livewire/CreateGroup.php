<?php

namespace App\Livewire;

use App\Models\Group;
use Livewire\Component;

class CreateGroup extends Component
{
    public $name;
    public $description;

    public function createGroup()
    {
 
        $this->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);
 
        Group::create([
            'name' => $this->name,
            'description' => $this->description
        ]);

        $this->dispatch('GroupCreated');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.create-group');
    }
}
