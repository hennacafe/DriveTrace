<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add New Schedule') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
                <form action="{{ route('schedule_trucks.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="driver_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Driver</label>
                            <select id="driver_id" name="driver_id" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:text-white">
                                <option value="">Select Driver</option>
                                @foreach ($drivers as $driver)
                                    <option value="{{ $driver->id }}">{{ $driver->Name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label for="truck_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Truck</label>
                            <select id="truck_id" name="truck_id" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:text-white">
                                <option value="">Select Truck</option>
                                @foreach ($trucks as $truck)
                                    <option value="{{ $truck->id }}">{{ $truck->Plate_number }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label for="cargo" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Cargo</label>
                            <input type="text" id="cargo" name="cargo" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:text-white">
                        </div>

                        <!-- Add Destination Field here -->
                        <div>
                            <label for="destination" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Destination</label>
                            <input type="text" id="destination" name="destination" 
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:text-white">
                        </div>

                        <div>
                            <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Status</label>
                            <select name="status" id="status" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:text-white">
                                <option value="">Select Status</option>
                                <option value="Pending" {{ old('status', $schedule_truck->status ?? '') == 'Pending' ? 'selected' : '' }}>Pending</option>
                                <option value="In Transit" {{ old('status', $schedule_truck->status ?? '') == 'In Transit' ? 'selected' : '' }}>In Transit</option>
                                <option value="Delivered" {{ old('status', $schedule_truck->status ?? '') == 'Delivered' ? 'selected' : '' }}>Delivered</option>
                            </select>
                        </div>
                    </div>

                    <div class="flex justify-start gap-4">
                        <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition">
                            Submit
                        </button>
                        <a href="{{ route('schedule_trucks.index') }}"
                            class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded transition">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
