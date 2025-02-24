import "/resources/scss/components/breadcrumb.scss";
import "/resources/js/custom/copy_button/index.js";
import "/resources/js/custom/share/index.js";
import "/resources/scss/companies/company_card.scss";
import "/resources/scss/components/product/product_cart.scss";
import "/resources/js/custom/select2/select2_sample_nude.scss";

import "./product_result/product_result_count.js";
import "./product_result/product_result_processing.js";

import "/resources/js/custom/faq/faq.js";
import "/resources/js/custom/input_count/index.js";

// 
import "/resources/js/custom/swiper/swiper.js";
import "./basic_slider/index.js";
// 
import "./similar_slider/index.js"
// 

import "./product_menu_blocks/index.js";
import "/resources/scss/product/index.scss";

//
import "/resources/js/custom/sticky/index.js";

window.startSticky = function () {
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