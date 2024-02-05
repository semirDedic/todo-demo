<div>
    <h2 class="mb-2 text-lg font-semibold text-gray-900">Create Task</h2>

    <form wire:submit="submit">

        <div class="grid gap-6 mb-6">
            <input maxlength="150" type="text" placeholder="Take out the trash..." wire:model.live="form.description"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
        </div>

        <div>
            @error('form.description')
                <span class="grid gap-6 mb-6 p-1 bg-red-400 text-red-700">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center ">
            Add
            <div wire:loading>
                <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white " xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                        stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor"
                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                    </path>
                </svg>
            </div>
        </button>
    </form>
</div>
