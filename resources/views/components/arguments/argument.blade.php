<div class="koref-arguments__argument border-t-2 border-b-2 border-accent py-4 md:py-6">
    <p class="koref-arguments__argument-title text-xl md:text-2xl font-bold flex gap-x-4 justify-between items-center cursor-pointer">
        <span>{{ $title }}</span>
        <x-heroicon-o-chevron-down class="h-6 md:h-8 mr-2 shrink-0"/>
    </p>
    <div class="koref-arguments__argument-content--container max-h-0 overflow-hidden">
        <div class="koref-arguments__argument-content py-4 opacity-0 translate-y-4">
            {!! $slot !!}
        </div>
    </div>
</div>
