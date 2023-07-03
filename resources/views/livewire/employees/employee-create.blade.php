<x-slot name="header">
</x-slot>

<div>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

        <x-form-section submit="saved">
            <x-slot name="title">
                {{ $employee ? __('Update Employee') : __('Create Employee') }}
            </x-slot>

            <x-slot name="description">
                {{ __('Complete the form to register an employee.') }}
            </x-slot>

            <x-slot name="form">
                @if ($mensaje)
                    <div class="col-span-6 sm:col-span-4">
                        <div class="bg-indigo-900 text-center py-4 lg:px-4">
                            <div class="p-2 bg-indigo-800 items-center text-indigo-100 leading-none lg:rounded-full flex lg:inline-flex"
                                role="alert">
                                <span
                                    class="flex rounded-full bg-indigo-500 uppercase px-2 py-1 text-xs font-bold mr-3">New</span>
                                <span
                                    class="font-semibold mr-2 text-left flex-auto text-white">{{ $mensaje }}</span>
                            </div>
                        </div>
                    </div>
                @endif


                <!-- Key -->
                <div class="col-span-6 sm:col-span-4">
                    <x-input-error for="key" class="mt-2" />
                </div>

                <!-- Name -->
                <div class="col-span-6 sm:col-span-4">
                    <x-label for="name" value="{{ __('Name') }}" />
                    <x-input id="name" type="text" class="mt-1 block w-full" wire:model="name"
                        autocomplete="name" />
                    <x-input-error for="name" class="mt-2" />
                </div>

                <!-- Last Name -->
                <div class="col-span-6 sm:col-span-4">
                    <x-label for="last_name" value="{{ __('Last Name') }}" />
                    <x-input id="last_name" type="text" class="mt-1 block w-full" wire:model="last_name"
                        autocomplete="last_name" />
                    <x-input-error for="last_name" class="mt-2" />
                </div>

                <!-- Mother Last Name -->
                <div class="col-span-6 sm:col-span-4">
                    <x-label for="mother_last_name" value="{{ __('Mother Last Name') }}" />
                    <x-input id="mother_last_name" type="text" class="mt-1 block w-full"
                        wire:model="mother_last_name" autocomplete="mother_last_name" />
                    <x-input-error for="mother_last_name" class="mt-2" />
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
                    <select id="sex" type="text" class="mt-1 block w-full" wire:model="sex" autocomplete="sex"
                        class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm'">
                        <option value="" selected="selected" hidden="hidden">Choose here</option>
                        <option value="Hombre">Hombre</option>
                        <option value="Mujer">Mujer</option>
                    </select>
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

                <x-slot name="actions">
                    <x-action-message class="mr-3" on="saved">
                        {{ __('Saved.') }}
                    </x-action-message>

                    <x-button type="submit">
                        {{ __('Save') }}
                    </x-button>
                </x-slot>
            </x-slot>


        </x-form-section>

    </div>

    @if ($employee)
        <x-section-border />
        <div class="mt-10 sm:mt-0">
            @livewire('employees.salary-projection-chart', ['employee' => $employee])
        </div>
        <x-section-border />
    @endif
</div>
