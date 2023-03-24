<div class="">
    <label class="" for="{{ $name }}[]">
        {{ $label}}s
        <button onclick="Livewire.emit('openModal', 'modals.{{ $name }}-form-modal')" class="bg-white border border-gray-300 rounded-md" type="button">
            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
        </button>
        <span class="text-xs font-thin text-gray-400 hidden">selection multiple</span>
    </label>
    <select multiple id="{{ $name }}" name="{{ $name }}[]" class="
flex-1 block w-full focus:ring-indigo-500 rounded-md focus:border-indigo-500 min-w-0  rounded-r-md sm:text-sm border-gray-300">
        @if ($options)

        @foreach ($options as $value)
        <option value="{{ $value->id }}">{{ $value->name }}</option>
        @endforeach
        @endif
    </select>

</div>