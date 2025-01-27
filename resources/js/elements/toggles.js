window.addEventListener("click", function (e) {
    if (!e.target.closest(".nettonull-toggle")) return;
    if (e.target.closest(".nettonull-toggle--content")) return;
    e.preventDefault();

    const duration = 150;

    let toggle = e.target.closest(".nettonull-toggle");
    let content = toggle.querySelector(".nettonull-toggle--content");
    let icon = toggle.querySelector(".nettonull-toggle--title svg");

    if (toggle.open) {
        content.animate([
            { opacity: 1, transform: "translateY(0)" },
            { opacity: 0, transform: "translateY(1rem)" },
        ],
            {
                duration: duration,
                fill: "forwards",
                easing: "ease-out",
            }
        )
        toggle.animate([
            { backgroundColor: "#f3f3f3" },
            { backgroundColor: "#ffffff" },
        ],
            {
                duration: duration,
                fill: "forwards",
            }
        );

        content.animate([
            { maxHeight: content.scrollHeight + "px" },
            { maxHeight: "0px" },
        ],
            {
                duration: duration,
                fill: "forwards",
            }
        );

        icon.animate([
            { transform: "rotate(180deg)" },
            { transform: "rotate(0deg)" },
        ],
            {
                duration: duration,
                fill: "forwards",
            }
        );

    } else {
        toggle.animate([
            { backgroundColor: "#ffffff" },
            { backgroundColor: "#f3f3f3" },
        ],
            {
                duration: duration,
                fill: "forwards",
            }
        );

        content.animate([
            { maxHeight: "0px", offset: 0 },
            { maxHeight: content.scrollHeight + "px", offset: 1 },
            { maxHeight: "unset", offset: 1 },
        ],
            {
                duration: duration,
                fill: "forwards",
            }
        );

        icon.animate([
            { transform: "rotate(0deg)" },
            { transform: "rotate(180deg)" },
        ],
            {
                duration: duration,
                fill: "forwards",
            }
        );

        this.setTimeout(() => {
            content.animate([
                { opacity: 0, transform: "translateY(1rem)" },
                { opacity: 1, transform: "translateY(0)" },
            ],
                {
                    duration: 2 * duration,
                    fill: "forwards",
                    easing: "ease-out",
                }
            )
        }, duration);
    }

    toggle.open = !toggle.open;
});
