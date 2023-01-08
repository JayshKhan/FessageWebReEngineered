<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @if($type == 'shared')
            {{ __('Shared') }}
            @elseif($type == 'received')
            {{ __('Received') }}
            @else
            {{ __('Dashboard') }}
            @endif
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="grid grid-cols-3 gap-4 border ">
                    @if($files->count() > 0)
                    @foreach($files as $file)

                        <div class="col-span-1 bg-gray-200 m-4 rounded">
                            <div class="relative h-300 w-300 mx-auto">
                                @if(str_starts_with($file->type, 'image/'))
                                    <img src="{{ asset($file->path) }}" height='200' width = '200' class="object-cover object-center">
                                @elseif(str_starts_with($file->type, 'video/'))
                                    <video src="{{ asset($file->path) }}" height='500' width = '500' class="object-cover object-center" controls></video>
                                @elseif(str_starts_with($file->type, 'audio/'))
                                    <audio src="{{ asset($file->path) }}" class="object-cover object-center"></audio>
                                @else
                                    <img src="{{ url('./Assets/File.svg') }}" height='200' width = '200' class="object-cover object-center">
                                @endif


                            </div>
                            <div class="p-4">
                                <div class="flex justify-between">
                                    <div class=" left-0 mb-2 mr-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                                        {{ strlen($file->name)>20?substr($file->name,0,20).'...':$file->name }}
                                    </div>

                                    <button class=" right-0 mb-2 mr-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full bg-gray-100"
                                            onclick="location.href='{{ url('files/send',\Illuminate\Support\Facades\Crypt::encrypt($file->id)) }}'">
                                        Share
                                    </button>

                                </div>
                                <div class="flex justify-evenly">
                                    <button class=" left-0 mb-2 mr-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full bg-gray-100"
                                            onclick="location.href='{{ url('Userfiles/download',\Illuminate\Support\Facades\Crypt::encrypt($file->id)) }}'">
                                        Download
                                    </button>
                                    <form action="{{route('files.destroy',\Illuminate\Support\Facades\Crypt::encrypt($file->id))}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class=" right-0 mb-2 mr-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full bg-gray-100">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                        @else
                        <div class="col-span-3 bg-gray-200 m-4 rounded">
                            <p class="text-center text-2xl">No files found</p>
                        </div>
                    @endif




                </div>

            </div>
        </div>
    </div>
</x-app-layout>
