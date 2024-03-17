<?php

namespace App\Livewire;

use App\Models\Task;
use Livewire\Component;
use Livewire\Attributes\On;

class TaskList extends Component
{
    
    #[On('DeleteTask')]
    #[On('taskCreated')]
    public function refreshTaskList()
    {
        $this->render();
    }

    public function completeTask($taskId)
    {
        $task = Task::findOrFail($taskId);
        $task->completed = true;
        $task->save();
    }

    public function render()
    {

        $tasks = Task::where('completed', false)->orderBy('end_date')->get();

        $groupedTasks = $tasks->groupBy(function ($task) {
            
            $dueDate = new \DateTime($task->end_date);
            $today = new \DateTime();
            $diff = $dueDate->diff($today)->format('%a');
            
            if ($diff == 0) {
                return 'Task Today';
            } elseif ($diff == 1) {
                return 'Task Tomorrow';
            } elseif ($diff <= 7) {
                return 'Task Next Week';
            } elseif ($diff <= 30) {
                return 'Task Next';
            } else {
                return 'Task Next';
            }
        });

        return view('livewire.task-list', compact('groupedTasks'));
    }
}
