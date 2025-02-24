import './index.scss';

let toTopButton = document.querySelector('.go_top');
let body = document.querySelector("body");


body.addEventListener('scroll', () => {
    if (body.scrollTop > 200) {
        toTopButton.classList.remove('go_top__hidden')
    } else {
        toTopButton.classList.add('go_top__hidden')
    }
});

toTopButton.addEventListener('click', () => {
    body.scrollTo({top: 0, behavior:'smooth'});
});

function setProgress(percent) {
    toTopButton.style.setProperty('--progress', `${percent}%`);
}

function updateProgress() {
    const scrollTop = body.scrollTop; 
    const windowHeight = body.scrollHeight - window.innerHeight; 
    const progress = (scrollTop / windowHeight) * 100;
    setProgress(progress);
}

document.addEventListener('scroll', updateProgress);
window.addEventListener('scroll', updateProgress);
body.addEventListener('scroll', updateProgress);