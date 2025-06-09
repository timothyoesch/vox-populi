import Aos from "aos";
import "aos/dist/aos.css";
import "./elements/menu.js";

Aos.init({
    once: true,
});

// Initiatialize Fullscreen class correctly
window.addEventListener("load", resizeFullscreen);
window.addEventListener("resize", resizeFullscreen);

const resizeFullscreen = () => {
    const vh = window.innerHeight * 0.01;
    document.documentElement.style.setProperty("--vh", `${vh}px`);
    const vw = window.innerWidth * 0.01;
    document.documentElement.style.setProperty("--vw", `${vw}px`);
};
