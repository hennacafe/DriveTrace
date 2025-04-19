<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Driver') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
                <form action="{{ route('drivers.update', $driver->id) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="Name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Full Name</label>
                            <input type="text" id="Name" name="Name" value="{{ $driver->Name }}" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:text-white">
                        </div>

                        <div>
                            <label for="Age" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Age</label>
                            <input type="number" id="Age" name="Age" value="{{ $driver->Age }}" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:text-white">
                        </div>

                        <div>
                            <label for="Gender" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Gender</label>
                            <select id="Gender" name="Gender" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:text-white">
                                <option value="Male" {{ $driver->Gender == 'Male' ? 'selected' : '' }}>Male</option>
                                <option value="Female" {{ $driver->Gender == 'Female' ? 'selected' : '' }}>Female</option>
                            </select>
                        </div>

                        <div>
                            <label for="Contact_Number" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Contact Number</label>
                            <input type="text" id="Contact_Number" name="Contact_Number" value="{{ $driver->Contact_Number }}" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:text-white">
                        </div>

                        <div>
                            <label for="License_number" class="block text-sm font-medium text-gray-700 dark:text-gray-300">License Number</label>
                            <input type="text" id="License_number" name="License_number" value="{{ $driver->License_number }}" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:text-white">
                        </div>

                        <div>
                            <label for="Duty_hours" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Duty Hours</label>
                            <input type="text" id="Duty_hours" name="Duty_hours" value="{{ $driver->Duty_hours }}" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:text-white">
                        </div>
                    </div>

                    <div>
                        <label for="Address" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Address</label>
                        <textarea id="Address" name="Address" rows="3" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:text-white">{{ $driver->Address }}</textarea>
                    </div>

                    <div class="flex justify-start gap-4">
                        <button type="submit"
                            class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded transition">
                            Update
                        </button>
                        <a href="{{ route('drivers.index') }}"
                            class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded transition">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
