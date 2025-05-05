import './index.scss'

window.getLouder = function () {
    return `
        <section class="loader"><span></span></section>
    `;
}

window.distroyLouder = function (wrapper) {
    wrapper.find(".louder").remove();
}
