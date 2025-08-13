<x-frontend-layout>
    <div class="vapko-container mt-4 mb-2">
        @php
            $langs = ["de", "fr", "it"];
            $langs = array_filter($langs, fn($lang) => $lang != app()->getLocale());
        @endphp
        <div class="flex gap-1 text-vapkored">
            @foreach($langs as $lang)
                <a href="/{{ $lang }}" class="text-sm underline">{{ strtoupper($lang) }}</a>
                @if (!$loop->last)
                    <span class="text-sm">|</span>
                @endif
            @endforeach
        </div>
    </div>
    <div class="vapko-container mt-6 mb-2 lg:mb-6">
        <div class="vapko-heroine lg:grid items-end lg:grid-cols-12 gap-6">
            <div class="vapko-heroine--title lg:col-span-8 lg:-mb-24">
                <x-app-icon class="w-36 md:w-44 lg:w-52 mb-4" />
                <h1 class="text-5xl lg:text-6xl font-bold">{{__("pages.landing.title")}}</h1>
                <div class="grid grid-cols-12">
                    <p class="col-span-8 mt-4 text-2xl lg:text-4xl">{{__("pages.landing.subtitle")}}</p>
                    <img src="/images/mushrooms/A.muscaria.png" alt="Image of a mushroom" class="col-span-4 hidden lg:block">
                </div>
            </div>
            <div class="vapko-heroine--form col-span-1 lg:col-span-4 mt-12 lg:mt-0">
                <div class="bg-vapkogreen p-4 text-white">
                    <h1 class="text-3xl md:text-4xl">{{__("pages.landing.form.title")}}</h1>
                    <x-supporters.form/>
                </div>
            </div>
            <div class="grid lg:hidden grid-cols-5 md:grid-cols-8">
                <img src="/images/mushrooms/A.muscaria.png" alt="Image of a mushroom" class="col-span-2 col-start-4 md:col-start-7 -mt-[10%] -mb-[66%] relative z-30">
            </div>
        </div>
    </div>
    <div class="vapko-divider h-24 bg-vapkored"></div>
    <div class="vapko-content bg-vapkobeige">
        <div class="vapko-container grid grid-cols-6 gap-12">
            <div class="vapko-content--petition col-span-full lg:col-span-3 relative">
                <div class="vapko-content--petition--container bg-white p-8 md:p-12 text-2xl lg:text-3xl shadow-2xl -mt-6 -mb-6 !leading-relaxed relative z-10">
                    {!! md_html(resource_path("/content/" . app()->getLocale() . "/petition.md")) !!}
                    <a href="{{__("pages.landing.download.href")}}" class="underline mt-6 text-vapkored" target="_blank">{{__("pages.landing.download")}}</a>
                    <div class="vapko-content--images col-span-6 lg:hidden grid grid-rows-4 h-full absolute top-0 left-0 right-0 bottom-0 -z-10 opacity-20 blur-sm">
                        <div class="bg-contain bg-no-repeat bg-center" style="background-image: url('/images/mushrooms/B.edulis.png')"></div>
                        <div class="bg-contain bg-no-repeat bg-center" style="background-image: url('/images/mushrooms/A.archeri.png')"></div>
                        <div class="bg-contain bg-no-repeat bg-center" style="background-image: url('/images/mushrooms/M.conica.png')"></div>
                        <div class="bg-contain bg-no-repeat bg-center" style="background-image: url('/images/mushrooms/A.phalloides.png')"></div>
                    </div>
                </div>
            </div>
            <div class="vapko-content--images col-span-3 hidden lg:grid grid-rows-4 h-full">
                <div class="bg-contain bg-no-repeat bg-center" style="background-image: url('/images/mushrooms/B.edulis.png')"></div>
                <div class="bg-contain bg-no-repeat bg-center" style="background-image: url('/images/mushrooms/A.archeri.png')"></div>
                <div class="bg-contain bg-no-repeat bg-center" style="background-image: url('/images/mushrooms/M.conica.png')"></div>
                <div class="bg-contain bg-no-repeat bg-center -mb-12" style="background-image: url('/images/mushrooms/A.phalloides.png')"></div>
            </div>
        </div>
    </div>
    <div class="bg-vapkogreen h-24"></div>
    <div class="vapko-credits mt-12">
        <div class="vapko-container">
            <p class="font-bold text-4xl text-center">{{__("pages.landing.credits")}}</p>
            <div class="grid grid-cols-3 gap-4 md:gap-8 lg:gap-12 mt-12 items-end">
                <img src="/images/mushrooms/C.violaceus-2.png" alt="Image of a mushroom">
                <a class="h-full flex items-center" href="https://www.vapko.ch/index.php/{{app()->getLocale()}}">
                    <x-app-icon class="w-full" />
                </a>
                <img src="/images/mushrooms/A.muscaria-2.png" alt="Image of a mushroom">
            </div>
        </div>
    </div>
</x-frontend-layout>
