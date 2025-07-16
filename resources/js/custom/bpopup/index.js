import './jquery.bpopup.min.js';
import './modal.scss';

window.bPopup = null;
window.modal = function (obj, no_close = 0) {
    var modalHref = "";
    if (typeof obj === 'string') {
        modalHref = obj;
    } else {
        obj = $(obj);
        modalHref = obj.data("modal");
    }
    //

    if (bPopup != null) {
        bPopup.close();
    }

    let data = {
        follow: [true, true],
        'positionStyle': "fixed",
        scrollBar: 0,
        escClose: true,
        // onClose: function(){
        //   $2("body, html").removeClass("no-scroll");
        // }
        onClose: function () {
            $(this).trigger('bPopup:closed'); // Trigger a custom event
        }
    };

    if (no_close) {
        data["escClose"] = 0;
        data["modalClose"] = 0;
    }

    bPopup = $(modalHref).bPopup(data);
    return bPopup;
}

window.modalClose = function () {
    bPopup.close();
}
