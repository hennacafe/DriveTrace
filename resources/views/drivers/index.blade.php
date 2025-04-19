<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Drivers List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-4 p-4 rounded-lg bg-green-100 text-green-800 dark:bg-green-700 dark:text-green-100">
                    {{ session('success') }}
                </div>
            @endif

            <div class="mb-6">
                <a href="{{ route('drivers.create') }}"
                   class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded shadow transition">
                    + Add New Driver
                </a>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-x-auto shadow sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-100">
                        <tr>
                            <th class="px-4 py-2 text-left text-sm font-semibold">ID</th>
                            <th class="px-4 py-2 text-left text-sm font-semibold">Name</th>
                            <th class="px-4 py-2 text-left text-sm font-semibold">Age</th>
                            <th class="px-4 py-2 text-left text-sm font-semibold">Contact Number</th>
                            <th class="px-4 py-2 text-left text-sm font-semibold">License Number</th>
                            <th class="px-4 py-2 text-left text-sm font-semibold">Address</th>
                            <th class="px-4 py-2 text-left text-sm font-semibold">Duty Hours</th>
                            <th class="px-4 py-2 text-left text-sm font-semibold">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach($drivers as $driver)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                <td class="px-4 py-2">{{ $driver->id }}</td>
                                <td class="px-4 py-2">{{ $driver->Name }}</td>
                                <td class="px-4 py-2">{{ $driver->Age }}</td>
                                <td class="px-4 py-2">{{ $driver->Contact_Number }}</td>
                                <td class="px-4 py-2">{{ $driver->License_number }}</td>
                                <td class="px-4 py-2">{{ $driver->Address }}</td>
                                <td class="px-4 py-2">{{ $driver->Duty_hours }}</td>
                                <td class="px-4 py-2 flex flex-wrap gap-2">
                                    
                                    <a href="{{ route('drivers.edit', $driver->id) }}"
                                       class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded text-sm font-medium">
                                        Edit
                                    </a>
                                    <form action="{{ route('drivers.destroy', $driver->id) }}" method="POST"
                                          onsubmit="return confirm('Are you sure?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-sm font-medium">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
