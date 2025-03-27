<div class="petition__heroine bg-foreground text-background mb-20">
    <div class="petition__container petition__container--large py-12 md:py-16">
        <p class="underline mb-2 text-xl md:text-4xl">{{__("petition.heroine.subtitle")}}</p>
        <h1 class="text-4xl md:text-7xl uppercase font-black">{{__("petition.heroine.title")}}</h1>
        <p class="mt-4 underl">{{__("petition.form.content", ["count" => number_format(\App\Models\Supporter::count(), 0, ",", "'")])}}</p>
        <a href="#{{__("petition.form.anchor")}}" class="petition__button mt-8 !bg-background !text-foreground text-xl md:text-4xl">
            {{__("petition.heroine.cta.text")}}
            <x-heroicon-o-pencil-square class="w-8 h-8 ml-2"/>
        </a>
    </div>
</div>
