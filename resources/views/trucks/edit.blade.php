<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Truck') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
                <form action="{{ route('trucks.update', $truck->id) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="Plate_number" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Plate Number</label>
                            <input type="text" id="Plate_number" name="Plate_number" value="{{ $truck->Plate_number }}" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:text-white">
                        </div>

                        <div>
                            <label for="Brand" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Brand</label>
                            <input type="text" id="Brand" name="Brand" value="{{ $truck->Brand }}" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:text-white">
                        </div>

                        <div>
                            <label for="Model" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Model</label>
                            <input type="text" id="Model" name="Model" value="{{ $truck->Model }}" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:text-white">
                        </div>

                        <div>
                            <label for="color" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Color</label>
                            <input type="text" id="color" name="color" value="{{ $truck->color }}" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:text-white">
                        </div>
                    </div>

                    <div class="flex justify-start gap-4">
                        <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition">
                            Update
                        </button>
                        <a href="{{ route('trucks.index') }}"
                            class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded transition">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
