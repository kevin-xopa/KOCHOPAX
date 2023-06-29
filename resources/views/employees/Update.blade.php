<x-form-section submit="updateEmployeeInformation">
    <x-slot name="title">
        {{ __('Employee Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update the employee profile information and email address.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{ photoName: null, photoPreview: null }" class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input type="file" class="hidden" wire:model="photo" x-ref="photo"
                    x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                <x-label for="photo" value="{{ __('Photo') }}" />

                <!-- Current Profile Photo -->
                <div class="mt-2" x-show="! photoPreview">
                    <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}"
                        class="rounded-full h-20 w-20 object-cover">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview" style="display: none;">
                    <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                        x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <x-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('Select A New Photo') }}
                </x-secondary-button>

                @if ($this->user->profile_photo_path)
                    <x-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                        {{ __('Remove Photo') }}
                    </x-secondary-button>
                @endif

                <x-input-error for="photo" class="mt-2" />
            </div>
        @endif

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="name" value="{{ __('Name') }}" />
            <x-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="state.name"
                autocomplete="name" />
            <x-input-error for="name" class="mt-2" />
        </div>

        <!-- Birth Date -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="birth_date" value="{{ __('Birth_Date') }}" />
            <x-input id="birth_date" type="date" class="mt-1 block w-full" wire:model.defer="state.birth_date"
                autocomplete="birth_date" />
            <x-input-error for="birth_date" class="mt-2" />
        </div>

        <!-- Sex -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="sex" value="{{ __('Sex') }}" />
            <x-input id="sex" type="text" class="mt-1 block w-full" wire:model.defer="state.sex"
                autocomplete="sex" />
            <x-input-error for="sex" class="mt-2" />
        </div>

        <!-- Base Salary -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="base_salary" value="{{ __('Base Salary') }}" />
            <x-input id="base_salary" type="number" min="0" step="any" class="mt-1 block w-full"
                wire:model.defer="state.base_salary" autocomplete="base_salary" />
            <x-input-error for="base_salary" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-action-message>

        <x-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Save') }}
        </x-button>
    </x-slot>
</x-form-section>
