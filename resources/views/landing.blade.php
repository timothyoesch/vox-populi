<x-frontend-layout>
    <div class="sellner-container mt-4">
        <div class="heroine-image relative">
            <div class="heroine-title absolute top-0 left-1/2 w-1/2 ml-auto h-full z-20 hidden md:flex flex-col justify-center">
                <h1>{{__("pages.landing.heroine.title.1")}}</h1>
                <h2>{{__("pages.landing.heroine.title.2")}}</h2>
            </div>
            <img src="/images/sellner_web.jpg" alt="" class="w-full">
        </div>
        <div class="heroine-title-mobile md:hidden flex flex-col justify-center mt-8">
            <h1>{{__("pages.landing.heroine.title.1")}}</h1>
            <h2 class="mt-2">{{__("pages.landing.heroine.title.2")}}</h2>
        </div>

        <div class="sellner-petition-content mt-4 md:mt-8">
            {{
                \Illuminate\Mail\Markdown::parse(file_get_contents(resource_path('content/petition.de.md')))
            }}
            <div id="support">
                <x-supporters.form />
            </div>
        </div>
    </div>
</x-frontend-layout>
