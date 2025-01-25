@php
    $configuration = \App\Models\Configuration::where("key", "=", request()->s)->first() ?? \App\Models\Configuration::first();
@endphp

<div class="nettonull-cta mt-8">
    <div class="nettonull-cta__form--container">
        <form action="{{route("supporter.submit")}}" method="POST" class="nettonull-cta__form grid md:grid-cols-2 gap-8 mt-4">
            @csrf
            <div class="nettonull-cta__form__fieldgroup">
                <label for="firstname" class="nettonull-cta__form__fieldgroup__label">{{__("pages.landing.supporters.form.firstname")}}</label>
                <input type="text" name="firstname" id="firstname" class="nettonull-cta__form__fieldgroup__text" required>
            </div>
            <div class="nettonull-cta__form__fieldgroup">
                <label for="lastname" class="nettonull-cta__form__fieldgroup__label">{{__("pages.landing.supporters.form.lastname")}}</label>
                <input type="text" name="lastname" id="lastname" class="nettonull-cta__form__fieldgroup__text" required>
            </div>
            <div class="nettonull-cta__form__fieldgroup col-span-full">
                <label for="email" class="nettonull-cta__form__fieldgroup__label">{{__("pages.landing.supporters.form.email")}}</label>
                <input type="email" name="email" id="email" class="nettonull-cta__form__fieldgroup__text" required>
            </div>
            <div class="nettonull-cta__form__fieldgroup">
                <label for="zip" class="nettonull-cta__form__fieldgroup__label">{{__("pages.landing.supporters.form.zip")}}</label>
                <input type="text" name="zip" id="zip" class="nettonull-cta__form__fieldgroup__text" required>
            </div>
            <div class="nettonull-cta__form__fieldgroup">
                <label for="phone" class="nettonull-cta__form__fieldgroup__label">{{__("pages.landing.supporters.form.phone")}}</label>
                <input type="text" name="phone" id="phone" class="nettonull-cta__form__fieldgroup__text" placeholder="{{__("pages.landing.supporters.form.placeholders.optional")}}">
            </div>
            <div class="nettonull-cta__form__fieldgroup nettonull-cta__form__fieldgroup--checkbox col-span-full">
                <input type="checkbox" name="optin" id="optin" class="nettonull-cta__form__checkbox" value="1">
                <label for="optin" class="nettonull-cta__form__fieldgroup__label">
                    {!! $configuration->dataprotectiondisclaimer[app()->getLocale()] !!}
                </label>
            </div>
            <div class="nettonull-cta__form__fieldgroup col-span-full flex justify-end">
                <button type="submit" class="nettonull-cta__form__fieldgroup__submit">{{__("pages.landing.supporters.form.submit")}}</button>
            </div>
            <input type="hidden" name="locale" value="{{app()->getLocale()}}">
            <input type="hidden" name="configuration_id" value="{{$configuration->id}}">
        </form>
    </div>
</div>
