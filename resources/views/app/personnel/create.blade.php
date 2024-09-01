<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between w-full">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Register Personnel') }}
            </h2>
            <a href="{{route('personnel.index')}}" class="p-2 bg-green-950 text-white font-bold rounded-md shadow-sm shadow-black">
                {{ __('All Personnel') }}
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                {{-- service_no, rank, fullname, img_path  --}}

                @if ($errors->any())
    <div class="text-red-500 font-semibold italic">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{route('personnel.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="grid grid-cols-1 gap-6">
                            <div class="mt-4">
                                <label for="service_no" class="block font-medium text-sm text-gray-700 dark:text-gray-200">
                                    {{ __('Service Number') }}
                                </label>
                                <input id="service_no" class="block mt-1 w-full" type="text" name="service_no" required autofocus class="block mt-1 w-full rounded-md" value="{{old('service_no')}}" />
                              
                            </div>
                            <div class="mt-4">
                                <label for="rank" class="block font-medium text-sm text-gray-700 dark:text-gray-200">
                                    {{ __('Rank') }}
                                </label>

                                <select id="rank" name="rank" class="block mt-1 w-full rounded-md">
                                    @foreach ($ranks as $rank)
                                        <option value="{{$rank}}">{{$rank}}</option>
                                    @endforeach
                                </select>
                               
                            </div>
                            <div class="mt-4">
                                <label for="fullname" :value="__('Fullname')" class="block font-medium text-sm text-gray-700 dark:text-gray-200">
                                    {{ __('Fullname') }}
                                </label>
                                <input id="fullname" class="block mt-1 w-full" type="text" name="fullname" required autofocus class="block mt-1 w-full rounded-md" value="{{old('fullname')}}" />
                                
                            </div>
                            <div class="mt-4">
                                <label for="img_path" :value="__('Image')" class="block font-medium text-sm text-gray-700 dark:text-gray-200">
                                    {{ __('Image') }}
                                </label>
                                <input id="img_path" class="block mt-1 w-full" type="file" name="img_path" required autofocus />
                            </div>
                            <div class="mt-4">
                                <button class="bg-green-950 text-white font-bold rounded-md shadow-sm shadow-black">
                                    {{ __('Register Personnel') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
