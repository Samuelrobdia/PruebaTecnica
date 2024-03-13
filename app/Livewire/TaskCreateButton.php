<?php

namespace App\Livewire;

use Livewire\Component;

class TaskCreateButton extends Component
{
    public $isCreateFormTaskOpen = false;

    public function toggleCreateTask()
    {
        $this->isCreateFormTaskOpen = !$this->isCreateFormTaskOpen;
        // $this->emit('createFormToggled', $this->isCreateFormTaskOpen);
    }


    public function render()
    {
        return view('livewire.task-create-button', [
            'isCreateFormTaskOpen' => $this->isCreateFormTaskOpen,
        ]);
    }
}
