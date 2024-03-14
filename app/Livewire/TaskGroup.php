<?php

namespace App\Livewire;

use App\Models\Group;
use Livewire\Attributes\On;
use Livewire\Component;

class TaskGroup extends Component
{

    public $groups;
    public $showCreateGroupForm = false;

    #[On('GroupCreated')]
    public function refreshGroupList()
    {
        $this->showCreateGroupForm = false;
        $this->render();

    }

    public function render()
    {
        $this->groups = Group::all();
        
        return view('livewire.task-group',['groups' => $this->groups]);
    }
}
