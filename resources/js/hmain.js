// фиксация шапки при прокрутке

window.onscroll = function showHeader() {
    var header = document.querySelector('.header');
    if (header) {
        if (window.pageYOffset > 144) {
            header.classList.add('fixid');
            var logoimg = document.querySelector('.logoimg');
            if (logoimg) {
                logoimg.style.height = '60px';
            }
            var body = document.querySelector('body');
            if (body) {
                body.style.paddingTop = '0';
            }
            var aaa = document.querySelector('.aaa');
            if (aaa) {
                aaa.style.justifyContent = 'space-between';
            }
            var logoText = document.querySelector('.logoText');
            if (logoText) {
                logoText.style.display = 'block';
            }
        } else {
            header.classList.remove('fixid');
            var logoimg = document.querySelector('.logoimg');
            if (logoimg) {
                logoimg.style.height = '140px';
            }
            var body = document.querySelector('body');
            if (body) {
                body.style.paddingTop = '0px';
            }
            var aaa = document.querySelector('.aaa');
            if (aaa) {
                aaa.style.justifyContent = 'space-between';
            }
            var logoText = document.querySelector('.logoText');
            if (logoText) {
                logoText.style.display = 'block';
            }
        }
    }
};








// бургерменю
function burgerMenu(icon) {
    icon.classList.toggle("change");
    var nav = document.querySelector('.nav');
    nav.classList.toggle('showNav');
    document.querySelector('body').classList.toggle("overflow");
}