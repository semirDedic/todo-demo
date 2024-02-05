<div>
    <div>
        <h2 class="mb-2 text-lg font-semibold text-gray-900">Completed Tasks</h2>

        <p class="card-separator"></p>

        <div class="task-list">
            @foreach ($tasks as $key => $task)
                <div x-data="{ open: false }" wire:key="task-{{ $task->id }}">

                    <div x-on:click="open = true" class="task hover:bg-blue-300 ease-in-out cursor-pointer ">
                        <span class="task-completed-icon"><i class="fas fa-check"></i></span> - {{ $task->description }}
                        <span class="task-completed-date">(Finished at: {{ $task->completed_at }})</span>
                    </div>

                    <ul x-show.transition.in.duration.150ms="open" x-on:click.away="open = false"
                        class="flex p-0 max-w-md space-y-1 text-gray-500 list-none list-insidetext-center justify-center">

                        <li wire:click="returnTask({{ $task }})" x-on:click="open = false"
                            class="bg-white shadow rounded p-1 text-center mr-4 task-buttons" aria-label="Return task">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor"
                                class="w-6 h-6 hover:text-blue-500 transition duration-300 ease-in-out cursor-pointer">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m11.25 9-3 3m0 0 3 3m-3-3h7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                        </li>

                        <li wire:click="deleteTask({{ $task }})"
                            wire:confirm="Are you sure you want to delete this task?" x-on:click="open = false"
                            class="bg-white shadow rounded p-1 text-center mr-4 task-buttons" aria-label="Delete task">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor"
                                class="w-6 h-6 hover:text-blue-500 transition duration-300 ease-in-out cursor-pointer">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                            </svg>
                        </li>

                    </ul>
                </div>
            @endforeach
        </div>
    </div>
</div>
