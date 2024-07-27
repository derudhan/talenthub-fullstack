<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>THNews - Portal Berita Terpercaya</title>
        <link rel="icon" href="{{ asset('images/icon.png') }}" type="image/svg+xml">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.10.2/dist/cdn.min.js" defer></script>
    </head>

    <body class="bg-gray-100 flex flex-col min-h-screen m-0 p-0 overflow-x-hidden">
        <!-- Header -->
        <div class="container mx-auto py-2">
            @include('partials.user.header', ['categories' => $categories])
        </div>

        <div class="container mx-auto py-4">
            <!-- For large screens -->
            <div class="hidden lg:grid grid-cols-12 gap-4 items-start">
                <!-- Main Content and Slider -->
                <main class="col-span-9">
                    @yield('content')
                </main>

                <!-- Sidebar -->
                <aside class="col-span-3 bg-gray-100 bg-opacity-85 divide-y divide-gray-100 text-gray-900 p-4 rounded-lg shadow-lg">
                    @include('partials.user.sidebar', ['popularNews' => $popularNews, 'randomNews' => $randomNews])
                </aside>
            </div>

            <!-- For small screens -->
            <div class="lg:hidden grid grid-cols-1 gap-4">
                <!-- Main Content and Slider -->
                <main>
                    @yield('content')
                </main>

                <!-- Sidebar -->
                <aside class="col-span-3 bg-gray-100 bg-opacity-85 divide-y divide-gray-100 text-gray-900 p-4 rounded-lg shadow-lg">
                    @include('partials.user.sidebar', ['popularNews' => $popularNews, 'categories' => $categories])
                </aside>
            </div>
        </div>

        <!-- Footer -->
        @include('partials.user.footer')

        <!-- Import Flowbite script -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.5.3/flowbite.min.js"></script>
    </body>

</html>
