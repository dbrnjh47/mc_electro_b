import startBasicSlider from "./slider/index.js";
import startMiniatureSlider from "./slider_miniature/index.js";
import "./index.scss";

setTimeout(function() {
    let slider_miniature = startMiniatureSlider();
    startBasicSlider(slider_miniature);
}, 500);
