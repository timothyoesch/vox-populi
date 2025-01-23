<x-frontend-layout>
    <div class="appeal-container py-4 md:py-8">
        <h1 class="text-4xl mb-8">{{__("pages.donate.title")}}</h1>
        {!!
    \Illuminate\Mail\Markdown::parse(
        file_get_contents(resource_path('content/donate.' . app()->getLocale() . '.md'))
    )
        !!}
        <div class="rnw-tamaro-widget mt-8"></div>

        <script src="https://tamaro.raisenow.com/gsoa-ch/latest/widget.js"></script>

        <div>
            <button id="donateNow"></button>
        </div>

        <style>
            :root {
                --tamaro-primary-color: #ffe53e;
                --tamaro-primary-color__hover: #ffe53e;
                --tamaro-primary-bg-color: #190032;
                --tamaro-bg-color__hover: #190032;
                --tamaro-bg-color: transparent;
                --tamaro-text-color: #ffe53e;
                --tamaro-input-color: #ffe53e;
                --tamaro-placeholder-color: #ffffff;
                --tamaro-info-icon-color: #280050;
                --tamaro-block-header-position-color: #280050;
                --tamaro-dropdown-bg-color: #280050;
                --tamaro-button-primary-color: #280050;
            }

            #donateNow {
                background-color: #ffe53e;
                color: #280050;
                padding: 10px 20px;
                border: none;
                cursor: pointer;
                margin-top: 2rem;
                font-size: 1.5rem;
                font-weight: bold;
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
                purposes: ['dringenderappell'],
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
                        organization_name: "Dringender Appell zum Stopp der Rüstungskooperation mit Israel",
                        address_form_start_content_html: "<p><em><small>Als politische Organisation ist uns Transparenz in der Finanzierung besonders wichtig. Bitte geben Sie Ihre Adresse an, damit wir Sie als Gönner*in registrieren können. Ihre Daten werden vertraulich behandelt und nicht an Dritte weitergegeben.</small></em></p>",
                        purposes: {
                            pannendrohnen: "Spende für den dringenden Appell"
                        }
                    },
                    fr: {
                        organization_name: "Appel urgent pour arrêter la coopération en matière d'armement avec Israël",
                        address_form_start_content_html: "<p><em><small>En tant qu'organisation politique, la transparence du financement est particulièrement importante pour nous. Veuillez indiquer votre adresse afin que nous puissions vous enregistrer en tant que donateur. Vos données seront traitées de manière confidentielle et ne seront pas transmises à des tiers.</small></em></p>",
                        purposes: {
                            pannendrohnen: "Donation pour l'appel urgent"
                        }
                    },
                    it: {
                        organization_name: "Appello urgente per fermare la cooperazione in materia di armamenti con Israele",
                        address_form_start_content_html: "<p><em><small>Come organizzazione politica, la trasparenza del finanziamento è particolarmente importante per noi. Si prega di fornire il proprio indirizzo in modo che possiamo registrarti come donatore. I tuoi dati saranno trattati in modo confidenziale e non saranno divulgati a terzi.</small></em></p>",
                        purposes: {
                            pannendrohnen: "Donazione per l'appello urgente"
                        }
                    },
                    en: {
                        organization_name: "Campaign against the failed drones",
                        address_form_start_content_html: "<p><em><small>As a political organization, transparency in financing is particularly important to us. Please provide your address so that we can register you as a donor. Your data will be treated confidentially and will not be passed on to third parties.</small></em></p>",
                        purposes: {
                            pannendrohnen: "Donation to the campaign against the failed drones"
                        }
                    },
                }
            });

        </script>
    </div>
</x-frontend-layout>