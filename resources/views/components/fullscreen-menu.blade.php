@php
    $menuItems = [
        ['anchor' => __("menu.participate.anchor"), 'label' => __("menu.participate.label"), "classes" => "text-highlight"],
        ['anchor' => __("menu.about.anchor"), 'label' => __("menu.about.label")],
        ['anchor' => __("menu.donate.anchor"), 'label' => __("menu.donate.label")],
        ['anchor' => __("menu.arguments.anchor"), 'label' => __("menu.arguments.label")],
        ['anchor' => __("menu.alliance.anchor"), 'label' => __("menu.alliance.label")]
    ];
@endphp

<div class="koref-fullscreen-menu w-full h-screen fixed top-0 left-0 z-10 bg-accent flex items-center text-white opacity-0 invisible">
    <div class="koref-fullscreen-menu__items koref-container relative z-20">
        @foreach ($menuItems as $item)
        <div class="koref-fullscreen-menu__item--container translate-y-12 opacity-0 w-full py-2 font-anton text-uppercase text-center bg-accent bg-opacity-50 backdrop-blur-sm uppercase {{ $item['classes'] ?? '' }}">
            <a href="#{{ $item['anchor'] }}" class="koref-fullscreen-menu__item">
                {{ $item['label'] }}
            </a>
        </div>
        @endforeach
    </div>
    <div class="koref-fullscreen-menu__lang-switch z-50">
        <a
            class="font-anton uppercase text-2xl underline block absolute bottom-4 right-4 md:bottom-16 md:right-16 -rotate-90 md:rotate-0"
            href="{{ app()->getLocale() == 'de' ? "https://referendum-correctif.ch" : "https://korrektur-referendum.ch" }}"
        >
            {{(app()->getLocale() == "de") ? "FR" : "DE"}}
        </a>
    </div>
    <div class="koref-fullscreen-menu__tag absolute top-0 left-0 w-full z-0">
        <div class="koref-container koref-container--large h-screen flex items-end">
            <div class="pb-8 opacity-10 text-white leading-[0.9]">
                <h1>{{__("logo.line1")}}</h1>
                <h1>{{__("logo.line2")}}</h1>
            </div>
        </div>
    </div>
</div>
