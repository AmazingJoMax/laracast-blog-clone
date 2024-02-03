@props(['trigger'])

<div x-data="{ show: false }" @click.away="show=false" {{ $attributes->merge(['class'=>'relative']) }}>
    <div @click="show=!show">
        {{ $trigger }}
    </div>
    <div class="flex flex-col font-semibold text-sm py-2 leading-6 absolute bg-gray-100 rounded-xl mt-2 z-50 max-h-52 overflow-auto w-fit" x-show="show">  
        {{ $slot }}
    </div>
</div>