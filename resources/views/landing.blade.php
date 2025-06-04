<x-frontend-layout>
    <div class="queer-container queer-container--large mt-12">
        <x-app-icon />
    </div>
    <div class="queer-container mt-12 mb-24">
        <div class="queer__content__petition text-3xl leading-normal">
            {!!
                \Illuminate\Mail\Markdown::parse(
                    file_get_contents(resource_path('content/appeal.' . app()->getLocale() . '.md'))
                )
            !!}
        </div>
        <div class="queer__content__form mt-24 md:mt-20" id="{{__("petition.form.anchor")}}">
            <h2 class="text-center text-7xl mb-6">{{__("petition.form.title")}}</h2>
            <x-supporters.form/>
        </div>
        <div class="queer__content__form mt-24 md:mt-20" id="{{__("petition.form.anchor")}}">
            <h2 class="text-center text-7xl mb-6">{{__("petition.supporters.by")}}</h2>
            <picture>
              <source
                type="image/avif"
                srcset="images/organisations/de/los-100.avif?width=100 100w, images/organisations/de/los-200.avif?width=200 200w, images/organisations/de/los-400.avif?width=400 400w, images/organisations/de/los-800.avif?width=800 800w" />
              <source
                type="image/webp"
                srcset="images/organisations/de/los-100.webp?width=100 100w, images/organisations/de/los-200.webp?width=200 200w, images/organisations/de/los-400.webp?width=400 400w, images/organisations/de/los-800.webp?width=800 800w" />
              <img
                src="images/organisations/de/los.png"
                srcset="images/organisations/de/los-100.png?width=100 100w, images/organisations/de/los-200.png?width=200 200w, images/organisations/de/los-400.png?width=400 400w, images/organisations/de/los-800.png?width=800 800w"
                sizes="(max-width: 800px) 100vw, 50vw"
                style="width: 100%; aspect-ratio: 2.049335863377609"
                loading="lazy"
                decoding="async"
                alt="My awesome image"
                class="max-w-lg mx-auto mb-12"
              />
            </picture>
            <h3 class="text-center text-5xl mb-6">{{__("petition.supporters.cofounded")}}</h3>
            <div class="queer__content__cofounders grid grid-cols-2 md:grid-cols-2 gap-6">
                <picture>
                    <source
                      type="image/avif"
                      srcset="images/organisations/de/tgns-100.avif?width=100 100w, images/organisations/de/tgns-200.avif?width=200 200w, images/organisations/de/tgns-400.avif?width=400 400w, images/organisations/de/tgns-800.avif?width=800 800w" />
                    <source
                      type="image/webp"
                      srcset="images/organisations/de/tgns-100.webp?width=100 100w, images/organisations/de/tgns-200.webp?width=200 200w, images/organisations/de/tgns-400.webp?width=400 400w, images/organisations/de/tgns-800.webp?width=800 800w" />
                    <img
                      src="images/organisations/de/tgns.png"
                      srcset="images/organisations/de/tgns-100.png?width=100 100w, images/organisations/de/tgns-200.png?width=200 200w, images/organisations/de/tgns-400.png?width=400 400w, images/organisations/de/tgns-800.png?width=800 800w"
                      sizes="(max-width: 800px) 100vw, 50vw"
                      style="width: 100%; aspect-ratio: 1"
                      loading="lazy"
                      decoding="async"
                      alt="My awesome image"
                    />
                </picture>
                <picture>
                    <source
                      type="image/avif"
                      srcset="images/organisations/de/PinkCross-100.avif?width=100 100w, images/organisations/de/PinkCross-200.avif?width=200 200w, images/organisations/de/PinkCross-400.avif?width=400 400w, images/organisations/de/PinkCross-800.avif?width=800 800w" />
                    <source
                      type="image/webp"
                      srcset="images/organisations/de/PinkCross-100.webp?width=100 100w, images/organisations/de/PinkCross-200.webp?width=200 200w, images/organisations/de/PinkCross-400.webp?width=400 400w, images/organisations/de/PinkCross-800.webp?width=800 800w" />
                    <img
                      src="images/organisations/de/PinkCross.png"
                      srcset="images/organisations/de/PinkCross-100.png?width=100 100w, images/organisations/de/PinkCross-200.png?width=200 200w, images/organisations/de/PinkCross-400.png?width=400 400w, images/organisations/de/PinkCross-800.png?width=800 800w"
                      sizes="(max-width: 800px) 100vw, 50vw"
                      style="width: 100%; aspect-ratio: 1"
                      loading="lazy"
                      decoding="async"
                      alt="My awesome image"
                    />
                </picture>
                <picture>
                    <source
                      type="image/avif"
                      srcset="images/organisations/de/InterAction-100.avif?width=100 100w, images/organisations/de/InterAction-200.avif?width=200 200w, images/organisations/de/InterAction-400.avif?width=400 400w, images/organisations/de/InterAction-800.avif?width=800 800w" />
                    <source
                      type="image/webp"
                      srcset="images/organisations/de/InterAction-100.webp?width=100 100w, images/organisations/de/InterAction-200.webp?width=200 200w, images/organisations/de/InterAction-400.webp?width=400 400w, images/organisations/de/InterAction-800.webp?width=800 800w" />
                    <img
                      src="images/organisations/de/InterAction.png"
                      srcset="images/organisations/de/InterAction-100.png?width=100 100w, images/organisations/de/InterAction-200.png?width=200 200w, images/organisations/de/InterAction-400.png?width=400 400w, images/organisations/de/InterAction-800.png?width=800 800w"
                      sizes="(max-width: 800px) 100vw, 50vw"
                      style="width: 100%; aspect-ratio: 1"
                      loading="lazy"
                      decoding="async"
                      alt="My awesome image"
                    />
                </picture>
            </div>
        </div>
    </div>
</x-frontend-layout>
