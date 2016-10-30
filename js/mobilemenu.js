jQuery(function($) {

//Hide and Show sub-menu-li

        if (window.screen.width < 701) {

    	    $('.menu li').find('ul').parent().addClass('sub-menu-li');
    	    $('.sub-menu-li').prepend('<span>+</span>');
    	    $('.sub-menu-li').addClass('hide');

    	    var menuShow = {
    	        show: function(post){
    	            $('.sub-menu-li ul').slideUp();
    	            $(post).parent().removeClass('show');
    	            $(post).parent().addClass('hide');
    	        },
    	        hide: function(post){
    	            $('.sub-menu-li').removeClass('show');
    	            $('.sub-menu-li').addClass('hide');
    	            $('.sub-menu-li ul').slideUp();
    	            $(post).parent().find('ul').slideDown();
    	            $(post).parent().removeClass('hide');
    	            $(post).parent().addClass('show');
    	        },
    	    };

    	    $('.sub-menu-li span').click(function(){

    	        if($(this).parent().attr("class") == 'sub-menu-li show'){
    	            menuShow.show(this);
    	        }else if($(this).parent().attr("class") == 'sub-menu-li hide'){
    	            menuShow.hide(this);
    	        }
    	    });
            $('.sub-menu-li a').click(function(){
                var klas = $(this).parent().attr("class");          
                if(klas.indexOf('sub-menu-li show') !== -1){
    	            menuShow.show(this);
    	        }else if(klas.indexOf('sub-menu-li hide') !== -1){
    	            menuShow.hide(this);
    	        }

    	        /*if($(this).parent().attr("class") == 'sub-menu-li show'){
    	            menuShow.show(this);
    	        }else if($(this).parent().attr("class") == 'sub-menu-li hide'){
    	            menuShow.hide(this);
    	        }*/
    	    });
        }
	});
