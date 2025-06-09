window.addEventListener("click", function (event) {
    let menu = event.target.closest(".koref-menuicon");
    if (!menu) return;
    openMenu(menu);
})

window.addEventListener("click", function (event) {
    let menuItem = event.target.closest(".koref-fullscreen-menu__item");
    let menu = this.document.querySelector(".koref-menuicon");
    let fullscreenMenu = this.document.querySelector(".koref-fullscreen-menu");
    if (!menuItem) return;
    toggleTiles(menu, menu.querySelectorAll(".koref-menuicon__tile--hideonopen"));
    toggleFullscreenMenu(fullscreenMenu, menu);
    menu.open = false;
})

const openMenu = (menu) => {
    let menuTilesHideOnOpen = menu.querySelectorAll(".koref-menuicon__tile--hideonopen");
    let fullscreenMenu = document.querySelector(".koref-fullscreen-menu");
    toggleTiles(menu, menuTilesHideOnOpen);
    toggleFullscreenMenu(fullscreenMenu, menu);
    menu.open = !menu.open;
}

const toggleTiles = (menu, tiles) => {
    tiles.forEach(tile => {
        tile.animate({
            opacity: (menu.open) ? [0, 1] : [1, 0],
        }, {
            duration: 300,
            fill: "forwards"
        });
    });
}

const toggleFullscreenMenu = (fullscreenMenu, menu) => {
    if (!fullscreenMenu) return;
    fullscreenMenu.animate({
        opacity: (menu.open) ? [1, 0] : [0, 1],
        visibility: (menu.open) ? ["visible", "hidden"] : ["hidden", "visible"]
    }, {
        duration: 300,
        fill: "forwards"
    });
    setTimeout(() => {
        for (const [index, item] of fullscreenMenu.querySelectorAll(".koref-fullscreen-menu__item").entries()) {
            animateItem(item, index, menu.open);
        }
    }, 300);
    if (!menu.open) {
        window.scrollTo({
            top: 0,
            left: 0,
            behavior: "smooth"
        });
        document.body.style.overflow = "hidden";
    } else {
        document.body.style.overflow = "";
    }
}

const animateItem = (item, index, open) => {
    const itemContainer = item.closest(".koref-fullscreen-menu__item--container");
    itemContainer.animate({
        transform: (open) ? ["translateY(3rem)", "translateY(0)"] : ["translateY(0)", "translateY(3rem)"],
        opacity: (open) ? [0, 1] : [1, 0]
    }, {
        duration: 200,
        fill: "forwards",
        easing: "ease-in-out",
        delay: index * 100
    });
}
