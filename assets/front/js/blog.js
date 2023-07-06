$("<p> </p>").remove();

/*start here comment box*/
$("#addcomment").click(function(){
  $("#commentbox").toggleClass("comment_hidden");
});

$("#replybtn").click(function(){
  $("#replybox").toggleClass("comment_hidden");
});


/*end here comment box*/









$.fn.extend({
    treed: function (o) {
      
       if (typeof o != 'undefined'){
        if (typeof o.openedClass != 'undefined'){
        openedClass = o.openedClass;
        }
        if (typeof o.closedClass != 'undefined'){
        closedClass = o.closedClass;
        }
      };
      
        //initialize each of the top levels
        var tree = $(this);
        tree.addClass("tree");
        tree.find('li').has("ul").each(function () {
            var branch = $(this); //li with children ul
            branch.prepend("<i class='indicator glyphicon " + closedClass + "'></i>");
            branch.addClass('branch');
            branch.on('click', function (e) {
                if (this == e.target) {
                    var icon = $(this).children('i:first');
                    icon.toggleClass(openedClass + " " + closedClass);
                    $(this).children().children().toggle();
                }
            })
            branch.children().children().toggle();
        });
        //fire event from the dynamically added icon
      tree.find('.branch .indicator').each(function(){
        $(this).on('click', function () {
            $(this).closest('li').click();
        });
      });
        //fire event to open branch if the li contains an anchor instead of text
        tree.find('.branch>a').each(function () {
            $(this).on('click', function (e) {
                $(this).closest('li').click();
                e.preventDefault();
            });
        });
        //fire event to open branch if the li contains a button instead of text
        tree.find('.branch>button').each(function () {
            $(this).on('click', function (e) {
                $(this).closest('li').click();
                e.preventDefault();
            });
        });
    }
});

//Initialization of treeviews


$('#tree3').treed({openedClass:'fa fa-angle-down', closedClass:'fa fa-angle-right'});










jQuery(document).ready(function () {

        //Pagination JS
        //how much items per page to show
        var show_per_page = 4; 
        //getting the amount of elements inside pagingBox div
        var number_of_items = $('#pagingBox').children().size();
        //calculate the number of pages we are going to have
        var number_of_pages = Math.ceil(number_of_items/show_per_page);
        
        //set the value of our hidden input fields
        $('#current_page').val(0);
        $('#show_per_page').val(show_per_page);
        
        //now when we got all we need for the navigation let's make it '
        
        /* 
        what are we going to have in the navigation?
            - link to previous page
            - links to specific pages
            - link to next page
        */
        var navigation_html = '<a class="previous_link" href="javascript:previous();">Prev</a>';
        var current_link = 0;
        while(number_of_pages > current_link){
            navigation_html += '<a class="page_link" href="javascript:go_to_page(' + current_link +')" longdesc="' + current_link +'">'+ (current_link + 1) +'</a>';
            current_link++;
        }
        navigation_html += '<a class="next_link" href="javascript:next();">Next</a>';
        
        $('#page_navigation').html(navigation_html);
        
        //add active_page class to the first page link
        $('#page_navigation .page_link:first').addClass('active_page');
        
        //hide all the elements inside pagingBox div
        $('#pagingBox').children().css('display', 'none');
        
        //and show the first n (show_per_page) elements
        $('#pagingBox').children().slice(0, show_per_page).css('display', 'block');
    
});





//Pagination JS

function previous(){
    
    new_page = parseInt($('#current_page').val()) - 1;
    //if there is an item before the current active link run the function
    if($('.active_page').prev('.page_link').length==true){
        go_to_page(new_page);
    }
    
}

function next(){
    new_page = parseInt($('#current_page').val()) + 1;
    //if there is an item after the current active link run the function
    if($('.active_page').next('.page_link').length==true){
        go_to_page(new_page);
    }
    
}
function go_to_page(page_num){
    //get the number of items shown per page
    var show_per_page = parseInt($('#show_per_page').val());
    
    //get the element number where to start the slice from
    start_from = page_num * show_per_page;
    
    //get the element number where to end the slice
    end_on = start_from + show_per_page;
    
    //hide all children elements of pagingBox div, get specific items and show them
    $('#pagingBox').children().css('display', 'none').slice(start_from, end_on).css('display', 'block');
    
    /*get the page link that has longdesc attribute of the current page and add active_page class to it
    and remove that class from previously active page link*/
    $('.page_link[longdesc=' + page_num +']').addClass('active_page').siblings('.active_page').removeClass('active_page');
    
    //update the current page input field
    $('#current_page').val(page_num);
}



