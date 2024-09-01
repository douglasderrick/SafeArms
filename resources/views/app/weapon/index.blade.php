<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between w-full">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('weapons') }}
            </h2>
            <a href="{{route('weapon.create')}}" class="p-2 bg-green-950 text-white font-bold rounded-md shadow-sm shadow-black">
                {{ __('Create weapon') }}
            </a>
        </div>

    </x-slot>

    {{-- success using blade --}}

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg onclick="this.parentElement.parentElement.style.display='none'" class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <title>Close</title>
                    <path fill-rule="evenodd" d="M14.95 5.05a.75.75 0 010 1.06l-8.96 8.96a.75.75 0 01-1.06-1.06l8.96-8.96a.75.75 0 011.06 0z" clip-rule="evenodd" />
                    <path fill-rule="evenodd" d="M5.05 5.05a.75.75 0 000 1.06l8.96 8.96a.75.75 0 001.06-1.06L6.11 5.05a.75.75 0 00-1.06 0z" clip-rule="evenodd" />
                </svg>
            </span>
        </div>
    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                {{-- serial_no --}}
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">
                                    Serial Number
                                </th>

                                {{-- name --}}
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">
                                    Name
                                </th>

                                {{-- type --}}
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">
                                    Type
                                </th>
                               
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200">
                            @foreach ($weapons as $weapon)
                                <tr>
                                    {{-- serial_no --}}
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-start">
                                            <div class="text-sm font-medium text-gray-900 dark:text-gray-200">
                                                {{ $weapon->serial_no }}
                                            </div>
                                        </div>
                                    </td>

                                    {{-- name --}}
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900 dark:text-gray-200">{{ $weapon->name }}</div>
                                    </td>

                                    {{-- type --}}
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900 dark:text-gray-200">{{ $weapon->type }}</div>
                                    </td>
                                    
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="{{ route('weapon.edit', $weapon->id) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                        {{-- show --}}
                                        <a href="{{ route('weapon.show', $weapon->id) }}" class="text-green-600 hover:text-green-900">View</a>
                                        {{-- delete --}}
                                        <form action="{{ route('weapon.destroy', $weapon->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
        </div>
    </div>
</x-app-layout>
