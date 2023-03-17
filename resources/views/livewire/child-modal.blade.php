<x-modal>
    <x-slot name="title">
        Hi! 👋 {{ $name }}
    </x-slot>

    <x-slot name="content">
        You are looking at a child component
    </x-slot>

    <x-slot name="buttons">
    <button wire:click="closeAndUpdateHelloWorld">Close Modal</button>
    </x-slot>
</x-modal>