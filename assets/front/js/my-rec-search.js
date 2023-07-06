
var locationurl = $(location).attr("href");
var recentSearchKey = 'tf_';
var currency = '$';
var monthn = "";
//-----------------------------------------------------Open Subscription Popup-------------------------------
//try { checkCooksLocStoreInstantCall(); } catch (e) { } if ($.cookie("isClosedMobile") != 'true') {
//    setTimeout(function () {
//        jQuery('.instant-call').show();
//    }, 10000);//--------1000----Open After miliSecond
//}
//-----------------------------------------Check Is Device is Mobile and Screen Height and width

//if ($.cookie("isMobile") == '' || $.cookie("isMobile") === undefined) {
//    if ($(window).width() > 767) {
//        $.cookie("isMobile", "false");
//    } else { $.cookie("isMobile", "true"); }
//    $.cookie("ScreenWidth", $(window).width());
//    $.cookie("ScreenHeight", $(window).height());
//}

//-----------------------------------------------------Open Subscription Popup-------------------------------
if ($(window).width() > 767) {

    localStorage = window.localStorage
    var rurl = window.location.href;
    var root = window.location.protocol + '//' + window.location.host + '/';
    var ResSearchCount = 0;
    try { checkCookLocalStorage(); } catch (e) { }
    var resSearch = 'tf_';
    var MySearchMenu = '';//'<li><strong>No Recent Search History!<br><small>Start Searching Now!</small></strong></li>';
    if (typeof (Storage) !== "undefined") {
        var varInterestedinFlight = '';
        var storagecount = '';
        try {
                if (localStorage.getItem('tf_1') != null) {
                    if (localStorage.length > 0) {//&& localStorage.getItem('isClosed')!='true'
                        MySearchMenu = '';
                        for (var i = 3; i >= 1; i--) {
                            var tryit = '';
                            if (localStorage.getItem('tf_' + i) != null) {
                                ResSearchCount = (parseInt(ResSearchCount) + 1);
                                var resSearch = JSON.parse(localStorage.getItem('tf_' + i));
                                var Journeytypr = '';
                                storagecount++;
                                tripclass = '';
                                if (resSearch.JourneyType === 'R') {
                                    Journeytypr = 'Round Trip';
                                    tripclass = "ic-exchange";
                                }
                                else if (resSearch.JourneyType === 'O') {
                                    Journeytypr = 'One Way';
                                    resSearch.RDate = '';
                                    tripclass = "ic-long-arrow-right";
                                }
                                try {


                                    tryit = '<li>' +
                                        '<div class=\'srch-area-recent\' id=\'tf_' + i + '\'>' +
                                        '<div class=\'d-inline-block recentsearch__list--destination pr-md-1\'>' +
                                        '<div class=\'recentsearch__list--destination--airportcode\'>' + resSearch.JourneyFrom.split('-')[0] + ' <span><i class="' + tripclass + '" ></i></span> ' + resSearch.JourneyTo.split('-')[0] + '</div>' +
                                        '<div>' + Journeytypr + '</div>' +
                                        '</div>' +
                                        '<div class=\'d-inline-block recentsearch__list--travel-date px-md-0 float-right\'>' +
                                        '<div class=\'d-block\'>' +
                                        '<div class=\'d-inline-block\'>Depart: <span>' + GetFormatedDate(resSearch.DDate) + '</span></div>' +
                                        '<div class=\'recentsearch__list--destination--action float-right\'><span><i class=\'ic-bell-o\'></i></span></div>' +
                                        '</div>' +
                                        '<div class=\'d-block mt-2 mt-md-1 mt-lg-2\'>';

                                    if (resSearch.RDate != '') {
                                        tryit = tryit + '<div class=\'d-inline-block\'>Return: <span>' + GetFormatedDate(resSearch.RDate) + '</span></div>';
                                    }

                                    tryit = tryit + '<div class=\'recentsearch__list--destination--action float-right\'><span><i class=\'ic-angle-right\'></i></span></div>' +
                                        '</div></div><div class="clearfix"></div>' +
                                        '</div></li>';
                                    MySearchMenu = MySearchMenu + tryit;
                                } catch (e) {
                                    tryit = '';
                                    $('div.recentSearchDiv').hide();
                                    break;
                                }
                            }
                        }

                       // $('div.recentSearchDiv').show(0);
                        if (ResSearchCount > 0) {
                            $('li#headrecsearch').addClass(' dropdown');
                            $('span.search-count').show(0);
                            $('span.search-count').html(ResSearchCount);
                            $('#MySearchMenu').append('<ul class="recentsearch">' + MySearchMenu + '</ul>')
                        } else { $('span.search-count').hide(0); }
                    } else { $('div.recentSearchDiv').hide(); }
                }
        } catch (e) {
            $('div.recentSearchDiv').hide(0);
            $('li#headrecsearch').removeClass(' dropdown');
        }

    }

} else {
    $('div.recentSearchDiv').hide(0);
}
//-------------------------Popup For Subscribe and Execute Start-----------------------
function checkCooksLocStoreInstantCall() {
    if (!$.cookie('isClosedMobile')) {
        localStorage.setItem('isClosedMobile', 'false');
    }
}
function checkSubsPopupLocalStorage() {
    if (!$.cookie('isClosedSubs')) {
        localStorage.setItem('isClosedSubs', 'false');
    }
}

