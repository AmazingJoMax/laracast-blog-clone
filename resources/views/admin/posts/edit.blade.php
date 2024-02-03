<x-layout>
    <x-setting heading="Edit Post">
        <form action="/admin/posts/{{ $post->id }}" method="post" enctype="multipart/form-data">
            @csrf
            @method("PATCH")

            <x-form.input type="text" name="title" :value="old('title',$post->title)" />
            <x-form.input type="text" name="slug" :value="old('slug',$post->slug)"/>
            <x-form.input type="text" name="excerpt" :value="old('excerpt',$post->excerpt)" />
            <x-form.input type="file" name="thumbnail" id="" :value="old('thumbnail', $post->thumbnail)" />
            <img src="{{asset( 'storage/'. $post->thumbnail )}}" alt="Blog Post illustration" class="rounded-xl" width="100">
            <x-form.textarea name="body" type="text">{{ old('body',$post->body) }}</x-form.textarea>
            <select name="category_id" id="category_id">
                @php
                    $categories = \App\Models\Category::all()
                @endphp

                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id', $post->category->name) == $category->id ? 'selected' : '' }}>{{ ucwords($category->name) }}</option>
                @endforeach
            </select>
            <x-form.button>Update</x-form.button>
            @error('category_id')
                <p class="text-xs text-red-500">{{ $message }}</p>
            @enderror
        </form>
    </x-setting>
</x-layout>