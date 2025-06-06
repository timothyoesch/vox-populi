<div class="queer-barometer">

    <div class="queer-barometer__icon flex">
        <div class="queer-barometer__icon--spacer w-0"></div>
        <x-app-icon :hideText="true" class="!h-12 mb-2 -ml-2"/>
    </div>
    <div class="queer-barometer__outer rounded-full bg-secondary p-1">
        <div class="queer-barometer__inner h-6 bg-highlight rounded-full w-0 flex justify-center items-center" data-percentage="{{$percentage}}%">
            <span class="text-sm opacity-0 text-secondary">{{ $percentage }}%</span>
        </div>
    </div>
    <div class="queer-barometer__numbers flex justify-between mt-2">
        <span class="text-sm">{{ 0 }}</span>
        <span class="text-sm">{{ number_format($target, 0, ".", "'") }}</span>
    </div>
    <p class="text-base">{{__("petition.form.content", ["count" => $count])}}</p>
</div>

<script>
    window.addEventListener("load", function() {
        const appIconSpacer = document.querySelector('.queer-barometer__icon--spacer');
        const barometer = document.querySelector('.queer-barometer__inner');
        const percentage = barometer.getAttribute('data-percentage');
        const percentageText = barometer.querySelector('span');
        appIconSpacer.animate(
            { width: ['0%', percentage] },
            {
                duration: 1000,
                fill: 'forwards',
                easing: 'ease-in-out',
                iterations: 1
            }
        );
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
