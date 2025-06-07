<div class="koref-container koref-container--large">
    <div class="koref-navbar flex justify-between items-center">
        <x-app-icon class="h-16 md:h-28"/>
        <div class="koref-menuicon grid grid-cols-3 gap-[0.2rem]">
            <div class="koref-menuicon__tile h-2 w-2 bg-white"></div>
            <div class="koref-menuicon__tile koref-menuicon__tile--hideonopen h-2 w-2 bg-white"></div>
            <div class="koref-menuicon__tile h-2 w-2 bg-white"></div>
            <div class="koref-menuicon__tile koref-menuicon__tile--hideonopen h-2 w-2 bg-white"></div>
            <div class="koref-menuicon__tile h-2 w-2 bg-white"></div>
            <div class="koref-menuicon__tile koref-menuicon__tile--hideonopen h-2 w-2 bg-white"></div>
            <div class="koref-menuicon__tile h-2 w-2 bg-white"></div>
            <div class="koref-menuicon__tile koref-menuicon__tile--hideonopen h-2 w-2 bg-white"></div>
            <div class="koref-menuicon__tile h-2 w-2 bg-white"></div>
        </div>
    </div>
</div>

<script>
    window.addEventListener("click", function(event) {
        let menu = event.target.closest(".koref-menuicon");
        if (!menu) return;
        let menuIcon = menu.querySelector(".koref-menuicon");
        let menuTiles = menu.querySelectorAll(".koref-menuicon__tile");
        let menuTilesHideOnOpen = menu.querySelectorAll(".koref-menuicon__tile--hideonopen");
        if (menu.open) {
            menuTilesHideOnOpen.forEach(tile => {
                tile.animate({
                    opacity: [0, 1]
                }, {
                    duration: 300,
                    fill: "forwards"
                });
            });
        } else {
            menuTilesHideOnOpen.forEach(tile => {
                tile.animate({
                    opacity: [1, 0]
                }, {
                    duration: 300,
                    fill: "forwards"
                });
            });
        }
        menu.open = !menu.open;
    })
</script>
