<x-frontend-layout class="bg-accent text-white min-h-screen">
    <div class="appeal-container py-4 md:py-8">
        <h1 class="text-4xl mb-8 font-black uppercase">{{__("pages.donate.title")}}</h1>
        <p><b>Toll bist du dabei.</b> Eine Kampagne bringt jedoch nicht nur viel Arbeit mit sich – sondern auch viele Kosten. <b>Danke, dass du unsere Arbeit mit einer Spende unterstützt.</b></p>
        <div class="mt-8">
            <iframe src="https://gruene-zh.payrexx.com/ch-DE/pay?cid=a7021d57&donation[preselect_amount]=100&hide_description=1&appview=1" allow="payment *" width="100%" height="800" style="border:0;" id="payrexx-embed"></iframe>
        </div>
        <p class="mt-8">Spenden bitten an:</p>
        <p>
            IBAN CH58 0900 0000 8767 0663 6<br>
            Lautend auf GRÜNE Kanton Zürich, 8005 Zürich<br>
            Angabe des Spendenzwecks «Netto-Null 2040»
        </p>
    </div>
</x-frontend-layout>
