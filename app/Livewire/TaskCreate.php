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
    
    #[On('GroupCreated')]
    public function refreshForm(){
        $this->render();
    }

    public function saveTask(){
        
        $this->validate([
            'task' => 'required|string|max:255',
            'frequency' => 'required|in:daily,weekly,multiple_days,monthly,yearly',
            // 'group_id' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);
        
        
        $task = Task::create([
            'task' => $this->task,
            'frequency' => $this->frequency,
            'group_id' => $this->group_id,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
        ]);
        
        $this->dispatch('taskCreated');
        $this->reset();
        
    }
    
    public function render()
    {
        $this->groups = Group::pluck('name', 'id');

        return view('livewire.task-create', ['groups' => $this->groups]);
    }
}