$(".call_close_btn").click(function () {
    localStorage.setItem('isClosedSubs', 'true');
    var date = new Date();
    var minutes = 960;//cookies will expire in next 10 Minut
    date.setTime(date.getTime() + (minutes * 60 * 1000));
    $.cookie("isClosedSubs", "true", { expires: date });
});

$(".instant-close").click(function () {
    //alert('instant-close called');
    localStorage.setItem('isClosedMobile', 'true');
    var date = new Date();
    var minutes = 960;//cookies will expire in next 10 Minut
    date.setTime(date.getTime() + (minutes * 60 * 1000));
    $.cookie("isClosedMobile", "true", { expires: date });
});




//-------------------------Popup For Andoid Mobile and IOS mobile Detection and Execute End-----------------------
//-------------------------Popup For Andoid Mobile and IOS mobile Detection and Execute Start-----------------------
function checkCookLocalStorage() {
    if (!$.cookie('isClosedFlightSearch')) {
        localStorage.setItem('isClosedFlightSearch', 'false');
    }
}
function checkappPopupLocalStorage() {
    if (!$.cookie('isClosedApp')) {
        localStorage.setItem('isClosedApp', 'false');
    }
}

$(".close_btn").click(function () {
    localStorage.setItem('isClosedApp', 'true');
    var date = new Date();
    var minutes = 120;//cookies will expire in next 10 Minut
    date.setTime(date.getTime() + (minutes * 60 * 1000));
    $.cookie("isClosedApp", "true", { expires: date });
});

$(".redirect_toplace").click(function () {
    localStorage.setItem('isClosedApp', 'true');
    var date = new Date();
    var minutes = 120;//cookies will expire in next 10 Minut
    date.setTime(date.getTime() + (minutes * 60 * 1000));
    $.cookie("isClosedApp", "true", { expires: date });
});
//-------------------------Popup For Andoid Mobile and IOS mobile Detection and Execute End-----------------------
function GetFormatedDate(dateToFormate) {

    var date = new Date(dateToFormate.replace('-', '/').replace('-', '/'));
    var day = date.getDate();
    var month = MonthName(date.getMonth());
    var weekday = WeekDay(date.getDay())
    day = day < 10 ? "0" + day : day;
    return weekday + ", " + month + " " + day;
}

function GetFormatedDateYear(dateToFormate) {

    var date = new Date(dateToFormate.replace('-', '/').replace('-', '/'));
    var day = date.getDate();
    var month = MonthName(date.getMonth());
    var weekday = WeekDay(date.getDay())
    var year = date.getUTCFullYear()
    day = day < 10 ? "0" + day : day;
    return month + " " + day + ", " + year;
}

function BestPriceFormatedDate(dateToFormate) {
    var date = new Date(dateToFormate);
    var day = date.getDate();
    var month = MonthName(date.getMonth());
    var weekday = WeekDay(date.getDay())
    var hh = date.getHours();
    var mm = date.getMinutes();

    var dd = "am";
    var h = hh;
    if (h >= 12) {
        h = hh - 12;
        dd = "pm";
    }
    if (h == 0) {
        h = 12;
    }

    day = day < 10 ? "0" + day : day;
    h = h.toString().length < 2 ? "0" + h : h;
    mm = mm.toString().length < 2 ? "0" + mm : mm;

    return month + " " + day + ", " + h + ":" + mm + dd;
}

function WeekDay(index) {
    var weekday = new Array(7);
    weekday[0] = "Sun";
    weekday[1] = "Mon";
    weekday[2] = "Tue";
    weekday[3] = "Wed";
    weekday[4] = "Thu";
    weekday[5] = "Fri";
    weekday[6] = "Sat";

    return weekday[index];
}

