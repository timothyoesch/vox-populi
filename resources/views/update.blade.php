<x-frontend-layout>
    <div class="appeal-container pt-4 md:pt-8">
        <a class="text-xl flex gap-2 mb-12" href="/"><x-heroicon-o-arrow-uturn-left class="h-6"/>{{__("pages.update.back")}}</a>
        <div class="appeal-update">
            {!!
                \Illuminate\Mail\Markdown::parse(
                    file_get_contents(resource_path('content/update.' . app()->getLocale() . '.md'))
                )
            !!}
        </div>
        <a href="/#{{__("pages.landing.cta.anchor")}}" class="mt-12 bg-foreground text-background font-inter font-black text-xl md:text-4xl !leading-none text-center uppercase w-full flex justify-center p-4">{{__("pages.landing.cta")}}</a>
        <style>
            .appeal-update h1 {
                font-size: 3.5rem;
                line-height: 1.1;
                margin-bottom: 2rem;
            }
            .appeal-update a {
                text-decoration: underline;
            }
        </style>
    </div>
</x-frontend-layout>
