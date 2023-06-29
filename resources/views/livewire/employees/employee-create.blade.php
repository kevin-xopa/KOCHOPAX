<x-form-section submit="create">
    <x-slot name="title">
        {{ __('Create Employee') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Complete the form to register an employee.') }}
    </x-slot>

    <x-slot name="form">

        <!-- Key -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="key" value="{{ __('Key') }}" />
            <x-input id="key" type="text" class="mt-1 block w-full" wire:model="key"
                autocomplete="key" />
            <x-input-error for="key" class="mt-2" />
        </div>

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="name" value="{{ __('Name') }}" />
            <x-input id="name" type="text" class="mt-1 block w-full" wire:model="name"
                autocomplete="name" />
            <x-input-error for="name" class="mt-2" />
        </div>

        <!-- Birth Date -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="birth_date" value="{{ __('Birth_Date') }}" />
            <x-input id="birth_date" type="date" class="mt-1 block w-full" wire:model="birth_date"
                autocomplete="birth_date" />
            <x-input-error for="birth_date" class="mt-2" />
        </div>

        <!-- Sex -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="sex" value="{{ __('Sex') }}" />
            <x-input id="sex" type="text" class="mt-1 block w-full" wire:model="sex"
                autocomplete="sex" />
            <x-input-error for="sex" class="mt-2" />
        </div>

        <!-- Base Salary -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="base_salary" value="{{ __('Base Salary') }}" />
            <x-input id="base_salary" type="number" min="0" step="any" class="mt-1 block w-full"
                wire:model="base_salary" autocomplete="base_salary" />
            <x-input-error for="base_salary" class="mt-2" />
        </div>

        <!-- About Me -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="about_me" value="{{ __('About Me') }}" />
            <x-input id="about_me" type="text" class="mt-1 block w-full" wire:model="about_me"
                autocomplete="about_me" />
            <x-input-error for="about_me" class="mt-2" />
        </div>

        <!-- Hobbies -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="hobbies" value="{{ __('Hobbies') }}" />
            <x-input id="hobbies" type="text" class="mt-1 block w-full" wire:model="hobbies"
                autocomplete="hobbies" />
            <x-input-error for="hobbies" class="mt-2" />
        </div>

        <!-- Language -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="language" value="{{ __('Language') }}" />
            <x-input id="language" type="text" class="mt-1 block w-full" wire:model="language"
                autocomplete="language" />
            <x-input-error for="language" class="mt-2" />
        </div>
        <x-button type="submit">
            {{ __('Save') }}
        </x-button>
    </x-slot>


</x-form-section>
