<x-app-layout>
    <div class="md:px-12 px-4 mt-12 mb-20 max-w-[793px] mx-auto text-center">
            <h1 class="md:text-5xl text-3xl mb-3 text-accent font-graph">{{__("texts.thanks.title", ["name" => request()->get("name")])}}</h1>
            <p class="text-xl md:text-3xl">{{__("texts.thanks.content")}}</p>
            <div class="mt-12">
                <h2 class="md:text-4xl text-2xl font-graph mb-6 text-accent">{{__("texts.thanks.donate")}}</h2>
                <div class="donation-widget mx-auto p-6 bg-white"></div>
                <script type="text/javascript" src="https://tamaro.raisenow.com/juso-ch/latest/widget.js"></script>
                <script type="text/javascript">
                    window.rnw.tamaro.runWidget('.donation-widget',{
                        language:'{{app()->getLocale()}}',
                        testMode:false,
                        paymentFormPrefill:{
                            campaign:"juso"
                        },
                        amounts:[20,50,100,200]});</script>
            </div>

    </div>
</x-app-layout>
