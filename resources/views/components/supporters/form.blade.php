<div class="appeal-cta mt-8">
    <div class="appeal-cta__form--container">
        <form action="{{route("supporter.submit")}}" method="POST" class="appeal-cta__form grid md:grid-cols-2 gap-8 mt-4">
            @csrf
            <div class="appeal-cta__form__fieldgroup">
                <label for="firstname" class="appeal-cta__form__fieldgroup__label">{{__("pages.landing.supporters.form.firstname")}}</label>
                <input type="text" name="firstname" id="firstname" class="appeal-cta__form__fieldgroup__text" required>
            </div>
            <div class="appeal-cta__form__fieldgroup">
                <label for="lastname" class="appeal-cta__form__fieldgroup__label">{{__("pages.landing.supporters.form.lastname")}}</label>
                <input type="text" name="lastname" id="lastname" class="appeal-cta__form__fieldgroup__text" required>
            </div>
            <div class="appeal-cta__form__fieldgroup col-span-full">
                <label for="email" class="appeal-cta__form__fieldgroup__label">{{__("pages.landing.supporters.form.email")}}</label>
                <input type="email" name="email" id="email" class="appeal-cta__form__fieldgroup__text" required>
            </div>
            <div class="appeal-cta__form__fieldgroup">
                <label for="zip" class="appeal-cta__form__fieldgroup__label">{{__("pages.landing.supporters.form.zip")}}</label>
                <input type="text" name="zip" id="zip" class="appeal-cta__form__fieldgroup__text" required>
            </div>
            <div class="appeal-cta__form__fieldgroup">
                <label for="phone" class="appeal-cta__form__fieldgroup__label">{{__("pages.landing.supporters.form.phone")}}</label>
                <input type="text" name="phone" id="phone" class="appeal-cta__form__fieldgroup__text" placeholder="{{__("pages.landing.supporters.form.placeholders.optional")}}">
            </div>
            <div class="appeal-cta__form__fieldgroup appeal-cta__form__fieldgroup--checkbox col-span-full">
                <input type="checkbox" name="optin" id="optin" class="appeal-cta__form__checkbox" value="1">
                <label for="optin" class="appeal-cta__form__fieldgroup__label">{!! __("pages.landing.supporters.form.optin") !!}</label>
            </div>
            <div class="appeal-cta__form__fieldgroup col-span-full flex justify-end">
                <button type="submit" class="appeal-cta__form__fieldgroup__submit">{{__("pages.landing.supporters.form.submit")}}</button>
            </div>
            <input type="hidden" name="locale" value="{{app()->getLocale()}}">
            <input type="hidden" name="configuration_id" value="{{\App\Models\Configuration::first()->id}}">
        </form>
    </div>
</div>
