<x-frontend-layout>
    <div class="appeal-container pt-4 md:pt-8">
        <a class="text-xl flex gap-2 mb-12" href="/"><x-heroicon-o-arrow-uturn-left class="h-6"/>{{__("pages.update.back")}}</a>
        {!!
            \Illuminate\Mail\Markdown::parse(
                file_get_contents(resource_path('content/update.' . app()->getLocale() . '.md'))
            )
        !!}
        <style>
            .appeal-container h1 {
                font-size: 3.5rem;
                line-height: 1.1;
                margin-bottom: 2rem;
            }
            .appeal-container a {
                text-decoration: underline;
            }
        </style>
    </div>
</x-frontend-layout>
