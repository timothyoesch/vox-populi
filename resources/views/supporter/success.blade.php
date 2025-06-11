<x-frontend-layout class="text-accent">
    <div class="koref-container">
        <div class="min-h-screen flex flex-col justify-center">
            <div class="py-4 md:py-8 text-center text-2xl">
                {!!
                    md_html(
                        resource_path("/content/" . app()->getLocale() . "/thierry-" . env("THIERRY") . '/thanks.md'),
                    )
                !!}
                <div class="mt-8">
                    <x-share-buttons />
                </div>
            </div>
        </div>
    </div>
</x-frontend-layout>
