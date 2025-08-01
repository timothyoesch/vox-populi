import Aos from "aos";
import "aos/dist/aos.css";

Aos.init({
    once: true,
});

// Initiatialize Fullscreen class correctly
const resizeFullscreen = () => {
    const vh = window.innerHeight * 0.01;
    document.documentElement.style.setProperty("--vh", `${vh}px`);
    const vw = window.innerWidth * 0.01;
    document.documentElement.style.setProperty("--vw", `${vw}px`);
};

window.addEventListener("load", resizeFullscreen);
window.addEventListener("resize", resizeFullscreen);
