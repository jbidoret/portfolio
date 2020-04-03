

// plyr players
var players = document.querySelectorAll(".player");
if(players.length){
    for(var i = 0; i< players.length; i++) {
        const player = new Plyr(players[i], {
            controls: ['play-large']
        });
    }
}

// slideshows
var elems = document.querySelectorAll('.slideshow');
if(elems.length){
    for(var i = 0; i< elems.length; i++) {
        const flkty = new Flickity( elems[i], {
            pageDots: false
        });
    }
}



// sticky menu
const observer = new IntersectionObserver( 
    ([e]) => e.target.toggleAttribute('stuck', e.intersectionRatio < 1),
    {threshold: [1]}
);
observer.observe(document.querySelector('#nav'));


// bmap
var bmaps = document.querySelectorAll('.bmap');
imagesLoaded( bmaps, function( instance ) {
    bmapize();
});
