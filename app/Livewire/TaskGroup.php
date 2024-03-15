<?php

namespace App\Livewire;

use App\Models\Group;
use App\Models\Task;
use Livewire\Attributes\On;
use Livewire\Component;
use Psy\TabCompletion\Matcher\FunctionsMatcher;

class TaskGroup extends Component
{

    public $groups;
    public $showCreateGroupForm = false;
    public $selectedGroupId;
    public $tasks;
    
    #[On('GroupCreated')]
    public function refreshGroupList()
    {
        $this->showCreateGroupForm = false;
        $this->render();

    }

    public function showTasks($group_id){
        $this->selectedGroupId = $group_id;
        
        $this->tasks = Task::where('group_id', $group_id)->get();
       
    }

    public function closeModal(){
        $this->selectedGroupId = null;
    }

    public function render()
    {
        $this->groups = Group::all();
        
        return view('livewire.task-group',['groups' => $this->groups]);
    }
}
