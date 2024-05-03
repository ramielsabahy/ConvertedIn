<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Task') }}
        </h2>
    </x-slot>


    <div class="w-full h-screen bg-gray-100">
        <form action="{{ route('tasks.store') }}">
            <div class="mb-5">
                <select class="form-select" name="assignee">
                    @foreach($assignees as $assignee)
                        <option value="{{ $assignee->id }}">{{ $assignee->name }}</option>
                    @endforeach
                </select>
            </div>
        </form>
    </div>
</x-app-layout>
@livewireScripts
