<div class="nettonull-toggle py-3 px-2 md:py-5 md:px-4 border-t border-b border-accent">
	<div class="nettonull-toggle--title cursor-pointer flex justify-between text-accent">
        <p class="font-bold text-xl !leading-none">
            {{ $title }}
        </p>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
        </svg>
	</div>
    <div class="nettonull-toggle--content max-h-0 overflow-hidden">
        <div class="nettonull-toggle--content--inner pt-4">
            {{ $slot }}
        </div>
    </div>
</div>

