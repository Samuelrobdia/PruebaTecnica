<?php

namespace App\Livewire;

use App\Models\Group;
use App\Models\Task;
use Livewire\Attributes\On;
use Livewire\Component;

class TaskCreate extends Component
{

    public $task;
    public $frequency;
    public $group_id;
    public $start_date;
    public $end_date;
    public $groups;
    
    // Refrescar la vista cuando se crea un grupo nuevo
    #[On('GroupCreated')]
    public function refreshForm(){
        $this->render();
    }

    public function saveTask(){
        
        // Validar el formulario y los mandar los mensajes de error
        $this->validate([
            'task' => 'required|string|max:255',
            'frequency' => 'required|in:daily,weekly,multiple_days,monthly,yearly',
            'group_id' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ], [
            'task.required' => 'Please provide an task',
            'frequency.required' => 'Please provide a frequency',
            'group_id.required' => 'Please provide a Group',
            'start_date.required' => 'Please provide a start date',
            'end_date.required' => 'Please provide a end date',
        ]);
        
        
        // Creacion de la tarea
        $task = Task::create([
            'task' => $this->task,
            'frequency' => $this->frequency,
            'group_id' => $this->group_id,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
        ]);
        
        // Lanzar un #On para la vista
        $this->dispatch('taskCreated');
        // Resetear el formulario
        $this->reset();
        
    }
    
    public function render()
    {
        $this->groups = Group::pluck('name', 'id');

        return view('livewire.task-create', ['groups' => $this->groups]);
    }
}
