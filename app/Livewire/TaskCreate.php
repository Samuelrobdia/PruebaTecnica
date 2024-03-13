<?php

namespace App\Livewire;

use App\Models\Task;
use Livewire\Component;

class TaskCreate extends Component
{

    public $task;
    public $start_date;
    public $end_date;
    
    public function saveTask(){
        
        $this->validate([
            'task' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);
        
        $task = Task::create([
            'task' => $this->task,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
        ]);

        $this->dispatch('taskCreated');
        $this->reset();

    }

    public function render()
    {
        return view('livewire.task-create');
    }
}
