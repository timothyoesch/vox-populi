<x-frontend-layout class="text-accent">
    <div class="koref-heroine bg-accent pt-6 md:pt-8 pb-32 md:pb-48">
        <x-navbar />
        <div class="koref-container koref-lead mt-12">
            <div class="koref-lead__content text-center">
                <x-boxed-title>
                    {!! __("pages.lead.title") !!}
                </x-boxed-title>
                <div class="koref-lead__subtitle text-white text-2xl md:text-3xl !leading-snug">
                    {!! md_html(resource_path("/content/" . app()->getLocale() . "/thierry-" . env("THIERRY") . "/lead.md")) !!}
                </div>
            </div>
        </div>
    </div>
    <div class="koref-content -mt-20 md:-mt-32">
        <div class="koref-container" id="{{__("menu.participate.anchor")}}">
            <div class="koref-pledge__form bg-highlight p-4 md:p-8">
                <h1 class="text-center text-3xl md:text-5xl">{{__("pages.pledge.title") }}</h1>
                <x-supporters.form />
            </div>
            <div class="pt-12 md:pt-20" id="{{__("menu.about.anchor")}}">
                <h1 class="text-3xl md:text-5xl">{{__("pages.about.title")}}</h1>
                <div class="mt-4 text-xl">
                    {!! md_html(resource_path("/content/" . app()->getLocale() . "/thierry-" . env("THIERRY") . "/about.md")) !!}
                </div>
                <x-timeline/>
                <div class="mt-6 md:mt-12 text-xl">
                    {!! md_html(resource_path("/content/" . app()->getLocale() . "/thierry-" . env("THIERRY") . "/about-end.md")) !!}
                </div>
            </div>
            <div class="pt-12 md:pt-20" id="{{__("menu.donate.anchor")}}">
                <h1 class="text-3xl md:text-5xl">{{__("pages.donate.title")}}</h1>
                <div class="mt-4 text-xl">
                    {!! md_html(resource_path("/content/" . app()->getLocale() . "/thierry-" . env("THIERRY") . "/donate.lander.md")) !!}
                </div>
                <x-donation-form />
            </div>
            <div class="pt-12 md:pt-20" id="{{__("menu.arguments.anchor")}}">
                <h1 class="text-3xl md:text-5xl">{{__("pages.arguments.title")}}</h1>
                <x-arguments.grid />
            </div>
            <div class="pt-12 md:pt-20" id="{{__("menu.alliance.anchor")}}">
                <h1 class="text-3xl md:text-5xl">{{__("pages.logos.title")}}</h1>
                <x-supporters.logos />
            </div>
        </div>
    </div>
</x-frontend-layout>
