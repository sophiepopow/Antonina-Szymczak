var lightbox = document.getElementById('lightbox');

var images = document.getElementsByClassName('lightbox-slide');
var mainSlide = document.getElementById('lighbox-mainSlide');

function closeLightbox() {
    lightbox.style.display = "none";
}

function openLightbox() {
    lightbox.style.display = "block";
}

var currentSlide =-1;

function setSlide(i){
    if(currentSlide != -1)
        document.getElementById('image'+currentSlide).style.display = 'none';
    document.getElementById('image'+i).style.display = 'block';
    currentSlide = i;
}
function changeSlide(i){
    var slide = currentSlide +i;
    if(slide<0)
        slide = document.getElementById('lightbox-content').childElementCount-1;
    slide %=document.getElementById('lightbox-content').childElementCount;
    setSlide(slide);
}
