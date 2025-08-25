import "/resources/scss/product/product_menu_blocks/index.scss";

import "/resources/scss/product/product_menu_blocks/blocks/description.scss";
import "/resources/scss/product/product_menu_blocks/blocks/characteristics.scss";
import "/resources/scss/product/product_menu_blocks/blocks/documentations.scss";
import "./blocks/reviews.js";
import "./blocks/faq.js";

let product_menu_blocks = $(".product_menu_blocks"); // меню
let product_menu_block = $(".product_menu_block"); // обёртка блоков

product_menu_blocks.find("> div").click(function () {
    let block = $(this).data("block");

    product_menu_blocks.find("> div").removeClass("activ");
    $(this).addClass("activ");

    product_menu_block.find('> *').slideUp();
    product_menu_block.find('> *[data-block="'+block+'"]').slideDown();
});
