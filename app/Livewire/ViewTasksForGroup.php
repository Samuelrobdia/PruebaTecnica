<?php

namespace App\Livewire;

use App\Models\Task;
use Livewire\Component;

class ViewTasksForGroup extends Component
{
    public $group;

    public function render()
    {
        $tasks = Task::where('group_id', $this->group->id)->get();

        return view('livewire.view-tasks-for-group', ['tasks' => $tasks]);
    }
}
