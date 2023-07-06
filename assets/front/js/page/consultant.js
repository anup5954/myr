$(".consultant_list_p_tag").text(function(){
    return $(this).text().length > 150 ? $(this).text().substr(0, 150)+'...' : $(this).text();
});




$('#recentconsultant').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    navText : ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:3
        }
    }
})
