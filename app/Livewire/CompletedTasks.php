<?php

namespace App\Livewire;

use App\Livewire\Forms\TaskForm;
use App\Models\Task;
use Carbon\Carbon;
use Livewire\Attributes\On;
use Livewire\Component;

class CompletedTasks extends Component
{
    public TaskForm $form;

    public $tasks;

    public function mount()
    {
        $this->getTasks();
    }

    #[On('taskCompleted'), On('taskReturned'), On('taskDeleted')]
    public function getTasks()
    {
        $tasks = Task::where('completed_at', '!=', null)
            ->orderBy('completed_at', 'desc')
            ->get();

        foreach ($tasks as $task) {
            $date = Carbon::parse($task->completed_at);
            $task->completed_at = $date->format('d/m/Y g:i A');
        }

        $this->tasks = $tasks;
    }

    public function returnTask(Task $task)
    {
        $task->completed_at = null;

        $this->form->setTask($task);

        $this->form->update();

        $this->mount();

        $this->dispatch('taskReturned');
    }

    public function deleteTask(Task $task)
    {
        $this->form->setTask($task);

        $this->form->delete();

        $this->mount();

        $this->dispatch('taskDeleted');
    }

    public function render()
    {
        return view('livewire.completed-tasks');
    }
}
