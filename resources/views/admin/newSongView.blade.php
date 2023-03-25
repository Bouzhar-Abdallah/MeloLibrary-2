@extends('layouts.admin')

@section('title', $title)

@section('content')
<div class="min-h-full">
    <div class=" mx-auto">
        <form method="post" action=" {{ route('admin.song.save') }} " class="space-y-8 divide-y divide-gray-200" enctype="multipart/form-data">
            @csrf
            <div class="grid md:grid-cols-2 ">
                <div class="p-4">
                    <div class="space-y-6 sm:space-y-5">
                        <div class="">
                            <x-input-label for="title" :value="'title'" />
                            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus autocomplete="title" />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="release_date" :value="__('release date')" />
                            <x-text-input id="release_date" :value="old('release_date')" class="block mt-1 w-full" type="date" name="release_date" required />
                            <x-input-error :messages="$errors->get('release_date')" class="mt-2" />
                        </div>
                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                            <label for="lyrics" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"> lyrics </label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <textarea id="lyrics" name="lyrics" rows="3" class="max-w-lg shadow-sm block w-full focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border border-gray-300 rounded-md"></textarea>
                                <p class="mt-2 text-sm text-gray-500">write lyrics of the song :</p>
                            </div>
                        </div>

                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">

                            <x-input-label class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2" for="cover" :value="'cover'" />
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <div class="max-w-lg flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                    <div class="space-y-1 text-center">
                                        <svg class="mx-auto h-12 w-[40px] text-black" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        <div class="flex text-sm text-gray-600 justify-center">
                                            <label for="cover" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                                <span>Upload a file</span>

                                                <x-text-input id="cover" class="sr-only" type="file" name="cover" :value="old('cover')" required autofocus autocomplete="cover" />
                                            </label>
                                            <p class="pl-1">or drag and drop</p>
                                        </div>
                                        <div>

                                            <p class="text-xs text-gray-500">PNG, JPG, GIF up to 5MB</p>
                                            <x-input-error :messages="$errors->get('cover')" class=" font-light text-sm" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                            <label for="clip" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"> Audio : </label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <div class="max-w-lg flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                    <div class="space-y-1 text-center">

                                        <svg class="mx-auto h-12 w-[40px] text-black" stroke="currentColor" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 9l10.5-3m0 6.553v3.75a2.25 2.25 0 01-1.632 2.163l-1.32.377a1.803 1.803 0 11-.99-3.467l2.31-.66a2.25 2.25 0 001.632-2.163zm0 0V2.25L9 5.25v10.303m0 0v3.75a2.25 2.25 0 01-1.632 2.163l-1.32.377a1.803 1.803 0 01-.99-3.467l2.31-.66A2.25 2.25 0 009 15.553z" />
                                        </svg>

                                        <div class="flex text-sm text-gray-600 justify-center">
                                            <label for="clip" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                                <span>Upload a file</span>
                                                <input id="clip" name="clip" type="file" class="sr-only">
                                            </label>
                                            <p class="pl-1">or drag and drop</p>
                                        </div>
                                        <div>

                                            <p class="text-xs text-gray-500">MP3</p>

                                            <x-input-error :messages="$errors->get('clip')" class=" font-light text-sm" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="p-4 ">
                    <div class="space-y-6 sm:space-y-5">

                        
                        
                        <livewire:components.select name="artist" label="Artist" />
                        <livewire:components.select name="band" label="band" />
                        <livewire:components.select name="genre" label="genre" />
                        <x-input-error :messages="$errors->get('genre')" class=" font-light text-sm" />
                        <livewire:components.select name="writer" label="writer" />
                        <livewire:components.select name="language" label="language" />
                        
                    </div>
                </div>


            </div>

            <div class="pt-5">
                <div class="flex justify-end">
                    <button type="button" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Cancel</button>
                    <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection