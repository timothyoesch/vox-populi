@php
    $configuration = \App\Models\Configuration::where("key", "=", request()->s)->first() ?? \App\Models\Configuration::first();
@endphp

<div class="appeal-cta mt-8">
    <div class="appeal-cta__form--container">
        <form action="{{route("supporter.submit")}}" method="POST" class="appeal-cta__form grid md:grid-cols-2 gap-8 mt-4">
            @csrf
            @if($errors->has("cf-turnstile-response"))
                <div class="appeal-cta__form__fieldgroup__error bg-red-200 text-red-800 p-2 rounded mt-2 col-span-full">
                    {{ $errors->first("cf-turnstile-response") }}
                </div>
            @endif
            <div class="appeal-cta__form__fieldgroup">
                <label for="firstname" class="appeal-cta__form__fieldgroup__label">{{__("pages.landing.supporters.form.firstname")}}</label>
                <input type="text" name="firstname" id="firstname" class="appeal-cta__form__fieldgroup__text" required value="{{old("firstname")}}">
                @if($errors->has("firstname"))
                    <div class="appeal-cta__form__fieldgroup__error bg-red-200 text-red-800 p-2 rounded mt-2">
                        {{ $errors->first("firstname") }}
                    </div>
                @endif
            </div>
            <div class="appeal-cta__form__fieldgroup">
                <label for="lastname" class="appeal-cta__form__fieldgroup__label">{{__("pages.landing.supporters.form.lastname")}}</label>
                <input type="text" name="lastname" id="lastname" class="appeal-cta__form__fieldgroup__text" required value="{{old("lastname")}}">
                @if($errors->has("lastname"))
                    <div class="appeal-cta__form__fieldgroup__error bg-red-200 text-red-800 p-2 rounded mt-2">
                        {{ $errors->first("lastname") }}
                    </div>
                @endif
            </div>
            <div class="appeal-cta__form__fieldgroup">
                <label for="zip" class="appeal-cta__form__fieldgroup__label">{{__("pages.landing.supporters.form.zip")}}</label>
                <input type="text" name="zip" id="zip" class="appeal-cta__form__fieldgroup__text" required value="{{old("zip")}}">
                @if($errors->has("zip"))
                    <div class="appeal-cta__form__fieldgroup__error bg-red-200 text-red-800 p-2 rounded mt-2">
                        {{ $errors->first("zip") }}
                    </div>
                @endif
            </div>
            <div class="appeal-cta__form__fieldgroup">
                <label for="phone" class="appeal-cta__form__fieldgroup__label">{{__("pages.landing.supporters.form.phone")}}</label>
                <input type="text" name="phone" id="phone" class="appeal-cta__form__fieldgroup__text" value="{{old("phone")}}" placeholder="{{__("pages.landing.supporters.form.placeholders.optional")}}">
                @if($errors->has("phone"))
                    <div class="appeal-cta__form__fieldgroup__error bg-red-200 text-red-800 p-2 rounded mt-2">
                        {{ $errors->first("phone") }}
                    </div>
                @endif
            </div>
            <div class="appeal-cta__form__fieldgroup col-span-full">
                <label for="email" class="appeal-cta__form__fieldgroup__label">{{__("pages.landing.supporters.form.email")}}</label>
                <input type="email" name="email" id="email" class="appeal-cta__form__fieldgroup__text" required value="{{old("email")}}">
                @if($errors->has("email"))
                    <div class="appeal-cta__form__fieldgroup__error bg-red-200 text-red-800 p-2 rounded mt-2">
                        {{ $errors->first("email") }}
                    </div>
                @endif
            </div>
            <div class="appeal-cta__form__fieldgroup appeal-cta__form__fieldgroup--checkbox col-span-full">
                <input type="checkbox" name="optin" id="optin" class="appeal-cta__form__checkbox" value="1">
                <label for="optin" class="appeal-cta__form__fieldgroup__label">
                    {!! $configuration->dataprotectiondisclaimer[app()->getLocale()] !!}
                </label>
            </div>
            <div class="flex justify-end">
                <x-turnstile-widget
                    theme="light"
                    language="{{app()->getLocale()}}"
                    size="normal"
                    callback="callbackFunction"
                    errorCallback="errorCallbackFunction"
                />
            </div>
            <div class="appeal-cta__form__fieldgroup flex justify-end">
                <button type="submit" class="appeal-cta__form__fieldgroup__submit petition__button">{{__("pages.landing.supporters.form.submit")}}</button>
            </div>
            <input type="hidden" name="locale" value="{{app()->getLocale()}}">
            <input type="hidden" name="configuration_id" value="{{$configuration->id}}">
        </form>
    </div>
</div>
