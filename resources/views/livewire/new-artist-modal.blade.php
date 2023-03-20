@if ($submitted)
@if ($success)
<h1>success</h1>
@elseif ($failure)
<h1>failure</h1>
@else
<div class="flex items-center justify-center h-56 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700">
    <div role="status" class="flex flex-col items-center gap-4">
        <svg aria-hidden="true" class="w-8 h-8 mr-2 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor" />
            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill" />
        </svg>

        <span class="text-white font-bold">Loading...</span>
    </div>
</div>

@endif




@else

<x-modal form-action="save">
    <x-slot name="title">
        <div>Create new Artist</div>
    </x-slot>

    <x-slot name="content">
        <div>
            @if ($flushMessage)
            <div id="alert-3" class="flex p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Info</span>
                <div class="ml-3 text-sm font-medium">
                    {{ $flushMessage}}
                </div>
                <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-3" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>

            @endif

            <!-- Your Livewire component's HTML here -->
        </div>

        <div class="">
            <x-input-label for="name" :value="__('name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" wire:model="name" required autocomplete="username" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />

        </div>

        <div class="mt-4">
            <x-input-label for="country" :value="__('country')" />
            <x-text-input id="country" class="block mt-1 w-full" type="text" name="country" wire:model="country" required autocomplete="username" />
            <x-input-error :messages="$errors->get('country')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="date_of_birth" :value="__('date_of_birth')" />
            <x-text-input id="date_of_birth" class="block mt-1 w-full" type="date" name="date_of_birth" wire:model="date_of_birth" required autocomplete="username" />
            <x-input-error :messages="$errors->get('date_of_birth')" class="mt-2" />
        </div>
        <div class="mt-4 flex gap-5">
            @if ($cover)
            <img class="h-24 w-24" src="{{ $cover->temporaryUrl() }}" alt="">
            @endif
            <!-- <div class="h-24 w-24 ">
      </div> -->
            <div class="flex flex-col gap-5 ">
                <input type="file" name="cover" wire:model="cover" id="">
                <x-input-error :messages="$errors->get('cover')" class="mt-2" />
            </div>
        </div>
        <div wire:loading wire:target="cover">Uploading...</div>
    </x-slot>

    <x-slot name="buttons">
        <div class="mt-5 mx-auto">
            <button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" role="submit">Save</button>
        </div>
    </x-slot>



</x-modal>

@endif