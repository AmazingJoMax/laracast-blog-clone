<x-layout>
    <x-setting heading="Publish New Post">
        <form action="/admin/posts" method="post" enctype="multipart/form-data">
            @csrf

            <x-form.input type="text" name="title" type="text" />
            <x-form.input type="text" name="slug" />
            <x-form.input type="text" name="excerpt" />
            <x-form.input type="file" name="thumbnail" id="" />
            <x-form.textarea name="body" type="text" />
            <select name="category_id" id="category_id">
                @php
                    $categories = \App\Models\Category::all()
                @endphp

                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ ucwords($category->name) }}</option>
                @endforeach
            </select>
            <x-form.button>Post</x-form.button>
            @error('category_id')
                <p class="text-xs text-red-500">{{ $message }}</p>
            @enderror
        </form>
    </x-setting>
</x-layout>