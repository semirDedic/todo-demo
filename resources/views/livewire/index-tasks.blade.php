<div>
    <div>
        <h2 class="mb-2 text-lg font-semibold text-gray-900">Open tasks</h2>

        <div class="task-list">
            @forelse($tasks as $key => $task)
                <div x-data="{ open: false }" wire:key="task-{{ $task->id }}">

                    <div class="task" x-on:click="open = true">
                        <p class="text-base text-gray-900 hover:bg-blue-300 ease-in-out cursor-pointer">
                            <span class="task-number">{{ ++$key }}</span> -
                            {{ $task->description }}
                        </p>
                    </div>

                    <ul x-show.transition.in.duration.150ms="open" x-on:click.away="open = false"
                        class="flex p-0 max-w-md space-y-1 text-gray-500 list-insidetext-center justify-center list-none">

                        <li wire:click="completeTask({{ $task }})" x-on="open = false"
                            class="bg-white shadow rounded p-1 text-center mr-4 btn-completed"
                            aria-label="Complete task">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor"
                                class="w-6 h-6 hover:text-blue-500 transition duration-300 ease-in-out cursor-pointer">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                        </li>

                        <li wire:click="editTask({{ $task }})" x-on:click="open = false"
                            class="bg-white shadow rounded p-1 text-center mr-4 btn-update" aria-label="Edit task">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor"
                                class="w-6 h-6 hover:text-blue-500 transition duration-300 ease-in-out cursor-pointer">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                            </svg>
                            </i>
                        </li>

                        <li wire:click="deleteTask({{ $task->id }})"
                            wire:confirm="Are you sure you want to delete this task?" x-on:click="open = false"
                            class="bg-white shadow rounded p-1 text-center mr-4 btn-delete" aria-label="Delete task">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor"
                                class="w-6 h-6 hover:text-blue-500 transition duration-300 ease-in-out cursor-pointer">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                            </svg>
                        </li>
                    </ul>
                </div>
            @empty
                No tasks
            @endforelse
        </div>
    </div>
</div>
