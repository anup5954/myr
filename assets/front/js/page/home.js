$(".p_text").text(function(index, currentText) {
    return currentText.substr(0, 1100) + '...';
});

$('#homebanner').owlCarousel({
    loop:true,
    margin:0,
    nav:false,
    autoplay:true,
    autoplayTimeout:3000,
    autoplayHoverPause:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
})


$('#clientviews').owlCarousel({
    loop:true,
    margin:20,
    nav:false,
    autoplay:true,
    autoplayTimeout:1000,
    autoplayHoverPause:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1.2
        },
        1000:{
            items:3
        }
    }
})


$('#clientimg').owlCarousel({
    loop:true,
    margin:10,
    nav:false,
    autoplay:true,
    autoplayTimeout:1500,
    autoplayHoverPause:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
})


