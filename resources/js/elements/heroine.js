window.addEventListener('load', function () {
    let heorineImage = document.querySelector('.nettonull-heroine-image--wrapper');
    if (!heorineImage) return;

    this.setTimeout(() => {
        heorineImage.animate([
            { transform: 'translate(0, 0)', filter: 'drop-shadow(0 0 0 #88ff00)' },
            { transform: 'translate(-10px, -10px)', filter: 'drop-shadow(10px 10px 0 #88ff00)' },
        ], {
            duration: 150,
            fill: 'forwards'
        });
    }, 1000);

});
