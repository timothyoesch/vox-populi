<x-app-layout>
    <x-hero-section />

    <div class="ppf-landing-sections lg:flex gap-20 md:px-12 px-4 mt-12 mb-20 max-w-[1650px] mx-auto">
        <div class="ppf-landing-sections__section flex-1">
            <div class="pff-lead font-graph !leading-[1.15] md:text-5xl text-3xl text-accent flex-1">
                <p>{!! __("texts.landing.lead") !!}</p>
            </div>
            <div class="pff-content mt-6 text-xl md:text-3xl leading-[1.25]">
                {!! Illuminate\Support\Str::markdown(file_get_contents(resource_path('content/landing/' . app()->getLocale() . '.md'))) !!}
            </div>
        </div>
        <div class="ppf-landing-sections__section flex-1">
            <div class="ppf-landing__form-container lg:h-screen mt-12 lg:mt-0 sticky top-0 flex items-center">
                <div class="ppf-landing__form my-6 p-6 bg-accent w-full text-white h-fit">
                    <h2 class="md:text-5xl text-3xl font-graph mb-6">{{__("texts.form.title")}}</h2>
                    <form action="{{route("supporter.submit")}}" class="ppf-form" method="POST">
                        @csrf
                        <div class="ppf-form__group">
                            <label for="firstname" class="text-3xl">{{__("texts.form.firstname")}}</label>
                            <input type="text" name="firstname" id="firstname" class="ppf-input" required value="{{old("firstname")}}">
                            @if ($errors->has('firstname'))
                                <p class="text-red-500 text-sm">{{ $errors->first('firstname') }}</p>
                            @endif
                        </div>
                        <div class="ppf-form__group">
                            <label for="lastname" class="text-3xl">{{__("texts.form.lastname")}}</label>
                            <input type="text" name="lastname" id="lastname" class="ppf-input" required value="{{old("lastname")}}">
                            @if ($errors->has('lastname'))
                                <p class="text-red-500 text-sm">{{ $errors->first('lastname') }}</p>
                            @endif
                        </div>
                        <div class="ppf-form__group col-span-full">
                            <label for="email" class="text-3xl">{{__("texts.form.email")}}</label>
                            <input type="email" name="email" id="email" class="ppf-input" required value="{{old("email")}}">
                            @if ($errors->has('email'))
                                <p class="text-red-500 text-sm">{{ $errors->first('email') }}</p>
                            @endif
                        </div>
                        <div class="ppf-form__group">
                            <label for="phone" class="text-3xl">{{__("texts.form.phone")}}</label>
                            <input type="tel" name="phone" id="phone" class="ppf-input" placeholder="{{__("texts.optional")}}" value="{{old("phone")}}">
                            @if ($errors->has('phone'))
                                <p class="text-red-500 text-sm">{{ $errors->first('phone') }}</p>
                            @endif
                        </div>
                        <div class="ppf-form__group">
                            <label for="zip" class="text-3xl">{{__("texts.form.zip")}}</label>
                            <input type="text" name="zip" id="zip" class="ppf-input" placeholder="{{__("texts.optional")}}" value="{{old("zip")}}">
                            @if ($errors->has('zip'))
                                <p class="text-red-500 text-sm">{{ $errors->first('zip') }}</p>
                            @endif
                        </div>
                        <div class="ppf-form__group col-span-full ppf-form__group--checkbox -mb-2">
                            <input type="checkbox" name="public" id="public" class="ppf-input" value="1" checked>
                            <label for="public" class="text-3xl">{{__("texts.form.public")}}</label>
                            @if ($errors->has('public'))
                                <p class="text-red-500 text-sm">{{ $errors->first('public') }}</p>
                            @endif
                        </div>
                        <div class="ppf-form__group col-span-full ppf-form__group--checkbox">
                            <input type="checkbox" name="optin" id="optin" class="ppf-input" value="1">
                            <label for="optin" class="text-3xl">{!!__("texts.form.optin")!!}</label>
                            @if ($errors->has('optin'))
                                <p class="text-red-500 text-sm">{{ $errors->first('optin') }}</p>
                            @endif
                        </div>
                        <div class="ppf-form__group col-span-full">
                            <button type="submit" class="ppf-form__button">{{__("texts.form.submit")}}</button>
                        </div>

                        <input type="hidden" name="configuration_id" value="1">
                        <input type="hidden" name="locale" value="{{app()->getLocale()}}">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="ppf-footer md:px-12 px-4 lg:flex grid gap-y-3 justify-between items-end mb-6 max-w-[1650px] mx-auto">
        <div class="ppf-footer__logo">
            <x-juso-icon class="w-64"/>
        </div>
        <div class="ppf-footer__links flex flex-wrap gap-x-4 text-xl underline text-accent">
            <a href="mailto:info@juso.ch">{{__("texts.links.contact")}}</a>
            <a href="{{__("links.dataprotection")}}">{{__("texts.links.dataprotection")}}</a>
            <a href="{{__("links.homepage")}}">{{__("texts.links.homepage")}}</a>
        </div>
    </div>
</x-app-layout>
