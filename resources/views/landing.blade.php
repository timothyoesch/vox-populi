<x-frontend-layout>
    <div class="appeal-container pt-4 md:pt-8">
        <div class="appeal-header">
            <div class="bg-foreground p-4 text-background mb-12">
                <p class="text-lg md:text-2xl font-inter font-bold !leading-tight">{{__("pages.landing.intro")}}</p>
            </div>
            {{-- <h1 class="appeal-header__title">{!!__("pages.landing.title")!!}</h1> --}}
            <p class="appeal-header__lead font-bold text-3xl md:text-6xl !leading-tight">{!! __("pages.landing.lead") !!}</p>
            <a href="#{{__("pages.landing.cta.anchor")}}" class="mt-12 bg-foreground text-background font-inter font-black text-xl md:text-4xl !leading-none text-center uppercase w-full flex justify-center p-4">{{__("pages.landing.cta")}}</a>
        </div>
        <div class="appeal-content py-20">
            {!!
                \Illuminate\Mail\Markdown::parse(
                    file_get_contents(resource_path('content/petition.' . app()->getLocale() . '.md'))
                )
            !!}
            <div id="{{__("pages.landing.cta.anchor")}}" class="pt-12">
                <h2>{{__("pages.landing.supporters.title")}}</h2>
                <p>{{__("pages.landing.supporters.lead", ["count" => \App\Models\Supporter::count()])}}</p>
                <x-supporters.form />
            </div>
            <div class="appeal-content__credits mt-24 text-center">
                <a href="https://gsoa.ch" target="_blank">
                    <span class="text-sm !leading-tight">{{__("pages.landing.credits")}}</span>
                    <x-dynamic-component :component="'Logo.' . app()->getLocale()" class="mt-8 max-w-96 mx-auto" />
                </a>
            </div>
        </div>
    </div>
</x-frontend-layout>
