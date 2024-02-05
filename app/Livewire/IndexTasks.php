<?php

namespace App\Livewire;

use App\Livewire\Forms\TaskForm;
use App\Models\Task;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;

class IndexTasks extends Component
{
    public TaskForm $form;

    public $tasks;

    public function mount()
    {
        $this->getTasks();
    }

    #[On('taskCreated'), On('taskEdited'), On('taskCompleted'), On('taskDeletedIndex'), On('taskReturned')]
    public function getTasks()
    {
        $this->tasks = Task::where('completed_at', null)
            ->where('editing', "!=", true)
            ->get();
    }

    public function editTask(Task $task)
    {

        $editingTask = Task::where('editing', '=', true)
            ->first();

        if (!$editingTask) {

            // Set task for editing
            $task->editing = true;
            $this->form->setTask($task);
            $this->form->update();

            // has to rehydrate
            $this->mount();

            $this->dispatch('editingTask');
        }
    }

    public function completeTask(Task $task)
    {
        // Set as completed task
        $task->completed_at  = now()->toDateTimeString();

        $this->form->setTask($task);

        $this->form->update();

        // has to rehydrate
        $this->mount();

        $this->dispatch('taskCompleted');
    }

    public function deleteTask(Task $task)
    {
        $this->form->setTask($task);

        $this->form->delete();

        $this->mount();

        $this->dispatch('taskDeletedIndex');
    }

    #[Title('ToDo Demo')]
    public function render()
    {
        return view('livewire.index-tasks');
    }
}
