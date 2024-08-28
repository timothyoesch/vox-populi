@php
    $testimonials = json_decode(file_get_contents(public_path("data/testimonials/" . app()->getLocale() . ".json")), true);
    shuffle($testimonials);
@endphp

<div class="vpb-testimonials mt-12 md:mt-16 lg:mt-20">
    <div class="vpb-testimonials__testimonial">
        <div class="vpb-testimonials__testimonial__quote italic text-xl md:text-2xl lg:text-4xl !leading-[135%]">
            <p><span>«</span><span class="vpb-testimonials__testimonial__quote-text">{{$testimonials[0]["quote"]}}</span><span>»</span></p>
        </div>
        <div class="vpb-testimonials__testimonial__author my-6 md:my-8 flex gap-x-4 md:gap-x-6 items-center">
            <img src="{{asset("images/testimonials/" . $testimonials[0]["image"])}}" alt="{{$testimonials[0]["name"]}}" class="vpb-testimonials__testimonial__author__image w-20 h-20 md:w-32 md:h-32 lg:w-36 lg:h-36 rounded-full object-cover">
            <div class="!leading-none">
                <p class="vpb-testimonials__testimonial__author__name text-2xl md:text-3xl font-bold">{{$testimonials[0]["name"]}}</p>
                <p class="vpb-testimonials__testimonial__author__title !mt-0">{{$testimonials[0]["title"]}}</p>
            </div>
        </div>
    </div>
    <div class="vpb-testimonials__controls flex flex-wrap justify-between items-center gap-y-8">
        <div class="vpb-testimonials__controls__pagination flex gap-3">
            @foreach ($testimonials as $testimonial)
                <div
                    class="vpb-testimonials__controls__pagination__page h-4 w-4 rounded-full cursor-pointer"
                    @if ($loop->first)
                        data-active="true"
                    @else
                        data-active="false"
                    @endif
                    data-index="{{$loop->index}}"
                    data-image="{{asset("images/testimonials/" . $testimonial["image"])}}"
                    data-name="{{$testimonial["name"]}}"
                    data-title="{{$testimonial["title"]}}"
                    data-quote="{{$testimonial["quote"]}}"
                    data-slug="{{\Illuminate\Support\Str::slug($testimonial["name"])}}"
                >
                </div>
            @endforeach
        </div>
        <div class="vpb-testimonials__controls__pagination__arrows flex gap-4 w-full sm:w-fit justify-center">
            <button class="vpb-testimonials__controls__pagination__arrows__prev flex p-2 border-2 border-solid border-foreground rounded-full">
                <x-heroicon-o-chevron-left class="h-8 w-8"/>
            </button>
            <button class="vpb-testimonials__controls__pagination__arrows__next flex p-2 border-2 border-solid border-foreground rounded-full">
                <x-heroicon-o-chevron-right class="h-8 w-8"/>
            </button>
        </div>
    </div>
</div>

<script>
    const testimonialsDom = document.querySelector(".vpb-testimonials");
    let activeTestimonial = document.querySelector(".vpb-testimonials__controls__pagination__page[data-active='true']");
    const testiminialDom = document.querySelector(".vpb-testimonials__testimonial");
    const testimonialImage = document.querySelector(".vpb-testimonials__testimonial__author__image");
    const testimonialName = document.querySelector(".vpb-testimonials__testimonial__author__name");
    const testimonialTitle = document.querySelector(".vpb-testimonials__testimonial__author__title");
    const testimonialQuote = document.querySelector(".vpb-testimonials__testimonial__quote-text");

    const testimonialPages = document.querySelectorAll(".vpb-testimonials__controls__pagination__page");
    const buttonPrev = document.querySelector(".vpb-testimonials__controls__pagination__arrows__prev");
    const buttonNext = document.querySelector(".vpb-testimonials__controls__pagination__arrows__next");

    const animation = 500;

    function goToTestimonial(index) {
        activeTestimonial.setAttribute("data-active", "false");
        testiminialDom.animate([
            {opacity: 1},
            {opacity: 0}
        ], {
            duration: animation,
            easing: "ease-in-out",
            fill: "forwards"
        });
        setTimeout(() => {
            activeTestimonial = document.querySelector(`.vpb-testimonials__controls__pagination__page[data-index='${index}']`);
            activeTestimonial.setAttribute("data-active", "true");

            testimonialImage.src = activeTestimonial.getAttribute("data-image");
            testimonialName.textContent = activeTestimonial.getAttribute("data-name");
            testimonialTitle.textContent = activeTestimonial.getAttribute("data-title");
            testimonialQuote.textContent = activeTestimonial.getAttribute("data-quote");

            testiminialDom.animate([
                {opacity: 0},
                {opacity: 1}
            ], {
                duration: animation,
                easing: "ease-in-out",
                fill: "forwards"
            });
        }, animation);
    }

    function nextTestimonial() {
        let next = activeTestimonial.nextElementSibling || activeTestimonial.parentElement.firstElementChild;
        goToTestimonial(next.getAttribute("data-index"));
    }

    function prevTestimonial() {
        let prev = activeTestimonial.previousElementSibling || activeTestimonial.parentElement.lastElementChild;
        goToTestimonial(prev.getAttribute("data-index"));
    }

    buttonPrev.addEventListener("click", () => {
        prevTestimonial();
    });
    buttonNext.addEventListener("click", () => {
        nextTestimonial();
    });

    testimonialPages.forEach(page => {
        page.addEventListener("click", () => {
            goToTestimonial(page.getAttribute("data-index"));
        });
    });
</script>
