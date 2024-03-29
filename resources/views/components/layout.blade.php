<!doctype html>

<title>Laravel From Scratch Blog</title>
{{-- <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet"> --}}
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.13.3/cdn.js" integrity="sha512-x6oUSDeai/Inb/9HFvbrBtDOnLvFSd37f6j2tKRePhFBLYAezejnN5xgG52M20rnFN66+6EWwuFwAneEXyq6oA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<style>
    html{
        scroll-behavior: smooth;
    }
</style>

<body style="font-family: Open Sans, sans-serif">
    <section class="px-6 py-8">
        <nav class="md:flex md:justify-between md:items-center relative">
            <div>
                <a href="/">
                    <img src="/images/logo.svg" alt="Laracasts Logo" width="165" height="16">
                </a>
            </div>
            
            <div class="flex items-center mt-8 md:mt-0">
                @guest
                    <a href="/register" class="text-xs font-bold uppercase mx-4">Register</a>
                    <a href="/login" class="text-xs font-bold uppercase">Login</a>
                @endguest
                <a href="#newsletter" class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                    Subscribe for Updates
                </a>
                
                @auth
                <x-dropdown class="px-6">
                    <x-slot name="trigger">
                        <x-user.img />
                    </x-slot>
                    @can('admin')
                        <x-dropdown-item href="/admin/posts">Dashboard</x-dropdown-item>
                    @endcan
                    <x-dropdown-item x-data="{}" @click.prevent="document.querySelector('#logout-form').submit()">Logout</x-dropdown-item>
                    <form id="logout-form" action="/logout" method="POST" hidden>
                        @csrf
                    </form>
                </x-dropdown>
                @endauth
            </div>
        </nav>

        {{ $slot }}

        <footer id="newsletter" class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
            <img src="/images/lary-newsletter-icon.svg" alt="" class="mx-auto -mb-6" style="width: 145px;">
            <h5 class="text-3xl">Stay in touch with the latest posts</h5>
            <p class="text-sm mt-3">Promise to keep the inbox clean. No bugs.</p>

            <div class="mt-10">
                <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">

                    <form method="POST" action="/newsletter" class="lg:flex text-sm">
                        @csrf
                        <div class="lg:py-3 lg:px-5 flex items-center">
                            <label for="email" class="hidden lg:inline-block">
                                <img src="/images/mailbox-icon.svg" alt="mailbox letter">
                            </label>

                            <input id="email" name="email" type="text" placeholder="Your email address"
                                   class="lg:bg-transparent py-2 lg:py-0 pl-4 focus-within:outline-none">
                        </div>
                        @error('email')
                            <span class="text-xs text-red-500 text-center flex items-center">{{ $message }}</span>
                        @enderror

                        <button type="submit"
                                class="transition-colors duration-300 bg-blue-500 hover:bg-blue-600 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8"
                        >
                            Subscribe
                        </button>
                    </form>
                </div>
            </div>
            @if (session()->has('success'))
                <div x-data="{ isVisible: true }"
                     x-init="setTimeout(() => { isVisible = false }, 5000)"
                     x-show.transition.duration.1000ms="isVisible"
                     class="fixed bottom-3 right-3 bg-blue-500 text-white py-2 px-4 rounded-xl">
                    <p>{{ session('success') }}</p>
                </div>
                
            @endif
        </footer>
    </section>
</body>
