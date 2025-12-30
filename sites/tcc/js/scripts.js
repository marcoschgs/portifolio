$(function () {

    //CONTROLE DO MENU MOBILE
    $('.mobile_action').click(function () {
         (!$(this).hasClass('active')) 
            $(this).addClass('active');
            $('.main_header_nav').animate({'left': '0%'}, 500);
         
    });

    $('.mobile_action2').click(function () {
        if (!$(this).hasClass('active')) {
            $(this).removeClass('active');
            $('.main_header_nav').animate({'left': '-100%'}, 500);
        } else {
            $(this).addClass('active');
            $('.main_header_nav').animate({'left': '0%'}, 500);
        }
    });

    //HEADER
   

    //Scroll Ancora
    var $doc = $('html, body');
     $('.scrollSuave').click(function() {
        $doc.animate({
            scrollTop:$($.attr(this,'href')).offset().top -99
            
        }, 800);        
        return false;
    });
    //Scroll Ancora
    
    //Menu Ativo
    $(function(){

        var links  = $("#top a");

        $(window).scroll(function(){
            var topScroll = $(window).scrollTop();
            links.each(function(){
               var href       = $(this).attr('href');
               var el         = $(href);
               var posSection = el.offset().top -101 ;
               var hSection   = el.height();

                if(posSection <= topScroll && (posSection + hSection) > topScroll){
                    links.removeClass('menuAtivo')
                    $(this).addClass('menuAtivo');
                }else{
                    $(this).removeClass("menuAtivo");
                }
            });
        });

    });
    //Menu Ativo

    //Magnific Popup
    $('.galeria-foto').magnificPopup({ 
      type: 'image',
      delegate: 'a',
      
      gallery:{enabled:true},
      callbacks: {
        
        buildControls: function() {
         
          this.contentContainer.append(this.arrowLeft.add(this.arrowRight));
        }
        
      }
    });

});