<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 border text-center border-secondary rounded p-1 m-1">
                    {{ __("You're logged in!") }}
                    {{ Auth::user()->name }}

                </div>
                <div class=" p-6 border border-primary  mt-2 rounded">
                    <div class="flex justify-between mb-1">
                        <span class="text-base font-medium text-blue-700 dark:text-white">Storage Used</span>
                        <span class="text-sm font-medium text-blue-700 dark:text-white">{{ $used_space }}/{{ $total_space }} || {{ $percentage }}%</span>
                    </div>
                    
                    <div class="w-full bg-gray-200 rounded-lg  dark:bg-gray-700 h-4 border">
                        <div class="bg-blue-600 h-4 h-4 rounded-full mb-1" style="width: {{$percentage+2}}%"></div>
                    </div>


                </div>
                <div class="p-6 text-center  rounded border border-secondary m-2 p-2">
                    <div class="flex justify-between w-full  ">
                        <div class="count w-2/4  rounded border text-center border border-primary p-4 mr-3">
                            {{ $files }} files
                        </div>
                        <a href="{{ url('/files') }} "
                           class="bg-blue-500 hover:bg-blue-700 w-2/4 text-white font-bold py-2 px-4 rounded-lg
                           text-center border border-primary p-4
                           transition duration-500 ease select-none hover:bg-gray-600 focus:outline-none focus:shadow-outline">
                            {{ __('View files') }}
                        </a>
                    </div>
                    <div class="flex justify-between w-full mt-2">
                        <div class="count w-2/4  rounded border text-center
                        border border-primary p-4 mr-3">

                            {{ $shared }} files Shared
                        </div>
                        <a href="{{ url('Userfiles/shared') }} "
                           class="bg-blue-500 hover:bg-blue-700 w-2/4 text-white font-bold py-2 px-4 rounded-lg
                            text-center border border-primary p-4
                           transition duration-500 ease select-none hover:bg-gray-600 focus:outline-none focus:shadow-outline">

                            {{ __('View Shared files') }}
                        </a>
                    </div>
                    <div class="flex justify-between w-full mt-2">
                        <div class="count w-2/4  rounded border text-center
                        border border-primary p-4 mr-3">

                            {{ $received }} files Received
                        </div>
                        <a href="{{ url('Userfiles/received') }}"
                           class="bg-blue-500 hover:bg-blue-700 w-2/4 text-white font-bold py-2 px-4 rounded-lg
                           border border-primary p-4
                            transition duration-500 ease select-none hover:bg-gray-600 focus:outline-none focus:shadow-outline">
                            {{ __('Received files') }}
                        </a>
                    </div>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
