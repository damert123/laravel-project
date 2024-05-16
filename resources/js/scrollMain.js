let animItems = document.querySelectorAll('.anim_items');

if (animItems.length > 0) {
    window.addEventListener('scroll', animOnScroll);
    function animOnScroll(params) {
        for (let index = 0; index <animItems.length; index++) {
            const animItem = animItems[index];
            const animItemHeight = animItem.offsetHeight;
            const animIntemOffset = offset(animItem).top;
            const animStart = 4;

            let animItemPoint = window.innerHeight - animItemHeight / animStart;

            if (animItemHeight > window.innerHeight) {
                animItemPoint = window.innerHeight - window.innerHeight / animStart;
            }

            if ((scrollY > animIntemOffset - animItemPoint) && scrollY < (animIntemOffset + animItemHeight)) {
                animItem.classList.add('activee');
            } else {
                animItem.classList.remove('activee');
            }
        }
    }
    function offset(el) {
        const rect = el.getBoundingClientRect(),
            scrollLeft = window.pageXOffset || document.documentElement.scrollLeft,
            scrollTop = window.scrollY || document.documentElement.scrollTop;
        return { top: rect.top + scrollTop, left: rect.left + scrollLeft }
    }

    animOnScroll();
}