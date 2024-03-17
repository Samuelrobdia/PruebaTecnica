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
    

    // Se lanzara esta funcion cuando se active alguno de estos eventos
    #[On('DeleteGroup')]
    #[On('DeleteTask')]
    #[On('GroupCreated')]
    public function refreshGroupList()
    {
        $this->showCreateGroupForm = false;
        $this->render();

    }

    // Enseñar las tareas por cada grupo
    public function showTasks($group_id){
        $this->selectedGroupId = $group_id;
        
        $this->tasks = Task::where('group_id', $group_id)->get();
       
    }

    // Eliminar un grupo
    public function deleteGroup($group_id){

        $group = Group::findOrFail($group_id);
        $group->delete();
        $this->dispatch('DeleteGroup');
        $this->closeModal();
        
    }

    // Eliminar una tarea
    public function deleteTask($taskId){
        
        $task = Task::findOrFail($taskId);
        $task->delete();
        $this->dispatch('DeleteTask');
    }

    // Cerrar el modal donde salen las tareas de cada grupo
    public function closeModal(){
        $this->selectedGroupId = null;
    }

    // Renderizar el componente
    public function render()
    {
        $this->groups = Group::all();
        
        return view('livewire.task-group',['groups' => $this->groups]);
    }
}
