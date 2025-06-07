<x-frontend-layout class="text-accent">
    <div class="koref-heroine bg-accent pt-6 md:pt-8 pb-32 md:pb-48">
        <x-navbar />
        <div class="koref-container koref-lead mt-12">
            <div class="koref-lead__content text-center">
                <x-boxed-title>
                    {!! __("pages.lead.title") !!}
                </x-boxed-title>
                <div class="koref-lead__subtitle text-white text-2xl md:text-3xl !leading-snug">
                    {!! md_html(resource_path("/content/" . app()->getLocale() . "/lead.md")) !!}
                </div>
            </div>
        </div>
    </div>
    <div class="koref-content -mt-20 md:-mt-32">
        <div class="koref-container">
            <div class="koref-pledge__form bg-highlight p-8">
                <h1 class="text-center text-3xl md:text-5xl">{{__("pages.pledge.title") }}</h1>
                <x-supporters.form />
            </div>
            <div class="mt-12 md:mt-20">
                <h1 class="text-3xl md:text-5xl">{{__("pages.about.title")}}</h1>
                <div class="mt-4 text-xl">
                    {!! md_html(resource_path("/content/" . app()->getLocale() . "/about.md")) !!}
                </div>
                <x-timeline/>
                <div class="mt-6 md:mt-12 text-xl">
                    {!! md_html(resource_path("/content/" . app()->getLocale() . "/about-end.md")) !!}
                </div>
            </div>
            <div class="mt-12 md:mt-20">
                <h1 class="text-3xl md:text-5xl">{{__("pages.arguments.title")}}</h1>
                <x-arguments.grid />
            </div>
            <div class="mt-12 md:mt-20">
                <h1 class="text-3xl md:text-5xl">{{__("pages.logos.title")}}</h1>
                <x-supporters.logos />
            </div>
        </div>
    </div>
</x-frontend-layout>
