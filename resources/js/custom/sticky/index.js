import "./index.scss";
var a = document.querySelector('#sticky_aside1'), b = null, K = null, Z = 0, P = 90, N = 80;  // если у P ноль заменить на число, то блок будет прилипать до того, как верхний край окна браузера дойдёт до верхнего края элемента, если у N — нижний край дойдёт до нижнего края элемента. Может быть отрицательным числом

// http://shpargalkablog.ru/2013/09/scroll-block.html
window.stickyTargetHeight = 0;
window.stickyTargetArticle = null;
window.stickyTargetAside = null;

window.Ascroll = function (bottom) {
    N = bottom;
    var Ra = a.getBoundingClientRect(),
        R1bottom = document.querySelector('#sticky_article').getBoundingClientRect().bottom;
    if (Ra.bottom < R1bottom) {
        if (b == null) {
            var Sa = getComputedStyle(a, ''), s = '';
            for (var i = 0; i < Sa.length; i++) {
                if (Sa[i].indexOf('overflow') == 0 || Sa[i].indexOf('padding') == 0 || Sa[i].indexOf('border') == 0 || Sa[i].indexOf('outline') == 0 || Sa[i].indexOf('box-shadow') == 0 || Sa[i].indexOf('background') == 0) {
                    s += Sa[i] + ': ' + Sa.getPropertyValue(Sa[i]) + '; '
                }
            }
            b = document.createElement('div');
            b.className = "sticky_stop";
            b.style.cssText = s + ' box-sizing: border-box; width: ' + a.offsetWidth + 'px;';
            a.insertBefore(b, a.firstChild);
            var l = a.childNodes.length;
            for (var i = 1; i < l; i++) {
                b.appendChild(a.childNodes[1]);
            }
            a.style.height = b.getBoundingClientRect().height + 'px';
            a.style.padding = '0';
            a.style.border = '0';
        }
        var Rb = b.getBoundingClientRect(),
            Rh = Ra.top + Rb.height,
            W = document.documentElement.clientHeight,
            R1 = Math.round(Rh - R1bottom),
            R2 = Math.round(Rh - W);
        if (Rb.height > W) {
            if (Ra.top < K) {  // скролл вниз
                if (R2 + N > R1) {  // не дойти до низа
                    if (Rb.bottom - W + N <= 0) {  // подцепиться
                        b.className = 'sticky';
                        b.style.top = W - Rb.height - N + 'px';
                        Z = N + Ra.top + Rb.height - W;
                    } else {
                        b.className = 'sticky_stop';
                        b.style.top = - Z + 'px';
                    }
                } else {
                    b.className = 'sticky_stop';
                    b.style.top = - R1 + 'px';
                    Z = R1;
                }
            } else {  // скролл вверх
                if (Ra.top - P < 0) {  // не дойти до верха
                    if (Rb.top - P >= 0) {  // подцепиться
                        b.className = 'sticky';
                        b.style.top = P + 'px';
                        Z = Ra.top - P;
                    } else {
                        b.className = 'sticky_stop';
                        b.style.top = - Z + 'px';
                    }
                } else {
                    b.className = '';
                    b.style.top = '';
                    Z = 0;
                }
            }
            K = Ra.top;
        } else {
            if ((Ra.top - P) <= 0) {
                if ((Ra.top - P) <= R1) {
                    b.className = 'sticky_stop';
                    b.style.top = - R1 + 'px';
                } else {
                    b.className = 'sticky';
                    b.style.top = P + 'px';
                }
            } else {
                b.className = '';
                b.style.top = '';
            }
        }
        window.addEventListener('resize', function () {
            a.children[0].style.width = getComputedStyle(a, '').width
        }, false);
    }

    // setEvent
    if (!stickyTargetArticle) {
        stickyTargetArticle = document.getElementById('sticky_article');
        stickyTargetAside = document.querySelector('#sticky_aside1 > div');
        // console.log(stickyTargetAside);
        let stickyResizeObserver = new ResizeObserver(entries => {
            for (let entry of entries) {
                if (window.stickyTargetHeight != entry.contentRect.height) {
                    // console.log('была высота:', window.stickyTargetHeight);
                    window.stickyTargetHeight = entry.contentRect.height;
                    // console.log('Высота блока изменилась!');
                    // console.log('Новая высота:', entry.contentRect.height);
                    startSticky();
                }

                // Здесь ваш код, который нужно выполнить
            }
        });

        stickyResizeObserver.observe(stickyTargetArticle);
        stickyResizeObserver.observe(stickyTargetAside);
    }
}
