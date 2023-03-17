<div class="">
<label class="" for="{{ $name }}[]" class="sr-only"> {{ $label}}s 
    <span class="text-xs font-thin text-gray-400">selection multiple</span>
</label>
<select multiple id="{{ $name }}" name="{{ $name }}[]" class="
flex-1 block w-full focus:ring-indigo-500 rounded-md focus:border-indigo-500 min-w-0  rounded-r-md sm:text-sm border-gray-300">
    
    @foreach ($options as $value)
    <option value="{{ $value->id }}">{{ $value->name }}</option>
    @endforeach
</select>
</div>