function MonthName(index) {
    var month = new Array();
    month[0] = "Jan";
    month[1] = "Feb";
    month[2] = "Mar";
    month[3] = "Apr";
    month[4] = "May";
    month[5] = "Jun";
    month[6] = "Jul";
    month[7] = "Aug";
    month[8] = "Sep";
    month[9] = "Oct";
    month[10] = "Nov";
    month[11] = "Dec";
    return month[index];
}

function MonthNumber(index) {
    switch (index) {
        case 0:
            month = "1";
            break;
        case 1:
            month = "2";
            break;
        case 2:
            month = "3";
            break;
        case 3:
            month = "4";
            break;
        case 4:
            month = "5";
            break;
        case 5:
            month = "6";
            break;
        case 6:
            month = "7";
            break;
        case 7:
            month = "8";
            break;
        case 8:
            month = "9";
            break;
        case 9:
            month = "10";
            break;
        case 10:
            month = "11";
            break;
        case 11:
            month = "12";
            break;
    }
    return month;
}

function IsSearchTimeExpire(priceexpTime) {
    if (new Date() > new Date(priceexpTime)) {
        return true;
    }
    return false;
}

//$(".close_recent_search").click(function () {
//    $(".recent_search").hide();
//    localStorage.setItem('isClosed', 'true');
//    var date = new Date();
//    var minutes = 10;//cookies will expire in next 10 Minut
//    date.setTime(date.getTime() + (minutes * 60 * 1000));
//    $.cookie("isClosed", "true", { expires: date });
//});




//---------------------------Code to Redirect website to respective Domains----------------------------
var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
};



function Throttle(f, delay) {
    var timer = null;
    return function () {
        var context = this, args = arguments;
        clearTimeout(timer);
        timer = window.setTimeout(function () {
            f.apply(context, args);
        },
            delay || 500);
    };
}


