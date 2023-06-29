<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <div class="mt-4">
        <x-label for="name" value="{{ __('Filter name') }}" />
        <x-input id="name" class="block mt-1 w-full" type="text" name="name" wire:model="name" />
    </div>
    <br>
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <th scope="col" class="px-6 py-3">Key</th>
            <th scope="col" class="px-6 py-3">Name</th>
            <th scope="col" class="px-6 py-3">Age</th>
            <th scope="col" class="px-6 py-3">Sex</th>
            <th scope="col" class="px-6 py-3">Base Salary</th>
            <th scope="col" class="px-6 py-3">
                <span class="sr-only">Actions</span>
            </th>
        </thead>
        <tbody>
            @foreach ($employees as $item)
                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $item->key }}
                        </td>
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $item->name }}
                    </td>
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $item->age }}
                    </td>
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $item->sex }}
                    </td>
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $item->base_salary }}
                    </td>
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{-- href="{{ route('employees.show') }}" --}}
                        {{-- <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a> --}}
                        <x-button class="ml-3" wire:click="delete({{ $item }})">
                            {{ __('Delete') }}
                        </x-button>
                        <x-danger-button class="ml-3" wire:click="delete({{ $item }})">
                            {{ __('Delete') }}
                        </x-danger-button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    <div class="card">
        {{ $employees->links() }}
    </div>
</div>
