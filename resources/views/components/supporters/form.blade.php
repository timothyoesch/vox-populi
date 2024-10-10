<div class="vpb-cta mt-4">
    <div class="sellner-cta__form--container">
        <form action="{{route("supporter.submit")}}" method="POST" class="sellner-cta__form grid md:grid-cols-2 gap-8 mt-4">
            @csrf
            <div class="sellner-cta__form__fieldgroup">
                <label for="firstname" class="sellner-cta__form__fieldgroup__label">{{__("pages.landing.sections.supporters.form.firstname")}}</label>
                <input type="text" name="firstname" id="firstname" class="sellner-cta__form__fieldgroup__text" required>
            </div>
            <div class="sellner-cta__form__fieldgroup">
                <label for="lastname" class="sellner-cta__form__fieldgroup__label">{{__("pages.landing.sections.supporters.form.lastname")}}</label>
                <input type="text" name="lastname" id="lastname" class="sellner-cta__form__fieldgroup__text" required>
            </div>
            <div class="sellner-cta__form__fieldgroup col-span-full">
                <label for="email" class="sellner-cta__form__fieldgroup__label">{{__("pages.landing.sections.supporters.form.email")}}</label>
                <input type="email" name="email" id="email" class="sellner-cta__form__fieldgroup__text" required>
            </div>
            <div class="sellner-cta__form__fieldgroup">
                <label for="zip" class="sellner-cta__form__fieldgroup__label">{{__("pages.landing.sections.supporters.form.zip")}}</label>
                <input type="text" name="zip" id="zip" class="sellner-cta__form__fieldgroup__text" required>
            </div>
            <div class="sellner-cta__form__fieldgroup">
                <label for="phone" class="sellner-cta__form__fieldgroup__label">{{__("pages.landing.sections.supporters.form.phone")}}</label>
                <input type="text" name="phone" id="phone" class="sellner-cta__form__fieldgroup__text" placeholder="{{__("pages.landing.sections.supporters.form.placeholders.optional")}}">
            </div>
            <div class="sellner-cta__form__fieldgroup sellner-cta__form__fieldgroup--checkbox col-span-full">
                <input type="checkbox" name="optin" id="optin" class="sellner-cta__form__checkbox" value="1">
                <label for="optin" class="sellner-cta__form__fieldgroup__label">{!! __("pages.landing.sections.supporters.form.optin") !!}</label>
            </div>
            <div class="sellner-cta__form__fieldgroup col-span-full flex justify-end">
                <button type="submit" class="sellner-cta__form__fieldgroup__submit">{{__("pages.landing.sections.supporters.form.submit")}}</button>
            </div>
            <input type="hidden" name="locale" value="{{app()->getLocale()}}">
            <input type="hidden" name="configuration_id" value="{{\App\Models\Configuration::first()->id}}">
        </form>
    </div>
</div>

<script>
    document.querySelector(".sellner-cta__form").addEventListener("submit", async function(e) {
        e.preventDefault();
        const form = e.target;
        const formContainer = form.closest(".sellner-cta__form--container");
        const formData = new FormData(form);
        const response = await fetch(form.action, {
            method: form.method,
            body: formData
        });
        let data = await response.json();
        if (data.status = "success") {
            form.remove();
            formContainer.innerHTML = "<p class='vpb-cta__success'>" + data.message + "</p>";
        }
    });
</script>
