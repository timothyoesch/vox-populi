window.addEventListener("click", function (e) {
    let link = e.target.closest("a");
    let hash = link && link.href.split("#")[1];
    if (hash !== "spenden") return;
    let spendenToggle = document.querySelector("#spenden .nettonull-toggle");
    if (!spendenToggle) return;
    spendenToggle.click();
});

window.addEventListener("load", function (e) {
    let hash = window.location.hash;
    if (hash !== "#spenden") return;
    let spendenToggle = document.querySelector("#spenden .nettonull-toggle");
    if (!spendenToggle) return;
    spendenToggle.click();
});