$(document).ready(function () {

    var resSearch = 'tf_';
    if (typeof (Storage) !== "undefined") {
        for (var i = 3; i >= 1; i--) {
            if (localStorage.getItem('tf_' + i) != null) {
                var resSearch = JSON.parse(localStorage.getItem('tf_' + i));
                BindLastSearchInControl(resSearch);
                break;
            }
        }

        if (locationurl.indexOf('business') != -1) {
            $("#ddl_class").val('C');
        } else if (locationurl.indexOf('first') != -1) {
            $("#ddl_class").val('F');
        }
        CalPaxandSet();
    }
    function BindLastSearchInControl(_ressearch) {   
        
        if (window.location.href.indexOf("oneway-flights-deals") > -1) {
            $('input:radio[name="Air"]').prop('checked', false);
            $('input:radio[name="Air"][id=' + 'fltOneway' + ']').prop('checked', true);
            $('input:radio[name="Air"][id=' + 'fltOneway' + ']').trigger('click');
        }
        else {
            $('input:radio[name="Air"]').prop('checked', false);
            var triptype = (_ressearch.JourneyType == 'O' ? 'fltOneway' : 'fltRound')
            $('input:radio[name="Air"][id=' + triptype + ']').prop('checked', true);
            $('input:radio[name="Air"][id=' + triptype + ']').trigger('click');
        }

        $("#txtFlyFrom").val(_ressearch.JourneyFrom);
        $("#txtFlyTo").val(_ressearch.JourneyTo);
        $("#txtFlyTo").addClass('valid');
        $("#txtFlyFrom").addClass('valid');
        $("#txtDepartingDate").val(GetFormatedDateYear(_ressearch.DD_display));
        $("#txtDepartingDate").addClass('valid');
        $("#Adult").val(_ressearch.Adults);
        $("#Children").val(_ressearch.Childs);
        $("#Infant").val(_ressearch.Infants);
        if (triptype == 'fltRound') {
            $("#txtReturnDate").val(GetFormatedDateYear(_ressearch.RD_display));
            $("#txtReturnDate").addClass('valid');
        }
        if (_ressearch.Class == 'F') { $("#ddl_class").val('F'); }
        else if (_ressearch.Class == 'W') { $("#ddl_class").val('W'); }
        else if (_ressearch.Class == 'C') { $("#ddl_class").val('C'); }
        else { $("#ddl_class").val('Y'); }
        $("#txtPreferredAirlines").val(_ressearch.prefAir);
        if (_ressearch.prefAir != "") {
            $("#txtPreferredAirlines").addClass('valid');
        }
    }



    function CalPaxandSet() {
        var adultcount = $('#Adult').val();
        var childcount = $('#Children').val();
        var Infantcount = $('#Infant').val();
        var InfantWithSeat = $('#InfantWithSeat').val();
        var TextBoxvalue = "";

        var TotalPaxcount = parseInt(adultcount) + parseInt(childcount) + parseInt(Infantcount) + parseInt(InfantWithSeat);
        if (TotalPaxcount == 1 && parseInt(adultcount) == 1) { TextBoxvalue = parseInt(TotalPaxcount) + " Adult, " + $('#ddl_class :selected').text(); }
        else {
            TextBoxvalue = parseInt(TotalPaxcount) + " Travelers, " + $('#ddl_class :selected').text();// + $('#ddl_class :selected').text();
        }
        $("#txtclasstype").val(TextBoxvalue);
    }

    function NewMonthName(index) {

        if (index == 01) { index = 1; } else if (index == 02) { index = 2; } else if (index == 03) { index = 3; } else if (index == 04) { index = 4; } else if (index == 05) { index = 5; } else if (index == 06) { index = 6; } else if (index == 07) { index = 7; } else if (index == 08) { index = 8; } else if (index == 09) { index = 9; } else { index = index; }
        switch (index) {
            case 1:
                monthn = "Jan";
                break;
            case 2:
                monthn = "Feb";
                break;
            case 3:
                monthn = "Mar";
                break;
            case 4:
                monthn = "Apr";
                break;
            case 5:
                monthn = "May";
                break;
            case 6:
                monthn = "Jun";
                break;
            case 7:
                monthn = "Jul";
                break;
            case 8:
                monthn = "Aug";
                break;
            case 9:
                monthn = "Sep";
                break;
            case 10:
                monthn = "Oct";
                break;
            case 11:
                monthn = "Nov";
                break;
            case 12:
                monthn = "Dec";
                break;
        }
        return monthn;
    }


    $("div.srch-area-recent").click(function () {
        $('.recentsearch div.srch-area-recent').each(function () {
            //$(this).removeClass('srch-area-recent');
            $(this).attr("disabled", true);
        });
        var localdata = '', url = '';
        var classtyep = '';
        var root = window.location.protocol + '//' + window.location.host + '/';
        var Dd = '', rd = '';
        localdata = JSON.parse(localStorage.getItem(this.id));
        if (IsSearchTimeExpire(localdata.DDate.replace('-', '/').replace('-', '/'))) {

            var d = new Date();
            var day = d.getDate() + 7;
            var rday = d.getDate() + 15;
            var month = MonthNumber(d.getMonth());
            var year = d.getFullYear();
            if (day < 10) {
                day = "0" + day;
            }
            if (rday < 10) {
                rday = "0" + rday;
            }
            if (month < 10) {
                month = "0" + month;
            }
            else {
                month = month;
            }
            Dd = month + "-" + day + "-" + year;
            rd = month + "-" + rday + "-" + year;
        }
        else {
            Dd = localdata.DDate;
            rd = localdata.RDate;
        }
        if (localdata.Class == 'Economy') {
            classtyep = 'Y';
        } else if (localdata.Class == 'Premium Economy') {
            classtyep = 'W';
        }
        else if (localdata.Class == 'Business') {
            classtyep = 'C';
        } else { classtyep = 'Y'; }

        if (localdata.JourneyType == 'R') {
            //$('.loadingDetail').show();
            url = 'flights/recent-search-deals/' + localdata.JourneyType + '/' + localdata.JourneyFrom.split('-')[0].trim() + '/' + localdata.JourneyTo.split('-')[0].trim() + '/' + Dd + '/' + rd + '/' + localdata.Adults + '/' + localdata.Childs + '/' + localdata.Infants + '/' + classtyep + '/';
            //  alert(url);
        } else {
            //$('.loadingDetail').show();
            url = 'flights/recent-search-deals/' + localdata.JourneyType + '/' + localdata.JourneyFrom.split('-')[0].trim() + '/' + localdata.JourneyTo.split('-')[0].trim() + '/' + Dd + '/null/' + localdata.Adults + '/' + localdata.Childs + '/' + localdata.Infants + '/' + classtyep + '/';
            //  alert(url);
        }
        // RoundTrip.........
        //https://www.Tripiflights.com/flights/flight-listing/TRIPIFLIGHTS/R/DEL/JAI/12-10-2016/12-15-2016/1/0/0/Y/QR

        //OneWay........
        //https://www.Tripiflights.com/flights/flight-listing/TRIPIFLIGHTS/O/DEL/JAI/12-10-2016/-/1/0/0/Y/QR
        window.open(root + url, "_self");
        var pax = 'Passenger';
        if ((parseInt(localdata.Adults) + parseInt(localdata.Childs) + parseInt(localdata.Infants) > 1)) {
            pax = 'Passengers';
        }

    });

});