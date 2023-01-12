<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Storage and Transfer</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-800">
<div class="container mx-auto px-4 header">
    <div class="">
        <div class="flex items-center justify-between px-6 py-4 rounded rounded-lg border border-primary mt-4">
            <img class="w-32" src="Logo fessage.png" alt="Logo">
            <div class="flex items-center">
                <button
                    class="px-4 py-2 rounded-lg text-white hover:bg-primary hover:text-black border border-blue-600"
                    onclick="location.href='{{ url('/register') }}'">Signup
                </button>
                <button
                    class="px-4 py-2 rounded-lg text-white hover:bg-primary hover:text-black border border-blue-600 ml-4"
                    onclick="location.href='{{ url('/login') }}'">Login
                </button>
            </div>
        </div>
        <div class=" px-6 py-4 flex flex-col items-center rounded rounded-lg  border border-primary mt-5">
            <img src="./Images/topsec-img.png" alt="cloud" class="w-100 mb-4">

            <h1 class="text-3xl font-bold mb-2 text-white">Fessage. A new home for your files</h1>
            <p class="text-white text-base mb-4">Register or Login now to upload, backup, manage and access your
                files on any device, from anywhere, free.</p>
            <button class="px-4 py-2 rounded-lg bg-primary text-black hover:bg-blue-500  hover:text-white border border-blue-600"
                    onclick="location.href='{{ url('/register') }}'">Register Now
            </button>
        </div>
    </div>
    <div class=" rounded rounded-lg  border border-primary mt-4">
    <table class="table-auto mt-5">
        <tr class="shadow-lg shadow-blue-700 mb-4 px-4 py-6 rounded rounded-lg">
            <td class="px-4 py-2">
                <img src="Images/IndexImage1.png" alt="Not found" class="w-32 mb-4">
                <h3 class="text-xl text-white font-bold mb-2">Store any File</h3>
                <p class="text-white text-base mb-4">Keep photos, stories, designs, drawings, recordings, videos, and
                    more. Your first 15 GB of storage are free.</p>
            </td>
            <td class="px-4 py-2">
                <img src="Images/IndexImage2.png" alt="Not found" class="w-32 mb-4">
                <h3 class="text-xl text-white font-bold mb-2">See your stuff anywhere</h3>
                <p class="text-white text-base mb-4">Your files in Fessage can be reached from any smartphone,
                    tablet, or computer.</p>
            </td>
            <td class="px-4 py-2">
                <img src="Images/IndexImage3.png" alt="Not found" class="w-32 mb-4">
                <h3 class="text-xl text-white font-bold mb-2">Share files and folders</h3>
                <p class="text-white text-base mb-4">You can quickly invite others to view, download, and collaborate
                    on all the files you want.</p>
            </td>
        </tr>
    </table>
    </div>
    <div class=" rounded rounded-lg  border border-primary mt-4 mb-4">
    <footer class="bg-gray-800 px-6 py-4 rounded rounded-lg mt-8">
        <div class="flex items-center justify-between rounded rounded-lg  border border-primary p-4">
            <img class="w-32" src="./Images/footerLogo.svg" alt="Logo">
            <div class="flex items-center">
                <label for="footerbutton" class="text-white mr-4">Ready to get started?</label>
                <button id="footerbutton" class="px-4 py-2 rounded-lg bg-primary text-black hover:bg-blue-500  hover:text-white  border border-primary "
                        onclick="location.href='{{ url('/register') }}'">Get Started
                </button>
            </div>
        </div>
        <div class="flex mt-4 rounded rounded-lg border border-primary p-2">
            <div class="w-1/3 px-4 py-2">
                <h4 class="text-xl font-bold text-white mb-2">Information</h4>
                <ul class="list-reset">
                    <li class="mb-2"><a href="#" class="text-white hover:text-blue-700">Contact Us</a></li>
                    <li class="mb-2"><a href="#" class="text-white hover:text-blue-700">About Us</a></li>
                    <li class="mb-2"><a href="#" class="text-white hover:text-blue-700">Privacy Policy</a></li>
                </ul>
            </div>
            <div class="w-1/3 px-4 py-2">
                <h4 class="text-xl font-bold text-white mb-2">Support</h4>
                <ul class="list-reset">
                    <li class="mb-2"><a href="#" class="text-white hover:text-blue-700">Help Center</a></li>
                    <li class="mb-2"><a href="#" class="text-white hover:text-blue-700">FAQ</a></li>
                </ul>
            </div>
            <div class="w-1/3 px-4 py-2 rounded rounded-lg border border-primary">
                <h4 class="text-xl font-bold text-white mb-2">Subscribe</h4>
                <input type="email" id="email"
                       class="px-2 py-2 rounded-lg w-full bg-gray-700 text-white placeholder-gray-500"
                       placeholder="Enter your email">
                <button class="px-4 py-2 mt-2 rounded-lg bg-primary text-black hover:bg-blue-500  hover:text-white border border-primary">Subscribe</button>
            </div>
        </div>
        <div class="mt-4 text-center text-gray-500">
            Copyright 2021 Fessage.com
        </div>
    </footer>
    </div>

</div>
</body>
