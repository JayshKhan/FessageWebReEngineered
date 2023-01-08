<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden shadow-sm sm:rounded-lg">
                <form class="bg-white border border-blue-600 shadow-md rounded-lg p-8 grid place-items-center text-center" method="post" action="{{ url('files') }}" enctype="multipart/form-data">
                    @csrf
                    <h1 class="text-2xl font-bold mb-4 text-center">File Upload</h1>
                    <div class=" text-center">
                        <input type="file" id="file" name="file" class=" file:bg-blue-500 file:border-none file:rounded-full file:p-4
                         file:m-4 file:shadow-lg file:shadow-blue-600/50 file:text-white border w-50 rounded-lg @error('file') is-invalid @enderror" value="{{ old('file') }}" required autocomplete="file" autofocus>

                    </div>
                    <div id="preview" class="grid grid-cols-3 gap-4 flex justify-around mt-4">

                    </div>
                    <div class="relative mt-4">
                        <div id="progress-bar" class="bg-blue-500 absolute h-2 w-0 rounded-full top-0 left-0"></div>
                    </div>
                    <button type="submit"
                            class="text-center  bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full mt-4">
                        Upload
                    </button>
                </form>


            </div>

        </div>
    </div>
    <script>
        const input = document.getElementById('file');
        const preview = document.getElementById('preview');

        input.addEventListener('change', e => {
                const files = e.target.files;
                for (let i = 0; i < files.length; i++) {
                    const file = files[i];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = e => {

                            if (file.type.startsWith('image/')) {
                                const img = document.createElement('img');
                                img.classList.add('h-200', 'w-200', 'object-cover', 'p-4', 'm-4', 'rounded-lg');
                                img.height = 200;
                                img.width = 200;
                                img.src = e.target.result;
                                preview.appendChild(img);
                            } else if (file.type.startsWith('video/')) {
                                const video = document.createElement('video');
                                video.classList.add('h-200', 'w-200', 'object-cover','rounded-lg');
                                video.height = 200;
                                video.width = 200;
                                video.src = e.target.result;
                                video.controls = true;
                                preview.appendChild(video);
                            } else if (file.type.startsWith('audio/')) {
                                const audio = document.createElement('audio');
                                audio.classList.add('h-200', 'w-200', 'object-cover');
                                audio.height = 200;
                                audio.width = 200;
                                audio.src = e.target.result;
                                audio.controls = true;
                                preview.appendChild(audio);
                            } else {
                                const p = document.createElement('p');
                                p.textContent = 'File type not supported!';
                                preview.appendChild(p);
                            }
                        };
                        reader.readAsDataURL(file);
                    } else {
                        preview.innerHTML = '';
                    }
                }
            }
        )
        ;

        const progressBar = document.getElementById('progress-bar');

        input.addEventListener('change', e => {
            const files = e.target.files;
            if (files.length) {
                let totalSize = 0;
                for (const file of files) {
                    totalSize += file.size;
                }

                let uploadedSize = 0;
                for (const file of files) {
                    const formData = new FormData();
                    formData.append('file', file);

                    const xhr = new XMLHttpRequest();
                    xhr.open('POST', 'files');
                    xhr.upload.addEventListener('progress', e => {
                        if (e.lengthComputable) {
                            uploadedSize += e.loaded;
                            const percentComplete = uploadedSize / totalSize;
                            progressBar.style.width = `${percentComplete * 100}%`;
                        }
                    });
                    xhr.addEventListener('load', e => {
                        console.log(e.target.responseText);
                    });
                    xhr.send(formData);
                }
            }
        });

    </script>
</x-app-layout>
