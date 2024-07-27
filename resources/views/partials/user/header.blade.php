<nav class="bg-gray-100 rounded-lg border-gray-200 dark:bg-gray-900 relative z-10">
    <div class="container mx-auto flex flex-wrap items-center justify-between p-4 space-x-4">
        <a href="{{ url('/') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="{{ asset('images/icon.png') }}" class="h-6 md:h-8" alt="Flowbite Logo" />
            <span class="self-center text-lg md:text-2xl font-semibold whitespace-nowrap dark:text-white">THNews</span>
        </a>
        <div class="flex items-center space-x-4 md:order-2">
            <button type="button" aria-controls="search-bar" aria-expanded="false" class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5 md:hidden" id="search-toggle">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
                <span class="sr-only">Search</span>
            </button>
            <div class="relative hidden md:block" id="search-bar">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                    <span class="sr-only">Search icon</span>
                </div>
                <input type="text" id="search-navbar" class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search...">
            </div>
            @if (Auth::check())
                <div class="flex items-center">
                    <a href="{{ url('admin') }}" class="self-center text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">Dashboard</a>
                    <div class="relative flex items-center ms-3" x-data="{ open: false }">
                        <div>
                            <button @click="open = !open" type="button" class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" aria-expanded="false">
                                <span class="sr-only">Open user menu</span>
                                <img class="w-8 h-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo ? asset(Auth::user()->profile_photo) : 'https://via.placeholder.com/40' }}" alt="user photo">
                            </button>
                        </div>
                        <div x-show="open" @click.away="open = false" class="absolute right-0 w-48 bg-white rounded-md shadow-lg py-1 z-50 dark:bg-gray-700 dark:divide-gray-600" style="display: none; top: calc(100% + 0.5rem);">
                            <div class="px-4 py-3 border-b border-gray-200 dark:border-gray-600">
                                <p class="text-sm font-semibold text-gray-900 dark:text-white">{{ Auth::user()->name }}</p>
                            </div>
                            <ul class="py-1">
                                <form method="POST" action="{{ route('logout') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                    @csrf
                                    <button type="submit" class="flex items-center w-full text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                        <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1m0-10V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1" />
                                        </svg>
                                        <span class="ml-3">Logout</span>
                                    </button>
                                </form>
                            </ul>
                        </div>
                    </div>
                </div>
            @else
                <div class="flex justify-center align-middle">
                    <a href="{{ route('login') }}" class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">Login</a>
                </div>
            @endif
            <button type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" id="menu-toggle" aria-controls="navbar-menu" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
        </div>
    </div>
    <!-- Mobile menu -->
    <div class="fixed inset-x-0 top-16 z-50 hidden bg-white dark:bg-gray-800 md:hidden" id="mobile-menu">
        <ul class="flex flex-col font-medium p-4">
            <li>
                <a href="{{ url('/') }}" class="block py-2 px-3 text-white bg-blue-700 rounded dark:bg-blue-600" aria-current="page">Home</a>
            </li>
            @foreach ($categories->take(5) as $category)
                <li>
                    <a href="{{ route('category', ['category' => $category->name]) }}" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">{{ $category->name }}</a>
                </li>
            @endforeach
            @if ($categories->count() > 5)
                <li class="relative">
                    <button class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 flex items-center" id="more-categories-toggle-mobile">
                        Lainnya
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div class="hidden mt-2 space-y-2" id="more-categories-mobile">
                        @foreach ($categories->skip(5) as $category)
                            <a href="{{ route('category', ['category' => $category->name]) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-700">{{ $category->name }}</a>
                        @endforeach
                    </div>
                </li>
            @endif
            <li class="relative">
                <button class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 flex items-center" id="regions-toggle-mobile">
                    Wilayah
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div class="hidden mt-2 space-y-2" id="regions-menu-mobile">
                    @foreach ($regions as $region)
                        <a href="{{ route('region', ['region' => $region->name]) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-700">{{ $region->name }}</a>
                    @endforeach
                </div>
            </li>
        </ul>
    </div>
    <div id="search-container" class="fixed inset-x-0 top-16 z-50 hidden bg-white dark:bg-gray-800 md:hidden">
        <div class="p-4">
            <input type="text" class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search...">
        </div>
    </div>
