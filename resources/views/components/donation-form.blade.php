<div class="rnw-tamaro-widget mt-8"></div>
<script src="https://tamaro.raisenow.com/gsoa-ch/latest/widget.js"></script>

<div class="flex justify-end">
    <button id="donateNow" class="petition__button leading-normal mt-8"></button>
</div>

<style>
    :root {
        --tamaro-primary-color: #2E0045;
        --tamaro-primary-color__hover: #2E0045;
        --tamaro-primary-bg-color: #F3FF47;
        --tamaro-bg-color__hover: #F3FF47;
        --tamaro-bg-color: transparent;
        --tamaro-text-color: #2E0045;
        --tamaro-input-color: #2E0045;
        --tamaro-placeholder-color: #2E0045;
        --tamaro-info-icon-color: #280050;
        --tamaro-block-header-position-color: #280050;
        --tamaro-dropdown-bg-color: #280050;
        --tamaro-dropdown-color: #F3FF47;
        --tamaro-button-primary-color: #F3FF47;
        --tamaro-block-header-position-color: #F3FF47;
    }
    .radio-select-options {
        li {
            color: white !important;

            &:hover {
                color: #280050 !important;
            }
        }
    }
</style>

<script>
    let lang = "{{app()->getLocale()}}";
    let allowedLangs = ["de", "fr", "it", "en"];
    if (!allowedLangs.includes(lang)) {
        lang = "de";
    }
    let button = document.getElementById('donateNow');
    let texts = {
        "de": "Jetzt spenden",
        "fr": "Faire un don maintenant",
        "it": "Fai una donazione",
        "en": "Donate now"
    }
    button.innerText = texts[lang];
    button.addEventListener('click', function () {
        button.style.display = 'none';
        window.rnw.tamaro.instance.config.showSubmitButton = true;
        window.rnw.tamaro.instance.config.showFooter = false;
        window.rnw.tamaro.instance.config.forceShowBlocks = {
            payment_cover_fee: true,
            payment_address: true,
            payment_profile: true,
            payment_payment_methods: true,
        }
    });



    window.rnw.tamaro.runWidget('.rnw-tamaro-widget', {
        language: lang,
        purposes: ['stopf35_petition'],
        forceShowBlocks: {
            'payment_purposes': false,
            'payment_amounts_and_intervals': true,
            'payment_payment_methods': false,
            'payment_profile': false,
            'payment_address': false,
            'payment_cover_fee': false
        },
        showSubmitButton: false,
        showFooter: false,
        amounts: [
            {
                if: 'paymentType() == onetime',
                then: [20, 50, 100, 200],
            },
            {
                if: 'paymentType() == recurring && recurringInterval() == monthly',
                then: [10, 20, 50, 100],
            },
            {
                if: 'paymentType() == recurring && recurringInterval() == quarterly',
                then: [15, 30, 50, 100],
            },
            {
                if: 'paymentType() == recurring && recurringInterval() == semestral',
                then: [15, 20, 80, 100],
            },
            {
                if: 'paymentType() == recurring && recurringInterval() == yearly',
                then: [40, 75, 130, 200, 300],
            },
        ],
        slots: {
            address_form_end: [
                {
                    component: 'block',
                    children: [
                        {
                            component: 'block_content',
                            children: [
                                {
                                    component: 'content',
                                    text_html: 'address_form_start_content_html',
                                },
                            ],
                        },
                    ],
                }
            ]
        },
        translations: {
            de: {
                organization_name: "Korrektur Referendum",
                address_form_start_content_html: "<p><em><small>Als politische Organisation ist uns Transparenz in der Finanzierung besonders wichtig. Bitte geben Sie Ihre Adresse an, damit wir Sie als Gönner*in registrieren können. Ihre Daten werden vertraulich behandelt und nicht an Dritte weitergegeben.</small></em></p>",
                purposes: {
                    stopf35_petition: "Spende für das Korrektur Referendum"
                }
            },
            fr: {
                organization_name: "Référendum correctif",
                address_form_start_content_html: "<p><em><small>En tant qu'organisation politique, la transparence du financement est particulièrement importante pour nous. Veuillez indiquer votre adresse afin que nous puissions vous enregistrer en tant que donateur. Vos données seront traitées de manière confidentielle et ne seront pas transmises à des tiers.</small></em></p>",
                purposes: {
                    stopf35_petition: "Don pour le Référendum correctif"
                }
            },
        }
    });

</script>
