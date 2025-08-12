import './index.scss'

// let listMiniAlertTimers = null;
window.wrapperMiniAlert = null;
window.miniAlertLimit = 5;

window.miniAlert = function(text, status = 1)
{
    createMiniAlertWrapper();

    let key = Math.floor(Math.random() * 101);
    wrapperMiniAlert.append(`
        <div class="mini_alert `+(status == "error" ? "error" : "")+`" data-key="`+key+`">
            `+text+`
        </div>
    `);

    wrapperMiniAlert.find('.mini_alert[data-key="'+key+'"]').slideDown(300);
    setEventMiniAlert(key);

    let timerInfoShare = setTimeout(() => {
        hideMiniAlert(key);
    }, 3000);

    checkMiniAlertLimit();
}

function checkMiniAlertLimit()
{
    let elements = wrapperMiniAlert.find('.mini_alert');
    let count = elements.length;
    if(count > miniAlertLimit)
    {
        let count_delete = count - miniAlertLimit;

        while(count_delete)
        {
            let el = elements.slice(0);
            hideMiniAlert(el.data("key"));
            count_delete--;
        }
    }
}

function hideMiniAlert(key)
{
    wrapperMiniAlert.find('.mini_alert[data-key="'+key+'"]').fadeOut(300)
    setTimeout(() => {
        wrapperMiniAlert.find('.mini_alert[data-key="'+key+'"]').remove();
    }, 300);
}

function setEventMiniAlert(key)
{
    $('.mini_alert[data-key="'+key+'"]').click(function () {
        hideMiniAlert(key);
    });
}

function createMiniAlertWrapper()
{
    if(!$(".mini_alert_wrapper").length)
    {
        $("body").append(`<div class="mini_alert_wrapper"> </div>`);
        wrapperMiniAlert = $(".mini_alert_wrapper");
    }
}