</nav>
<nav>
    <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1 p-4" id="navbar-menu">
        <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-gray-100 dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
            <li>
                @if (request()->is('/'))
                    <a href="{{ url('/') }}" class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500 dark:bg-blue-600 md:dark:bg-transparent" aria-current="page">Home</a>
                @else
                    <a href="{{ url('/') }}" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Home</a>
                @endif
            </li>
            @foreach ($categories->take(5) as $category)
                <li>
                    @if (request()->is('category/' . $category->name))
                        <a href="{{ route('category', ['category' => $category->name]) }}" class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500 dark:bg-blue-600 md:dark:bg-transparent" aria-current="page">{{ $category->name }}</a>
                    @else
                        <a href="{{ route('category', ['category' => $category->name]) }}" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">{{ $category->name }}</a>
                    @endif
                </li>
            @endforeach
            @if ($categories->count() > 5)
                <li class="relative">
                    @if (request()->is('category/*'))
                        <button class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500 dark:bg-blue-600 md:dark:bg-transparent flex items-center" id="more-categories-toggle">
                            Lainnya
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                    @else
                        <button class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent flex items-center" id="more-categories-toggle">
                            Lainnya
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                    @endif
                    <div class="absolute z-10 hidden w-48 py-2 mt-2 bg-gray-100 border rounded-lg shadow-lg dark:bg-gray-800 dark:border-gray-700" id="more-categories">
                        @foreach ($categories->skip(5) as $category)
                            @if (request()->is('category/' . $category->name))
                                <a href="{{ route('category', ['category' => $category->name]) }}" class="block px-4 py-2 text-sm text-blue-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-700">{{ $category->name }}</a>
                            @else
                                <a href="{{ route('category', ['category' => $category->name]) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-700">{{ $category->name }}</a>
                            @endif
                        @endforeach
                    </div>
                </li>
            @endif
            <li class="relative">
                @if (request()->is('region/*'))
                    <button class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500 dark:bg-blue-600 md:dark:bg-transparent flex items-center" id="regions-toggle">
                        Wilayah
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                @else
                    <button class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent flex items-center" id="regions-toggle">
                        Wilayah
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                @endif
                <div class="absolute z-10 hidden w-48 py-2 mt-2 bg-gray-100 border rounded-lg shadow-lg dark:bg-gray-800 dark:border-gray-700" id="regions-menu">
                    @foreach ($regions as $region)
                        @if (request()->is('region/' . $region->name))
                            <a href="{{ route('region', ['region' => $region->name]) }}" class="block px-4 py-2 text-sm text-blue-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-700">{{ $region->name }}</a>
                        @else
                            <a href="{{ route('region', ['region' => $region->name]) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-700">{{ $region->name }}</a>
                        @endif
                    @endforeach
                </div>
            </li>
        </ul>
    </div>
</nav>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchToggle = document.getElementById('search-toggle');
        const menuToggle = document.getElementById('menu-toggle');
        const navbarMenu = document.getElementById('navbar-menu');
        const mobileMenu = document.getElementById('mobile-menu');
        const moreCategoriesToggleMobile = document.getElementById('more-categories-toggle-mobile');
        const moreCategoriesMobile = document.getElementById('more-categories-mobile');
        const regionsToggleMobile = document.getElementById('regions-toggle-mobile');
        const regionsMenuMobile = document.getElementById('regions-menu-mobile');
        const moreCategoriesToggle = document.getElementById('more-categories-toggle');
        const moreCategories = document.getElementById('more-categories');
        const regionsToggle = document.getElementById('regions-toggle');
        const regionsMenu = document.getElementById('regions-menu');
        const searchContainer = document.getElementById('search-container');

        searchToggle.addEventListener('click', function() {
            navbarMenu.classList.add('hidden');
            mobileMenu.classList.add('hidden');
        });

        searchToggle.addEventListener('click', function() {
            searchContainer.classList.toggle('hidden');
            navbarMenu.classList.add('hidden');
            mobileMenu.classList.add('hidden');
        });

        menuToggle.addEventListener('click', function() {
            mobileMenu.classList.toggle('hidden');
            navbarMenu.classList.add('hidden');
        });

        moreCategoriesToggle.addEventListener('click', function(event) {
            moreCategories.classList.toggle('hidden');
            regionsMenu.classList.add('hidden');
        });

        regionsToggle.addEventListener('click', function(event) {
            regionsMenu.classList.toggle('hidden');
            moreCategories.classList.add('hidden');
        });

        moreCategoriesToggleMobile.addEventListener('click', function(event) {
            moreCategoriesMobile.classList.toggle('hidden');
            regionsMenuMobile.classList.add('hidden');
        });

        regionsToggleMobile.addEventListener('click', function(event) {
            regionsMenuMobile.classList.toggle('hidden');
            moreCategoriesMobile.classList.add('hidden');
        });

        document.addEventListener('click', function(event) {
            if (!event.target.closest('#more-categories-toggle') && !event.target.closest('#more-categories')) {
                moreCategories.classList.add('hidden');
            }
            if (!event.target.closest('#regions-toggle') && !event.target.closest('#regions-menu')) {
                regionsMenu.classList.add('hidden');
            }
            if (!event.target.closest('#more-categories-toggle-mobile') && !event.target.closest('#more-categories-mobile')) {
                moreCategoriesMobile.classList.add('hidden');
            }
            if (!event.target.closest('#regions-toggle-mobile') && !event.target.closest('#regions-menu-mobile')) {
                regionsMenuMobile.classList.add('hidden');
            }
            if (!event.target.closest('#search-toggle') && !event.target.closest('#search-container')) {
                searchContainer.classList.add('hidden');
            }
        });
    });
</script>
