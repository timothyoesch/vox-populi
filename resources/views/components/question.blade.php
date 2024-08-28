<div class="vpb-faq" id="{{\Illuminate\Support\Str::slug($question)}}">
    <div class="vpb-faq__question flex justify-between items-center cursor-pointer gap-x-4">
        <h2 class="text-xl md:text-2xl font-bold">{{$question}}</h2>
        <x-heroicon-s-chevron-down class="w-8 h-8 shrink-0"/>
    </div>
    <div class="vpb-faq__answer max-h-0 overflow-y-hidden">
        <div class="pt-4">
            {{$slot}}
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const faqQuestion = document.querySelector("#{{\Illuminate\Support\Str::slug($question)}} .vpb-faq__question");
            const faqAnswer = document.querySelector("#{{\Illuminate\Support\Str::slug($question)}} .vpb-faq__answer");
            const faqAnswerContent = faqAnswer.querySelector("div");
            const faqQuestionIcon = faqQuestion.querySelector("svg");

            faqQuestion.addEventListener("click", function() {
                if (!faqQuestion.open) {
                    faqAnswerContent.animate([
                        {transform: "translateY(1rem)", opacity: 0, offset: 0},
                        {transform: "translateY(1rem)", opacity: 0, offset: 0.5},
                        {transform: "translateY(0)", opacity: 1, offset: 1}
                    ], {
                        duration: 500,
                        easing: "ease-in-out",
                        fill: "forwards"
                    });
                    faqAnswer.animate([
                        {maxHeight: "0"},
                        {maxHeight: faqAnswer.scrollHeight + "px"}
                    ], {
                        duration: 250,
                        easing: "ease-in-out",
                        fill: "forwards"
                    });
                    faqQuestionIcon.animate([
                        {transform: "rotate(0deg)"},
                        {transform: "rotate(180deg)"}
                    ], {
                        duration: 250,
                        easing: "ease-in-out",
                        fill: "forwards"
                    });
                    faqQuestion.open = true;
                } else {
                    faqAnswer.animate([
                        {maxHeight: faqAnswer.scrollHeight + "px"},
                        {maxHeight: "0"}
                    ], {
                        duration: 250,
                        easing: "ease-in-out",
                        fill: "forwards"
                    });
                    faqQuestionIcon.animate([
                        {transform: "rotate(180deg)"},
                        {transform: "rotate(0deg)"}
                    ], {
                        duration: 250,
                        easing: "ease-in-out",
                        fill: "forwards"
                    });
                    faqQuestion.open = false;
                }
            });
        });
    </script>
</div>
