<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Send File') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg text-center">
                <div class="grid place-items-center m-4 bg-gray-200 p-4 border border-secondary shadow-blue-700 p-2 rounded-lg">
                    @if(str_starts_with($file->type, 'image/'))
                        <img src="{{ asset($file->path) }}" height='200' width = '200' class="object-cover object-center shadow-lg shadow-blue-700/50">
                    @elseif(str_starts_with($file->type, 'video/'))
                        <video src="{{ asset($file->path) }}" height='500' width = '500' class="object-cover object-center  shadow-blue-100/10" controls></video>
                    @elseif(str_starts_with($file->type, 'audio/'))
                        <audio src="{{ asset($file->path) }}" class="object-cover object-center"></audio>
                    @else
                        <img src="{{ url('./Assets/File.svg') }}" height='200' width = '200' class="object-cover object-center">
                    @endif
{{--                    <img src="{{ asset($file->path) }}" alt="image" class="w-200 h-200 object-cover rounded-lg">--}}
                </div>
                <div class="p-4 m-2 border rounded-lg">
                    {{ $file->name }}
                </div>
                <form action="{{ route('files.share') }}" method="post" class="border m-2 rounded-lg">
                    @csrf
                    <input type="hidden" name="file_id" value="{{ \Illuminate\Support\Facades\Crypt::encrypt($file->id) }}">
                    <div class="relative inline-block ">
                        <select name="receiver_id" id="" class="w-full border rounded-lg  m-2">
                            @foreach($users as $user)
                                <option
                                    value="{{ \Illuminate\Support\Facades\Crypt::encrypt($user->id) }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                        <div
                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        </div>
                    </div>
                    <button class="ml-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Share
                    </button>
                </form>


            </div>
        </div>
    </div>
</x-app-layout>
