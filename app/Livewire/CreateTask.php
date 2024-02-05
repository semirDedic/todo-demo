<?php

namespace App\Livewire;

use App\Livewire\Forms\TaskForm;
use Livewire\Attributes\Title;
use Livewire\Component;

class CreateTask extends Component
{
    public TaskForm $form;

    public function submit()
    {
        $this->form->save();

        $this->dispatch('taskCreated');
    }

    #[Title('Create task')] 
    public function render()
    {
        return view('livewire.create-task');
    }
}
