<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Staff Member Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800">
                    <div class="mb-4">
                        <p class="text-sm font-medium text-gray-700 dark:text-gray-300">Name:</p>
                        <p class="mt-1 text-lg font-semibold text-gray-900 dark:text-gray-200">{{ $staff->name }}</p>
                    </div>
                    <div class="mb-4">
                        <p class="text-sm font-medium text-gray-700 dark:text-gray-300">Role:</p>
                        <p class="mt-1 text-lg font-semibold text-gray-900 dark:text-gray-200">{{ $staff->role }}</p>
                    </div>
                    <div class="mb-4">
                        <p class="text-sm font-medium text-gray-700 dark:text-gray-300">Email:</p>
                        <p class="mt-1 text-lg font-semibold text-gray-900 dark:text-gray-200">{{ $staff->email }}</p>
                    </div>
                    <!-- Add more details as per your staff member attributes -->

                    <div class="flex">
                        <a href="{{ route('staff.edit', $staff->id) }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 mr-2">
                            Edit
                        </a>
                        <form class="inline-block" action="{{ route('staff.destroy', $staff->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this staff member?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
