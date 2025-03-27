<x-frontend-layout>
    <x-heroine/>
    <div class="petition__container petition__container--small">
        <div class="petition__content__lead text-xl md:text-2xl">
            {!!
                \Illuminate\Mail\Markdown::parse(
                    file_get_contents(resource_path('content/lead.' . app()->getLocale() . '.md'))
                )
            !!}
        </div>
        <div class="petition__content__image">
            <img src="/images/header.jpg" alt="Bild der Lancierung der Volksinitiative «Stop F35»" class="aspect-video object-cover my-16"/>
        </div>
        <div class="petition__content__petition">
            {!!
                \Illuminate\Mail\Markdown::parse(
                    file_get_contents(resource_path('content/petition.' . app()->getLocale() . '.md'))
                )
            !!}
        </div>
        <div class="petition__content__form mt-12 md:mt-20" id="{{__("petition.form.anchor")}}">
            <h2 class="text-2xl md:text-4xl font-black uppercase">{{__("petition.form.title")}}</h2>
            <x-supporters.form/>
        </div>
        <div class="petition__content__supporters mt-12 md:mt-20">
            <h2 class="text-2xl md:text-4xl font-black uppercase">{{__("petition.organisations.title")}}</h2>
            <x-organisations/>
        </div>
    </div>
</x-frontend-layout>
