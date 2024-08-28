<x-frontend-layout>
    <x-container class="vpb-section h-screen flex items-center">
        <div>
            <h1 class="vpb-section__title">{{__("pages.supporter.verify_success.title")}}</h1>
            <p class="text-lg md:text-xl">{{__("pages.supporter.verify_success.content")}}</p>
            <div class="mt-8">
                <x-link-button :label="__('pages.supporter.verify_success.cta')" :href="'/'"/>
            </div>
        </div>
    </x-container>
</x-frontend-layout>
