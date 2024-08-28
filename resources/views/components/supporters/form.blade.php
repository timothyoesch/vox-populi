<div class="vpb-cta mt-8">
    <div class="mt-8">
        <x-link-button :label="__('pages.landing.sections.supporters.form.cta')" :href="'/'" target="_blank" id="supporters-cta"/>
    </div>

    <div class="vpb-cta__form--container  max-h-0 overflow-y-hidden">
        <form action="{{route("supporter.submit")}}" method="POST" class="vpb-cta__form grid grid-cols-2 gap-8 mt-4">
            @csrf
            <div class="vpb-cta__form__fieldgroup">
                <label for="firstname" class="vpb-cta__form__fieldgroup__label">{{__("pages.landing.sections.supporters.form.firstname")}}</label>
                <input type="text" name="firstname" id="firstname" class="vpb-cta__form__fieldgroup__text" required>
            </div>
            <div class="vpb-cta__form__fieldgroup">
                <label for="lastname" class="vpb-cta__form__fieldgroup__label">{{__("pages.landing.sections.supporters.form.lastname")}}</label>
                <input type="text" name="lastname" id="lastname" class="vpb-cta__form__fieldgroup__text" required>
            </div>
            <div class="vpb-cta__form__fieldgroup">
                <label for="zip" class="vpb-cta__form__fieldgroup__label">{{__("pages.landing.sections.supporters.form.zip")}}</label>
                <input type="text" name="zip" id="zip" class="vpb-cta__form__fieldgroup__text" required>
            </div>
            <div class="vpb-cta__form__fieldgroup">
                <label for="city" class="vpb-cta__form__fieldgroup__label">{{__("pages.landing.sections.supporters.form.city")}}</label>
                <input type="text" name="customFields[city]" id="city" class="vpb-cta__form__fieldgroup__text" required>
            </div>
            <div class="vpb-cta__form__fieldgroup col-span-full">
                <label for="position" class="vpb-cta__form__fieldgroup__label">{{__("pages.landing.sections.supporters.form.position")}}</label>
                <input type="text" name="customFields[position]" id="position" class="vpb-cta__form__fieldgroup__text" placeholder="{{__("pages.landing.sections.supporters.form.placeholders.optional")}}">
            </div>
            <div class="vpb-cta__form__fieldgroup">
                <label for="email" class="vpb-cta__form__fieldgroup__label">{{__("pages.landing.sections.supporters.form.email")}}</label>
                <input type="email" name="email" id="email" class="vpb-cta__form__fieldgroup__text" required>
            </div>
            <div class="vpb-cta__form__fieldgroup">
                <label for="phone" class="vpb-cta__form__fieldgroup__label">{{__("pages.landing.sections.supporters.form.phone")}}</label>
                <input type="text" name="phone" id="phone" class="vpb-cta__form__fieldgroup__text" placeholder="{{__("pages.landing.sections.supporters.form.placeholders.optional")}}">
            </div>
            <div class="vpb-cta__form__fieldgroup vpb-cta__form__fieldgroup--checkbox col-span-full">
                <input type="checkbox" name="public" id="public" class="vpb-cta__form__checkbox" value="1" checked>
                <label for="public" class="vpb-cta__form__fieldgroup__label">{{__("pages.landing.sections.supporters.form.public")}}</label>
            </div>
            <div class="vpb-cta__form__fieldgroup vpb-cta__form__fieldgroup--checkbox col-span-full">
                <input type="checkbox" name="optin" id="optin" class="vpb-cta__form__checkbox" value="1">
                <label for="optin" class="vpb-cta__form__fieldgroup__label">{{__("pages.landing.sections.supporters.form.optin")}}</label>
            </div>
            <div class="vpb-cta__form__fieldgroup col-span-full flex justify-end">
                <button type="submit" class="vpb-cta__form__fieldgroup__submit">{{__("pages.landing.sections.supporters.form.submit")}}</button>
            </div>
            <input type="hidden" name="locale" value="{{app()->getLocale()}}">
            <input type="hidden" name="configuration_id" value="{{\App\Models\Configuration::first()->id}}">
        </form>
    </div>
</div>

<script>
    document.getElementById("supporters-cta").addEventListener("click", function(e) {
        e.preventDefault();
        const form = document.querySelector(".vpb-cta__form--container");
        if (!form.open) {
            form.animate([
                {maxHeight: "0"},
                {maxHeight: form.scrollHeight + "px"}
            ], {
                duration: 500,
                easing: "ease-in-out",
                fill: "forwards"
            });
            form.open = true;
        } else {
            form.animate([
                {maxHeight: form.scrollHeight + "px"},
                {maxHeight: "0"}
            ], {
                duration: 500,
                easing: "ease-in-out",
                fill: "forwards"
            });
            form.open = false;
        }
    });

    document.querySelector(".vpb-cta__form").addEventListener("submit", async function(e) {
        e.preventDefault();
        const form = e.target;
        const formContainer = form.closest(".vpb-cta__form--container");
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
