<?php

namespace App\Livewire\Forms;

use App\Models\Task;
use Livewire\Attributes\Validate;
use Livewire\Form;

class TaskForm extends Form
{
    public ?Task $task;

    #[Validate('required|min:5|max:150|string')]
    public $description = '';

    #[Validate('required')]
    public $editing = false;

    public function setTask(Task $task)
    {
        $this->task = $task;

        $this->description = $task->description;

        $this->editing = $task->editing;
    }

    public function save()
    {
        $this->validate();

        Task::create($this->all());

        $this->reset();
    }

    public function update()
    {
        $this->task->update(
            $this->all()
        );

        $this->reset();
    }

    public function delete()
    {
        $this->task->delete();
    }
}
