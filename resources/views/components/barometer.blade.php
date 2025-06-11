<div class="koref-barometer mt-8">
    <p class="text-xl mb-4">{!!__("pages.landing.supporters.form.barometer.content", ["count" => $supportersCount, "signatures" => $signatureCount])!!}</p>
    <div class="koref-barometer__outer rounded-full bg-accent p-1">
        <div class="koref-barometer__inner h-6 bg-highlight rounded-full w-0 flex justify-center items-center" data-percentage="{{$percentage}}%">
            <span class="text-sm opacity-0 text-accent">{{ $percentage }}%</span>
        </div>
    </div>
    <div class="koref-barometer__numbers flex justify-between mt-2">
        <span class="text-sm">{{ 0 }}</span>
        <span class="text-sm">{{ number_format($target, 0, ".", "'") }}</span>
    </div>

</div>

<script>
    window.addEventListener("load", function() {
        const barometer = document.querySelector('.koref-barometer__inner');
        const percentage = barometer.getAttribute('data-percentage');
        const percentageText = barometer.querySelector('span');
        barometer.animate(
            { width: ['0%', percentage] },
            {
                duration: 1000,
                fill: 'forwards',
                easing: 'ease-in-out',
                iterations: 1
            }
        );
        setTimeout(() => {
            percentageText.animate(
                { opacity: [0, 1] },
                {
                    duration: 500,
                    fill: 'forwards',
                    easing: 'ease-in-out',
                    iterations: 1
                }
            );
        }, 1000);
    });
</script>
