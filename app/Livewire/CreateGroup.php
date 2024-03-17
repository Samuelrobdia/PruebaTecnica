<?php

namespace App\Livewire;

use App\Models\Group;
use Livewire\Component;

class CreateGroup extends Component
{
    public $name;
    public $description;

    // Creacion de un grupo
    public function createGroup()
    {
 
        // Validar los datos introducidos
        $this->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ], [
            // Mensajes de error
            'name.required' => 'Please provide an name',
            'description.required' => 'Please provide a description',
        ]);
 
        // Creacion del grupo
        Group::create([
            'name' => $this->name,
            'description' => $this->description
        ]);

        // Evento #On para actualizar la vista
        $this->dispatch('GroupCreated');
        // Reseteamos el formulario
        $this->reset();
    }

    // Renderizado de la vista
    public function render()
    {
        return view('livewire.create-group');
    }
}
