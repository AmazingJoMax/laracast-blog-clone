<x-layout>
    @include('posts/_header')
    <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
        <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
            <div class="col-span-4 lg:text-center lg:pt-14 mb-10">
                <img src="/images/illustration-1.png" alt="" class="rounded-xl">

                <p class="mt-4 block text-gray-400 text-xs">
                    Published <time>{{ $post->created_at->diffForHumans() }}</time>
                </p>

                <div class="flex items-center lg:justify-center text-sm mt-4">
                    <img src="/images/lary-avatar.svg" alt="Lary avatar">
                    <div class="ml-3 text-left">
                        <a href="/?author={{ $post->author->username }}" class="font-bold">{{ $post->author->name }}</a>
                    </div>
                </div>
            </div>

            <div class="col-span-8">
                <div class="hidden lg:flex justify-between mb-6">
                    <a href="/"
                        class="transition-colors duration-300 relative inline-flex items-center text-lg hover:text-blue-500">
                        <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                            <g fill="none" fill-rule="evenodd">
                                <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                </path>
                                <path class="fill-current"
                                    d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                                </path>
                            </g>
                        </svg>

                        Back to Posts
                    </a>
                    <x-category-tag :category="$post->category" />
                </div>

                <h1 class="font-bold text-3xl lg:text-4xl mb-10">
                    {{ $post->title }}
                </h1>

                <div class="space-y-4 lg:text-lg leading-loose">
                    <p>{!! $post->body !!}</p>
                </div>
            </div>

            <section class="col-span-8 col-start-5 mt-8 space-y-4">
                @auth
                    <x-panel>
                        <form action="/posts/{{ $post->id }}/comment" method="post">
                            @csrf
                            <header class="flex items-center">
                                <img src="https://i.pravatar.cc/50" class="rounded-md mr-4" alt="avatar">
                                <h2>want to participate? </h2>
                            </header>
                            <div class="mt-6">
                                <textarea name="body" class="w-full text-sm focus:outline-none focus:ring p-4" cols="30" rows="10" placeholder="Drop your thoughts on this" required></textarea>
                            </div>
                            <x-form.button>Post</x-form.button>                    
                        </form>
                    </x-panel>
                @else
                    <p class="font-semibold"><a href="/register" class="hover:underline">Register</a> or <a href="/login" class="hover:underline">Login</a> to leave a comment</p>
                @endauth
                @foreach ($comments as $comment)                    
                    <x-post-comment :comment="$comment"/>
                @endforeach
            </section>
        </article>
    </main>
</x-layout>