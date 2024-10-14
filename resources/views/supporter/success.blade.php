<x-frontend-layout>
    <div class="appeal-container">
        <div class="min-h-screen flex flex-col justify-center">
            <div class="py-4 md:py-8">
                <h1 class="text-4xl mb-8">{{__("pages.success.title", ["name" => request()->name])}}</h1>
                {!!
                    \Illuminate\Mail\Markdown::parse(
                        file_get_contents(resource_path('content/thanks.' . app()->getLocale() . '.md'))
                    )
                !!}
                <div class="mt-8">
                    <x-share-buttons />
                </div>
            </div>
        </div>
    </div>
</x-frontend-layout>
