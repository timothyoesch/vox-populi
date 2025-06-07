<div class="koref-arguments__argument border-t-2 border-b-2 border-accent py-2 md:py-4">
    <p class="koref-arguments__argument-title text-xl md:text-2xl font-bold flex justify-between items-center cursor-pointer">
        <span>{{ $title }}</span>
        <x-heroicon-o-chevron-down class="h6 md:h-8 mr-2"/>
    </p>
    <div class="koref-arguments__argument-content--container max-h-0 overflow-hidden">
        <div class="koref-arguments__argument-content text-xl pt-4 opacity-0 translate-y-4">
            {!! $slot !!}
        </div>
    </div>
</div>
