import "/resources/scss/landing/categories.scss";
import "/resources/scss/categories/index.scss";
import "/resources/scss/category/index.scss";

import "./categories.js";
import "./filter.js";
import "/resources/js/custom/sticky/index.js";
import "/resources/js/ajax/product/filter.js";

window.startSticky = function() {
    let bottom = 0;
    if (window.innerWidth <= 650) {
        return
    }
    if (window.innerWidth <= 1050) {
        bottom = 80;
    }
    window.Ascroll(bottom);
}

window.addEventListener('scroll', startSticky, false);
document.body.addEventListener('scroll', startSticky, false);

//

if(window.isStopStartFilter == undefined)
{
    window.getProuctFilter();
}

