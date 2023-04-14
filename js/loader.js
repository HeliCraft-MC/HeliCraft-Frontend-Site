let loaderNode = document.querySelector('.preloader');
let contentNode = document.getElementById('content');

function dispNone(){
    loaderNode.classList.remove('preloaderHidden');
    loaderNode.classList.add('d-none');
}

$('#container').imagesLoaded( function() {
    contentNode.classList.remove('hidden');
    loaderNode.classList.add('preloaderHidden');
    setTimeout(dispNone, 500)
  });
