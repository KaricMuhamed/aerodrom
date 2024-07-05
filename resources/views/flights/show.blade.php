<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Flight Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                    <div class="mb-4">
                        <p class="text-sm font-medium text-gray-700 dark:text-gray-300">Flight Number:</p>
                        <p class="text-lg font-semibold text-gray-900 dark:text-gray-200">{{ $flight->flight_number }}</p>
                    </div>
                    <div class="mb-4">
                        <p class="text-sm font-medium text-gray-700 dark:text-gray-300">Departure Airport:</p>
                        <p class="text-lg font-semibold text-gray-900 dark:text-gray-200">{{ $flight->departureAirport->name }}</p>
                    </div>
                    <div class="mb-4">
                        <p class="text-sm font-medium text-gray-700 dark:text-gray-300">Destination Airport:</p>
                        <p class="text-lg font-semibold text-gray-900 dark:text-gray-200">{{ $flight->destinationAirport->name }}</p>
                    </div>
                    <div class="mb-4">
                        <p class="text-sm font-medium text-gray-700 dark:text-gray-300">Departure Time:</p>
                        <p class="text-lg font-semibold text-gray-900 dark:text-gray-200">{{ $flight->departure_time }}</p>
                    </div>
                    <div class="mb-4">
                        <p class="text-sm font-medium text-gray-700 dark:text-gray-300">Arrival Time:</p>
                        <p class="text-lg font-semibold text-gray-900 dark:text-gray-200">{{ $flight->arrival_time }}</p>
                    </div>
                    <div class="mb-4">
                        <p class="text-sm font-medium text-gray-700 dark:text-gray-300">Status:</p>
                        <p class="text-lg font-semibold text-gray-900 dark:text-gray-200">{{ $flight->status }}</p>
                    </div>
                    <div class="mt-6">
                        <a href="{{ route('flights.edit', $flight->id) }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Edit Flight
                        </a>
                        <form class="inline-block" action="{{ route('flights.destroy', $flight->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this flight?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="ml-3 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-red-600 bg-white dark:bg-gray-800 dark:text-red-400 hover:text-red-900 dark:hover:text-red-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                Delete Flight
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
