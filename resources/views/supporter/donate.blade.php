<x-frontend-layout>
    <div class="queer-container">
        <div class="min-h-screen flex flex-col justify-center">
            <div class="py-4 md:py-8 text-center text-2xl">
                <h1 class="text-7xl mb-8 font-black uppercase text-center leading-[0.6em]">{{__("pages.donate.title")}}</h1>
                    {!!
                \Illuminate\Mail\Markdown::parse(
                    file_get_contents(resource_path('content/donate.' . app()->getLocale() . '.md'))
                )
                    !!}
            </div>
            <div id="rnw-solution-embed-rgnsc" style="width: 100%; margin: 0 auto; max-width: 580px;"></div>
            <script type="module">
            import {SolutionEmbed} from "https://cdn.jsdelivr.net/npm/@raisenow/solution-embed@1/dist/index.js"
            SolutionEmbed.render("#rnw-solution-embed-rgnsc", {
                "url": "https://donate.raisenow.io/rgnsc?lng={{app()->getLocale()}}",
            })
            </script>
    </div>
</x-frontend-layout>
