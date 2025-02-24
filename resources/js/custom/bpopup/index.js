import './jquery.bpopup.min.js';
import './modal.scss';

window.bPopup = null;
window.modal = function(obj) {
    var modalHref = "";
    if(typeof obj  === 'string')
    {
      modalHref = obj;
    } else
    {
      obj = $(obj);
      modalHref = obj.data("modal");
    }
    //

    if (bPopup != null) {
        bPopup.close();
    }

    // $("body, html").addClass("no-scroll");
    bPopup = $(modalHref).bPopup({
        follow: [true, true],
        'positionStyle': "fixed",
        scrollBar: 0,
        escClose: true,
        // onClose: function(){
        //   $("body, html").removeClass("no-scroll");
        // }
    });
}

window.modalClose = function()
{
    bPopup.close();
}
