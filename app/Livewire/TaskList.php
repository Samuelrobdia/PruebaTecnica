<?php

namespace App\Livewire;

use App\Models\Task;
use Livewire\Component;
use Livewire\Attributes\On;

class TaskList extends Component
{
    
    // Se lanzara esta funcion cuando se active alguno de estos eventos
    #[On('DeleteTask')]
    #[On('taskCreated')]
    public function refreshTaskList()
    {
        $this->render();
    }

    // Completar una tarea
    public function completeTask($taskId)
    {
        $task = Task::findOrFail($taskId);
        $task->completed = true;
        $task->save();
    }

    // Renderizado del componente
    public function render()
    {

        // Esta variable contiene las tareas sin completar en orden de ultima fecha
        $tasks = Task::where('completed', false)->orderBy('end_date')->get();

        $groupedTasks = $tasks->groupBy(function ($task) {
            
            $dueDate = new \DateTime($task->end_date);
            $today = new \DateTime();

            // Calcula la diferencia de dias entre la fecha de vencimiento y la fecha actual.
            $diff = $dueDate->diff($today)->format('%a');
            
            // Se decide en que categoria agrupar la tarea basandose en la diferencia de dias.
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
