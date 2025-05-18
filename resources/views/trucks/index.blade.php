<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Truck List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-4 p-4 rounded-lg bg-green-100 text-green-800 dark:bg-green-700 dark:text-green-100">
                    {{ session('success') }}
                </div>
            @endif

            <div class="mb-6 flex flex-wrap items-center justify-between gap-2">
                <form method="GET" action="{{ route('trucks.index') }}" class="flex flex-wrap gap-2 items-center">
                    <select name="filter"
                            class="border px-4 py-2 rounded focus:outline-none focus:ring focus:border-blue-300 dark:bg-gray-900 dark:text-white">
                        <option value="Plate_number" {{ request('filter') == 'Plate_number' ? 'selected' : '' }}>Plate Number</option>
                        <option value="Brand" {{ request('filter') == 'Brand' ? 'selected' : '' }}>Brand</option>
                        <option value="Model" {{ request('filter') == 'Model' ? 'selected' : '' }}>Model</option>
                        <option value="color" {{ request('filter') == 'color' ? 'selected' : '' }}>Color</option>
                    </select>

                    <input type="text" name="search" placeholder="Search..." value="{{ request('search') }}"
                           class="border px-4 py-2 rounded focus:outline-none focus:ring focus:border-blue-300 dark:bg-gray-900 dark:text-white" />

                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">
                        Search
                    </button>

                    @if(request('search') || request('filter'))
                        <a href="{{ route('trucks.index') }}"
                           class="bg-gray-400 text-white px-4 py-2 rounded hover:bg-gray-500 transition">
                            Reset
                        </a>
                    @endif
                </form>

                <a href="{{ route('trucks.create') }}"
                   class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded shadow transition">
                    + Add New Truck
                </a>
            </div>

            @if(request('search'))
                <div class="mb-4 text-sm text-gray-600 dark:text-gray-300">
                    Showing results for "<strong>{{ request('search') }}</strong>": {{ $trucks->total() }} found.
                </div>
            @endif

            <div class="bg-white dark:bg-gray-800 overflow-x-auto shadow sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-100">
                        <tr>
                            <th class="px-4 py-2 text-left text-sm font-semibold">Plate Number</th>
                            <th class="px-4 py-2 text-left text-sm font-semibold">Brand</th>
                            <th class="px-4 py-2 text-left text-sm font-semibold">Model</th>
                            <th class="px-4 py-2 text-left text-sm font-semibold">Color</th>
                            <th class="px-4 py-2 text-left text-sm font-semibold">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        @forelse ($trucks as $truck)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                <td class="px-4 py-2 text-gray-900 dark:text-white">{{ $truck->Plate_number }}</td>
                                <td class="px-4 py-2 text-gray-900 dark:text-white">{{ $truck->Brand }}</td>
                                <td class="px-4 py-2 text-gray-900 dark:text-white">{{ $truck->Model }}</td>
                                <td class="px-4 py-2 text-gray-900 dark:text-white">{{ $truck->color }}</td>
                                <td class="px-4 py-2 flex flex-wrap gap-2">
                                    <a href="{{ route('trucks.edit', $truck->id) }}"
                                       class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded text-sm font-medium">
                                        Edit
                                    </a>
                                    <form action="{{ route('trucks.destroy', $truck->id) }}" method="POST"
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
                        @empty
                            <tr>
                                <td colspan="5" class="px-4 py-2 text-center text-gray-500 dark:text-gray-400">No trucks found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="mt-4 px-4 py-2">
                    {{ $trucks->appends(['search' => request('search'), 'filter' => request('filter')])->links() }}
                </div>

                <div class="mt-4 px-4 py-2 text-right">
                    <a href="{{ route('trucks.pdf', ['search' => request('search')]) }}"
                    class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded shadow transition">
                    Export PDF
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
