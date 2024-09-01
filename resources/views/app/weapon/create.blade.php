<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between w-full">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Register weapon') }}
            </h2>
            <a href="{{route('weapon.index')}}" class="p-2 bg-green-950 text-white font-bold rounded-md shadow-sm shadow-black">
                {{ __('All weapon') }}
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                @if ($errors->any())
    <div class="text-red-500 font-semibold italic">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


{{-- error message --}}
@if (session('error'))
    <div class="text-red-500 font-semibold italic">
        {{ session('error') }}
    </div>
@endif

                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{route('weapon.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="grid grid-cols-1 gap-6">
                            {{-- name, type, caliber, serial_no, img_path, is_serviceable --}}
                            <div class="mt-4">
                                <label for="name" class="block font-medium text-sm text-gray-700 dark:text-gray-200">
                                    {{ __('Name') }}
                                </label>
                                <input id="name" class="block mt-1 w-full" type="text" name="name" required autofocus class="block mt-1 w-full rounded-md" value="{{old('name')}}" />
                            </div>

                            <div class="mt-4">
                                <label for="type" class="block font-medium text-sm text-gray-700 dark:text-gray-200">
                                    {{ __('Type') }}
                                </label>

                                <select id="type" name="type" class="block mt-1 w-full rounded-md">
                                    @foreach ($weaponTypes as $type)
                                        <option value="{{$type}}">{{$type}}</option>
                                    @endforeach

                                </select>

                            </div>

                            <div class="mt-4">
                                <label for="caliber" class="block font-medium text-sm text-gray-700 dark:text-gray-200">
                                    {{ __('Caliber') }}
                                </label>

                                <select id="caliber" name="caliber" class="block mt-1 w-full rounded-md">
                                    @foreach ($calibers as $caliber)
                                        <option value="{{$caliber}}">{{$caliber}}</option>
                                    @endforeach
                                </select>

                            </div>

                            <div class="mt-4">
                                <label for="serial_no" class="block font-medium text-sm text-gray-700 dark:text-gray-200">
                                    {{ __('Serial Number') }}
                                </label>
                                <input id="serial_no" class="block mt-1 w-full" type="text" name="serial_no" required autofocus class="block mt-1 w-full rounded-md" value="{{old('serial_no')}}" />
                            </div>

                            <div class="mt-4">
                                <label for="img_path" :value="__('Image')" class="block font-medium text-sm text-gray-700 dark:text-gray-200">
                                    {{ __('Image') }}
                                </label>
                                <input id="img_path" class="block mt-1 w-full" type="file" name="img_path" required autofocus class="block mt-1 w-full rounded-md" value="{{old('img_path')}}" />
                            </div>

                            {{-- total_stock, issued_stock, available_stock --}}
                            <div class="mt-4">
                                <label for="total_stock" class="block font-medium text-sm text-gray-700 dark:text-gray-200">
                                    {{ __('Total Stock') }}
                                </label>
                                <input id="total_stock" class="block mt-1 w-full" type="number" name="total_stock" required autofocus class="block mt-1 w-full rounded-md" value="{{old('total_stock')}}" />
                            </div>

                            <div class="mt-4">
                                <label for="issued_stock" class="block font-medium text-sm text-gray-700 dark:text-gray-200">
                                    {{ __('Issued Stock') }}
                                </label>
                                <input id="issued_stock" class="block mt-1 w-full" type="number" name="issued_stock" required autofocus class="block mt-1 w-full rounded-md" value="{{old('issued_stock')}}" />
                            </div>

                            <div class="mt-4">
                                <label for="available_stock" class="block font-medium text-sm text-gray-700 dark:text-gray-200">
                                    {{ __('Available Stock') }}
                                </label>
                                <input id="available_stock" class="block mt-1 w-full" type="number" name="available_stock" required autofocus class="block mt-1 w-full rounded-md" value="{{old('available_stock')}}" />
                            </div>



                            <div class="mt-4">
                                <label for="is_serviceable" class="block font-medium text-sm text-gray-700 dark:text-gray-200">
                                    {{ __('Serviceable') }}
                                </label>
                                <select id="is_serviceable" name="is_serviceable" class="block mt-1 w-full rounded-md">
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>

                            <div class="mt-4">
                                <button class="bg-green-950 text-white font-bold rounded-md shadow-sm shadow-black">
                                    {{ __('Register weapon') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
