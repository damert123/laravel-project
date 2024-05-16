document.body.onload = function(){
    setTimeout (function(){
        var preloader = document.getElementById('preloader');
        if (!preloader.classList.contains('hide-loader'))
        {
            preloader.classList.add('hide-loader')
        }
    }, 1500);
}