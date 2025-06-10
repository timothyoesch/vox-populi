@php
    $events = [2008,2016,2018,2021,2022,2023,2025];
@endphp

<div class="koref-timeline mt-6 md:mt-12">
    @foreach ($events as $event)
        <div class="koref-timeline__event">
            <div class="koref-timeline-date col-span-3 md:col-span-2 flex gap-2 md:gap-3 items-center h-fit">
                <div class="h-4 aspect-square rounded-full bg-accent"></div>
                <span class="text-3xl md:text-4xl font-anton">{{$event}}</span>
            </div>
            <div class="koref-timeline-content col-span-7 md:col-span-8">
                {!! md_html(resource_path("/content/". app()->getLocale() . "/thierry-" . env("THIERRY") . "/timeline/" . $event . ".md")) !!}
            </div>
            <div class="koref-timeline__event__line"></div>
        </div>
    @endforeach
</div>
