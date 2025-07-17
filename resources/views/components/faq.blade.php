@php
    // Get files in ressource_path("content/" . app()->getLocale() . "/" . env("DECISION") . "/arguments")
    $arguments = collect(scandir(resource_path("content/faq/" . app()->getLocale())))->filter(function ($file) {
        return !in_array($file, ['.', '..']) && pathinfo($file, PATHINFO_EXTENSION) === 'md';
    })->map(function ($file) {
        return [
            'name' => explode("::", pathinfo($file, PATHINFO_FILENAME))[1],
            'content' => md_html(resource_path("content/faq/" . app()->getLocale() . "/" . $file)),
        ];
    })->values()->toArray();
@endphp
<div class="queer-faq mt-6 md:mt-12">
    @foreach ($arguments as $argument)
        <x-question :title="$argument['name']">
            {!! $argument['content'] !!}
        </x-question>
    @endforeach
</div>

<script>
    window.addEventListener("click", function (event) {
        let argument = event.target.closest(".queer-faq__question");
        console.log(argument);
        if (!argument) return;
        if (event.target.closest(".queer-faq__question-content--container")) return;
        let conentContainer = argument.querySelector(".queer-faq__question-content--container");
        if (!conentContainer) return;
        let content = argument.querySelector(".queer-faq__question-content");
        if (!content) return;
        let icon = argument.querySelector(".queer-faq__question-title svg");
        if (!icon) return;

        if (!argument.open) {
            conentContainer.animate({
                maxHeight: [0, conentContainer.scrollHeight + "px", "unset"]
            },
            {
                duration: 300,
                fill: "forwards"
            });
            icon.animate({
                transform: ["rotate(0deg)", "rotate(180deg)"]
            },
            {
                duration: 200,
                fill: "forwards"
            });
            setTimeout(() => {
                content.animate({
                    opacity: [0, 1],
                    transform: ["translateY(1rem)", "translateY(0)"]
                },
                {
                    duration: 500,
                    fill: "forwards",
                    easing: "ease-in-out"
                });
            }, 100);
        } else {
            conentContainer.animate({
                maxHeight: [conentContainer.scrollHeight + "px", 0, 0]
            },
            {
                duration: 300,
                fill: "forwards"
            });
            icon.animate({
                transform: ["rotate(180deg)", "rotate(0deg)"]
            },
            {
                duration: 200,
                fill: "forwards"
            });
            content.animate({
                opacity: [1, 0],
                transform: ["translateY(0)", "translateY(1rem)"]
            },
            {
                duration: 200,
                fill: "forwards"
            });
        }
        argument.open = !argument.open;
    });
</script>
