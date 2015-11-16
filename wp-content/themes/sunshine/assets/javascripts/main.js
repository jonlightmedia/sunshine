

var util = {
    Global: {
        init: function() {
        this.Global();
        this.Menu();
        this.Slider();
        this.Forms();
        this.Tabbed();
      },


      Global: function(){

          var sub_child = 0;
          var winsize = $(window).outerHeight();
          var headh = $('.l-header').outerHeight();
          var conth = $('.l-content');
          var adminbar = $('#wpadminbar').outerHeight();
          var footh = $('.l-footer').outerHeight();
          var toth =  winsize - (headh + footh + adminbar);
          conth.css('min-height',toth);
          conth.css('padding-top',headh);
          $('.banner-main').css('height',(winsize - (headh + adminbar)));
          causeRepaintsOn = $("h1, h2, h3, p");
           $('.l-header').css('top',adminbar);
          
          $( window ).resize(function() {

              winsize = $(window).outerHeight();
              headh = $('.l-header').outerHeight();
              adminbar = $('#wpadminbar').outerHeight();
              conth = $('.l-content');
              footh = $('.l-footer').outerHeight();
              toth =  winsize - (headh + footh + adminbar);
              conth.css('min-height',toth);
              conth.css('padding-top',headh);
              $('.banner-main').css('height',(winsize - (headh + adminbar)));
              causeRepaintsOn.css("z-index", 1);
              $('.l-header').css('top',adminbar);

          });    

          $(window).scroll(function (event) {
              var scroll = $(window).scrollTop();
              if(scroll>200){
                 $('.l-header').addClass('shrink');
              }else{
                 $('.l-header').removeClass('shrink');
              }
          });

          var max_val = 0;
          var max_val2 = 0;
          $('.col-mirror').each(function() {
            var min_val = $(this).outerHeight();
            if (max_val<min_val) {
              max_val = min_val;
            };
             $('.col-mirror').css('min-height',max_val);
          });
           $('.well-mirror').each(function() {
            var min_val = $(this).outerHeight();
            if (max_val2<min_val) {
              max_val2 = min_val;
            };
             $('.well-mirror').css('min-height',max_val2);
          });

          $( window ).resize(function() {
            max_val = 0;
            max_val2 = 0;
            $('.col-mirror').each(function() {
              var min_val = $(this).outerHeight();
              if (max_val<min_val) {
                max_val = min_val;
              };
               $('.col-mirror').css('min-height',max_val);
            });
             $('.well-mirror').each(function() {
            var min_val = $(this).outerHeight();
            if (max_val2<min_val) {
              max_val2 = min_val;
            };
             $('.well-mirror').css('min-height',max_val2);
          });
          }); 

         $( "#menu-primary .menu-item-has-children").each(function(){
              sub_child = $(this).find(".sub-menu").children().length;

              $(this).find('a').append('<span class="expand">'+sub_child+'<i class="fa icon"></i></span>');
         });

         $('.well-shorten .show-more').click(function(){
            
            $(this).parent().parent('.well-shorten').find('p').slideToggle('fast');
            $(this).find('.t-title').text(function(i, text){
                return text === "Show less" ? "Show more" : "Show less";
            })
            $(this).find('.icon').toggleClass('icon-chevron-thin-up');

            return false;
          });
      },
      Tabbed: function(){
          $('.section-tabbed li a').click(function(){
            var tabbed_tar = $(this).attr('href');
            $('.section-tabbed li a').removeClass('active');
            $(this).addClass('active');
            $('.section-tabbed-contents .section-tabbed-item').removeClass('in');
            $(tabbed_tar).addClass('in');

            return false;
          });
      },
      Forms: function(){

      },
      Menu: function(){
          
          $('#cssmenu').prepend('<div id="indicatorContainer"><div id="pIndicator"><div id="cIndicator"></div></div></div>');
            var activeElement = $('#cssmenu>ul>li:first');

            $('#cssmenu>ul>li').each(function() {
                if ($(this).hasClass('active')) {
                    activeElement = $(this);
                }
            });

          var posLeft = activeElement.position().left;
          var elementWidth = activeElement.width();
          posLeft = posLeft + elementWidth/2 -6;
          if (activeElement.hasClass('has-sub')) {
            posLeft -= 6;
          }

          $('#cssmenu #pIndicator').css('left', posLeft);
          var element, leftPos, indicator = $('#cssmenu pIndicator');
          
          $("#cssmenu>ul>li").hover(function() {
                element = $(this);
                var w = element.width();
                if ($(this).hasClass('has-sub'))
                {
                  leftPos = element.position().left + w/2 - 12;
                }
                else {
                  leftPos = element.position().left + w/2 - 6;
                }

                $('#cssmenu #pIndicator').css('left', leftPos);
            }
            , function() {
              $('#cssmenu #pIndicator').css('left', posLeft);
            });
          $( "#menu-button" ).click(function(){
              if ($(this).parent().hasClass('open')) {
                $(this).parent().removeClass('open');
              }
              else {
                $(this).parent().addClass('open');
              }
            });
      },


      Slider: function(){
         $(".post-list-clients").owlCarousel({
            itemsCustom : [
              [0, 1],
              [450, 1],
              [600, 2],
              [700, 3],
              [900, 3],
              [1300, 5],
            ],
            navigation : true,
            navigationText : ["<span class='icon icon-arrow-l'></span>","<span class='icon icon-arrow-r'></span>"],
          });
      }
    },

    Front: {
      init: function() {
        this.Custom();
      },
      Custom: function(){
        var headh = $('.l-header').outerHeight();
        var next_scroll = $("#steps").offset().top;
        next_scroll = next_scroll-(headh+20);
        $(".link-scroll, .show-more-link").click(function() {
            $('html, body').animate({
                scrollTop: next_scroll
            }, 1000);
        });
      },
      
    }
};



