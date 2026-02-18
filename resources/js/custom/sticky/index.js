import "./index.scss";
var a = document.querySelector('#sticky_aside1'),
    b = null,
    K = null,
    Z = 0,
    P = 90,
    N = 80;

window.stickyTargetHeight = 0;
window.stickyTargetArticle = null;

window.Ascroll = function (bottom) {
    if (!a) return;
    N = bottom;

    var Ra = a.getBoundingClientRect();
    var targetArticle = document.querySelector('#sticky_article');
    if (!targetArticle) return;

    var R1bottom = targetArticle.getBoundingClientRect().bottom;

    // Инициализация внутреннего контейнера b
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
            if (Ra.top < K) { // Скролл вниз
                if (R2 + N > R1) {
                    if (Rb.bottom - W + N <= 0) {
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
            } else { // Скролл вверх
                if (Ra.top - P < 0) {
                    if (Rb.top - P >= 0) {
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
            // Логика для короткого сайдбара (меньше экрана)
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
    } else {
        a.style.height = "fit-content";
        if (b != null) {
            b.style.top = '0px';
            b.className = '';
        }
    }

    // Инициализация ResizeObserver (выполняется один раз)
    if (!window.stickyTargetArticle) {
        window.stickyTargetArticle = targetArticle;

        let stickyResizeObserver = new ResizeObserver(entries => {
            for (let entry of entries) {
                if (window.stickyTargetHeight !== entry.contentRect.height) {
                    window.stickyTargetHeight = entry.contentRect.height;

                    // СБРОС СОСТОЯНИЯ для корректного пересчета
                    if (b) {
                        // Обновляем высоту родителя под новый контент b
                        a.style.height = b.scrollHeight + 'px';
                        // Сбрасываем K и Z, чтобы Ascroll пересчитал позицию без учета старого скролла
                        K = null;
                        Z = 0;
                    }

                    // Принудительный вызов пересчета
                    window.Ascroll(N);
                }
            }
        });

        stickyResizeObserver.observe(window.stickyTargetArticle);
        // Также следим за самим контентом сайдбара
        if (b) stickyResizeObserver.observe(b);
        else stickyResizeObserver.observe(a);
    }
};

// Инициализация при скролле
window.addEventListener('scroll', function() {
    window.Ascroll(N);
});

// Обновление ширины при изменении окна
window.addEventListener('resize', function () {
    if (a && a.children[0]) {
        a.children[0].style.width = getComputedStyle(a, '').width;
    }
}, false);
