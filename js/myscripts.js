//delete images in short content of the article

jQuery(document).ready(function(){
    $("div.short-cont img").remove();
    
});

//delete width and height attributes


jQuery(document).ready(function(){
    if (window.screen.width < 701){
        jQuery('.inner-content').find('img').removeAttr('width');
	    jQuery('.inner-content').find('img').removeAttr('height');
    }

});

// making 2 srtings in blocks on main page

$(document).ready(function(){
    if (window.screen.width < 700) exit;
    $('.main-block').each(function(){
        var string = $(this).children("h2").children("a").html();
        stringar = string.split(' ');
        stringar.push(stringar[stringar.length - 1]);
        stringar[stringar.length - 2] = "<br>";
        string = stringar.join(' ');
        $(this).children("h2").children("a").html(string);
    });
});

// our mission & latest news &sponsors columns resizing

function changeBlockHeight() {
    if (window.screen.width < 700) exit;
    $('.mission .inner-content').css('height', 'auto');
    $('.mission').css('height', 'auto');
    $('.mission').css('overflow', '');
    $('.mission').css('background', 'transparent');
    $('.main-news .inner-content').css('height', 'auto');
    $('.sponsors .inner-content').css('height', 'auto');
    if ($(window).width() < 1750) {
        var news = $('.main-news .inner-content').outerHeight();
        var mis = $('.mission .inner-content').outerHeight();
        if (news > mis) {
            $('.mission .inner-content').outerHeight(news);
        }
        else {
            $('.main-news .inner-content').outerHeight(mis);
        }
    }
    else {
        var oheight = $('.main-block').outerHeight(true);
        var rheight = $('.main-block').height();
        $('.mission').outerHeight(oheight + rheight);
        $('.mission').css('overflow', 'hidden');
        $('.mission').css('background', '#fff');

        var newshieght = $('.main-news  .inner-content').outerHeight();
        $('.sponsors .inner-content').outerHeight(newshieght);
    }
}

$(document).ready(function(){
    changeBlockHeight();
});

// attach footer to bottom

function attachFooter() {
    if (window.screen.width < 700) exit;

    var footh = $('.footer').outerHeight();
    $('.footer').css('margin', '-' + footh + 'px auto 0');
    $('.content').css('padding-bottom', footh + 'px');
}

$(document).ready(function(){
    attachFooter();
});

// header background not main

function notMainBG() {
    if (window.screen.width < 700) exit;

    var hmenu = $('ul.menu').offset().top;
    var path = "<?php echo $path; ?>";
    $('.not-main').css('background', '#01899d url(' + path + '/img/not-main-bg.jpg)  repeat-x 0 ' + hmenu + 'px');

}



//     call functions when window

window.onresize = function ()
{
    if (window.screen.width < 700) exit;

     $('#slide_2').liSlidik({
        auto:0,
        duration: 0
     });

     attachFooter();
     changeBlockHeight();
}

// changing viewport










