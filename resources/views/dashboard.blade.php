<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 border text-center">
                    {{ __("You're logged in!") }}
                    {{ Auth::user()->name }}

                </div>
                <div class=" p-6">
                    <div class="flex justify-between mb-1">
                        <span class="text-base font-medium text-blue-700 dark:text-white">Storage Used</span>
                        <span class="text-sm font-medium text-blue-700 dark:text-white">{{ $used_space }}/{{ $total_space }} || {{ $percentage }}%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
                        <div class="bg-blue-600 h-2.5 rounded-full" style="width: {{$percentage}}%"></div>
                    </div>


                </div>
                <div class="p-6 text-center  rounded">
                    <div class="flex justify-between w-full">
                        <div class="count w-2/4  rounded border text-center">
                            {{ $files }} files
                        </div>
                        <a href="{{ url('/files') }} "
                           class="bg-blue-500 hover:bg-blue-700 w-2/4 text-white font-bold py-2 px-4 rounded-lg">
                            {{ __('View files') }}
                        </a>
                    </div>
                    <div class="flex justify-between w-full mt-2">
                        <div class="count w-2/4  rounded border text-center">
                            {{ $shared }} files Shared
                        </div>
                        <a href="{{ url('files/shared') }} "
                           class="bg-blue-500 hover:bg-blue-700 w-2/4 text-white font-bold py-2 px-4 rounded-lg">
                            {{ __('View Shared files') }}
                        </a>
                    </div>
                    <div class="flex justify-between w-full mt-2">
                        <div class="count w-2/4  rounded border text-center">
                            {{ $received }} files Received
                        </div>
                        <a href="{{ url('files/received') }}"
                           class="bg-blue-500 hover:bg-blue-700 w-2/4 text-white font-bold py-2 px-4 rounded-lg">
                            {{ __('Received files') }}
                        </a>
                    </div>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
