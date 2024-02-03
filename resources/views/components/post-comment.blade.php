@props(['comment'])

<x-panel class="flex flex-col bg-gray-100 rounded-xl">
    <article>
        <div class="flex">
            <img src="https://i.pravatar.cc/50" class="rounded-md" alt="avatar">
            <header class="ml-4 self-end">
                <h3 class="font-bold">{{ $comment->author->name }}</h3>
                <p class="text-xs">
                    Posted
                    <time>{{ $comment->created_at->format("F j, Y, g:i a") }}</time>
                </p>
            </header>
        </div>
        <div class="mt-2">
            <p>
                {{ $comment->body }}
            </p>
        </div>
    </article>
</x-panel>
