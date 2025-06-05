<x-frontend-layout>
    <div class="queer-container">
        <div class="min-h-screen flex flex-col justify-center">
            <div class="py-4 md:py-8 text-center text-2xl">
                <h1 class="text-7xl mb-8 font-black uppercase text-center leading-[0.6em]">{{__("pages.success.title", ["name" => request()->name])}}</h1>
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
