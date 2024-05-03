<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tasks List') }}
        </h2>
    </x-slot>


    <div class="w-full h-screen bg-gray-100">
        <livewire:tasks-list></livewire:tasks-list>
    </div>
</x-app-layout>
@livewireScripts
