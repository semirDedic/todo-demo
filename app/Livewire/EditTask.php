<?php

namespace App\Livewire;

use App\Livewire\Forms\TaskForm;
use App\Models\Task;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;

class EditTask extends Component
{

    public TaskForm $form;

    #[On('editingTask')]
    public function mount()
    {
        $this->getTask();
    }

    public function submit()
    {
        $this->form->update();

        $this->dispatch('taskEdited');
    }

    public function getTask()
    {
        $foundTask = Task::where('editing', '=', true)
            ->first();

        if ($foundTask) {
            $foundTask->editing = false;
            $this->form->setTask($foundTask);
        }
    }

    #[Title('Edit task')]
    public function render()
    {
        return view('livewire.edit-task');
    }
}
