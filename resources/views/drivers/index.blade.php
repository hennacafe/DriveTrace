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

            {{-- Swapped: Search bar on the left, Add button on the right --}}
            <div class="mb-6 flex flex-wrap items-center justify-between gap-2">
                {{-- Search Form (now on the left) --}}
                <form method="GET" action="{{ route('drivers.index') }}" class="flex gap-2 items-center">
                    <select name="filter"
                            class="border px-4 py-2 rounded focus:outline-none focus:ring focus:border-blue-300 dark:bg-gray-900 dark:text-white">
                        <option value="id" {{ request('filter') == 'id' ? 'selected' : '' }}>id</option>
                        <option value="Name" {{ request('filter') == 'Name' ? 'selected' : '' }}>Name</option>
                        <option value="Age" {{ request('filter') == 'Age' ? 'selected' : '' }}>Age</option>
                        <option value="Contact_Number" {{ request('filter') == 'Contact_Number' ? 'selected' : '' }}>Contact Number</option>
                        <option value="License_number" {{ request('filter') == 'License_number' ? 'selected' : '' }}>License Number</option>
                        <option value="Address" {{ request('filter') == 'Address' ? 'selected' : '' }}>Address</option>
                        <option value="Duty_hours" {{ request('filter') == 'Duty_hours' ? 'selected' : '' }}>Duty Hours</option>
                    </select>
                
                    <input type="text" name="search" placeholder="Search..."
                           value="{{ request('search') }}"
                           class="border px-4 py-2 rounded focus:outline-none focus:ring focus:border-blue-300 dark:bg-gray-900 dark:text-white" />
                
                    <button type="submit"
                            class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">
                        Search
                    </button>
                </form>
                

                {{-- Add New Driver Button (now on the right) --}}
                <a href="{{ route('drivers.create') }}"
                   class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded shadow transition">
                    + Add New Driver
                </a>
            </div>

            @if(request('search'))
                <div class="mb-4 text-sm text-gray-600 dark:text-gray-300">
                    Showing results for "<strong>{{ request('search') }}</strong>": {{ $drivers->total() }} found.
                </div>
            @endif

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

                <div class="mt-4 px-4 py-2">
                    {{ $drivers->appends(['search' => request('search'), 'filter' => request('filter')])->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
