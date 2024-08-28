@php
    $charCount = mb_strlen(strip_tags($slot));
@endphp

<div class="vpb-fact bg-foreground p-6 text-white @if ($charCount > 290) vpb-fact__long relative @endif" id="fact-{{\Illuminate\Support\Str::slug($title)}}">
    <h2 class="font-bold text-2xl md:text-4xl mb-3 md:mb-4">{{$title}}</h2>
    <div class="vpb-fact__content">
        {{$slot}}
    </div>
    @if ($charCount > 290)
        <div class="vpb-fact__read-more absolute bottom-4 left-6 bg-foreground-dark text-white flex gap-2 items-center justify-center cursor-pointer">
            <a class="vpb-fact__read-more-link font-bold" onclick="toggleArgument('fact-{{\Illuminate\Support\Str::slug($title)}}')">
                {{__("pages.landing.sections.facts.read_more")}}
            </a>
            <x-heroicon-o-chevron-down class="w-5 h-5"/>
        </div>
    @endif
</div>

@if ($charCount > 290)
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const firstFactContentHeight = document.querySelector(".vpb-fact .vpb-fact__content").offsetHeight;
            const thisFact = document.querySelector("#fact-{{\Illuminate\Support\Str::slug($title)}}");
            const thisFactContent = thisFact.querySelector(".vpb-fact__content");
            thisFactContent.style.maxHeight = firstFactContentHeight + "px";
        });

        function toggleArgument(factId) {
            const fact = document.querySelector("#" + factId);
            const factContent = fact.querySelector(".vpb-fact__content");
            const factReadMore = fact.querySelector(".vpb-fact__read-more-link");
            const factReadMoreIcon = fact.querySelector(".vpb-fact__read-more svg");

            if (!fact.open) {
                factContent.animate([
                    {
                        maxHeight: factContent.offsetHeight + "px",
                        maskImage: "linear-gradient(to bottom, rgba(0, 0, 0, 1) 50%, rgba(0, 0, 0, 0) calc(100% - 1.5rem)"
                    },
                    {   maxHeight: factContent.scrollHeight + "px",
                        maskImage: "unset"
                    }
                ], {
                    duration: 250,
                    easing: "ease-in-out",
                    fill: "forwards"
                });
                factReadMore.textContent = "{{__("pages.landing.sections.facts.read_less")}}";
                factReadMoreIcon.animate([
                    {transform: "rotate(0deg)"},
                    {transform: "rotate(180deg)"}
                ], {
                    duration: 250,
                    easing: "ease-in-out",
                    fill: "forwards"
                });
                fact.open = true;
            } else {
                factContent.animate([
                    {
                        maxHeight: factContent.offsetHeight + "px",
                        maskImage: "none"
                    },
                    {
                        maxHeight: document.querySelector(".vpb-fact .vpb-fact__content").offsetHeight + "px",
                        maskImage: "linear-gradient(to bottom, rgba(0, 0, 0, 1) 50%, rgba(0, 0, 0, 0) calc(100% - 1.5rem)"
                    }
                ], {
                    duration: 250,
                    easing: "ease-in-out",
                    fill: "forwards"
                });
                factReadMore.textContent = "{{__("pages.landing.sections.facts.read_more")}}";
                factReadMoreIcon.animate([
                    {transform: "rotate(180deg)"},
                    {transform: "rotate(0deg)"}
                ], {
                    duration: 250,
                    easing: "ease-in-out",
                    fill: "forwards"
                });
                fact.open = false;
            }
        }
    </script>
@endif
