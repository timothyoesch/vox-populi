<div class="vpb-link-button flex gap-x-1 justify-end">
    <a href="{{$href}}" class="font-bold md:text-xl" {{$attributes}}>
        {{$label}}
    </a>
    <x-dynamic-component :component="'heroicon-o-chevron-' . $icon" class="w-6"/>
</div>
