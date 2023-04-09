let contentNode = document.querySelector('#content');
let preloaderNode = document.querySelector('#preloader');


$(document).ready(function(){
    preloaderNode.classList.add('d-none');
    contentNode.classList.remove('d-none');
    })