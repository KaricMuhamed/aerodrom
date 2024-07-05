<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Flight') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                    <form action="{{ route('flights.update', $flight->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="flight_number" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Flight Number</label>
                            <input type="text" name="flight_number" id="flight_number" value="{{ $flight->flight_number }}" class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                        </div>
                        <div class="mb-4">
                            <label for="departure_airport_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Departure Airport</label>
                            <select name="departure_airport_id" id="departure_airport_id" class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                                @foreach ($airports as $airport)
                                    <option value="{{ $airport->id }}" @if ($flight->departure_airport_id == $airport->id) selected @endif>{{ $airport->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="destination_airport_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Destination Airport</label>
                            <select name="destination_airport_id" id="destination_airport_id" class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                                @foreach ($airports as $airport)
                                    <option value="{{ $airport->id }}" @if ($flight->destination_airport_id == $airport->id) selected @endif>{{ $airport->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="departure_time" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Departure Time</label>
                            <input type="datetime-local" name="departure_time" id="departure_time" value="{{ $flight->departure_time }}" class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                        </div>
                        <div class="mb-4">
                            <label for="arrival_time" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Arrival Time</label>
                            <input type="datetime-local" name="arrival_time" id="arrival_time" value="{{ $flight->arrival_time }}" class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                        </div>
                        <div class="mb-4">
                            <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Status</label>
                            <select name="status" id="status" class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                                <option value="Scheduled" @if ($flight->status == 'Scheduled') selected @endif>Scheduled</option>
                                <option value="Delayed" @if ($flight->status == 'Delayed') selected @endif>Delayed</option>
                                <option value="Cancelled" @if ($flight->status == 'Cancelled') selected @endif>Cancelled</option>
                                <option value="Completed" @if ($flight->status == 'Completed') selected @endif>Completed</option>
                            </select>
                        </div>
                        <div>
                            <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Update Flight
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
