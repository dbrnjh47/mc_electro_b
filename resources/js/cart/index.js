import "/resources/scss/cart/index.scss";
import "/resources/js/custom/share/index.js";
import "/resources/js/custom/input_count/index.js";
import "/resources/js/custom/copy_button/index.js";

//
import "/resources/js/custom/sticky/index.js";
import "./map.js";

window.startSticky = function () {
    let bottom = 0;
    if (window.innerWidth <= 900) {
        return;
    }
    if (window.innerWidth <= 1050) {
        bottom = 80;
    }
    window.Ascroll(bottom);
}

window.addEventListener('scroll', startSticky, false);
document.body.addEventListener('scroll', startSticky, false);

//


