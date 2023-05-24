$j(window).on("orientationchange", function() {
    if (location.hash) {
        if (location.hash != '#/') {
            $j("html,body").animate({
                scrollTop: $j(location.hash).offset().top
            }, "slow", function() {
                $j('.header-outer').removeClass('nav-down');
            });

        }
    }
});

$j(document).ready(function() {
    currWidth = $j(window).innerWidth();
});


/*window.addEventListener("orientationchange", function() {
  if($j('.menuWrapper').length > 0){
    setTimeout(function(){
      scrollAmount = $window.scrollTop();      
      menuOffset = $j('.menuWrapper').offset().top;
      //windowScrollHandler();
    },700);
  }
  //scrollAmount = $window.scrollTop();      
  //menuOffset = $j('.menuWrapper').offset().top;
  
});*/

$j(document).on("click touchstart", function(event) {
    //e.stopPropagation();
    if (!$j(event.target).closest('.career-dd').length && !$j(event.target).closest('.career-ul').length && !$j(event.target).closest('.career-section-txt').length) {

    }

    if (currWidth > 991) {
        if (!$j(event.target).closest('.career-dd').length && !$j(event.target).closest('.career-ul').length) {
            if ($j(".career-dd").hasClass("open")) {
                $j(".career-dd.open").siblings("ul").slideUp();
                $j(".career-dd.open").removeClass("open");
            }
        }
    } else {
        if (!$j(event.target).closest('.career-dd').length && !$j(event.target).closest('.career-ul').length && !$j(event.target).closest('.career-section-txt').length) {
            if ($j(".career-dd").hasClass("open")) {
                $j(".career-dd.open").siblings("ul").slideUp();
                $j(".career-dd.open").removeClass("open");
                $j('body').removeClass('no-wcroll');
            }
        }
    }
});

function handleVideoPause(thisSection, scrollAmount) {
    //pausing the video on scroll towards top
    var thisSectionTop = "";

    if ($j(".stickyNavWrap").length == 1) {
        thisSectionTop = thisSection.offset().top - $j(".stickyNavWrap").outerHeight();
    } else {
        thisSectionTop = thisSection.offset().top;
    }

    //pausing the video on scroll towards top
    if (thisSection.find(".inv_playerContainer").length != 0) {
        //SCROLL DIRECTION UP
        var SectionTop = thisSectionTop;
        var scrollBottom = scrollAmount + (viewport().height / 2);
        if (scrollBottom < SectionTop && SectionTop < (scrollAmount + (viewport().height))) {
            //thisSection.find(".inv_playerContainer").pauseVideo();
            //console.log("pauseUp");
        }

        //SCROLL DIRECTION DOWN

        var halfSectionScroll = thisSectionTop + (thisSection.outerHeight() / 2);
        if (scrollAmount > halfSectionScroll && scrollAmount < thisSectionTop + thisSection.outerHeight()) {
            //thisSection.find(".inv_playerContainer").pauseVideo();
            //console.log("pauseDown");
        }
    }
}


function timeOutClick(arrI, i) {
    //alert(arrI);
    if (arrI.indexOf('$') == -1) {
        setTimeout(function() {

            if ($j("#" + arrI).closest('.async-tabs')[0]) {
                if ($j(window).width() > '767') {
                    $j('.async-tabs .desk-tab-with-icon-normal').find("#" + arrI).trigger("click");
                } else {
                    $j('.async-tabs .mobi-tabs-list').find("#" + arrI).trigger("click");
                }
            } else {
                $j("#" + arrI).trigger("click");
            }


        }, i * 500);
    }
}

var globalHash = "";
$j(document).ready(function() {


    $j('.section').each(function() {
        $j(this).attr('id', 'section-' + $j(this).attr('id'));
    });

    $j('.career-ul li a').each(function() {
        $j(this).attr('href', '#section-' + $j(this).attr('href').split('#')[1]);
    });


    if (location.hash.indexOf('section-') < -1 || location.hash == '#/') {
        globalHash = location.hash;
    } else {
        globalHash = '#section-' + location.hash.split('#')[1];
    }


    // scrollTo(0, 0);


    $j(document).on('click', ".career-dd", function() {
        if (!$j(this).hasClass("open")) {
            $j(".career-dd.open").siblings("ul").slideUp();
            $j(".career-dd.open").removeClass("open");
            $j("body").removeClass("no-wcroll");
        }
        if (!$j(this).siblings("ul").is(":animated")) {
            $j(this).toggleClass("open");
            $j("body").toggleClass("no-wcroll");
            $j(this).siblings("ul").slideToggle();
        }
    });


});
var lastPosition = -1;
$window = $j(window);
$j(window).load(function() {

    $j(".filter-slider").height(viewport().height - $j(".fixed-header").outerHeight());

    /*----------- Sticky nav start ----*/
    /*  var noOfLi =  $j(".menuWrapper ul li").length;
      $j(".menuWrapper ul li").outerWidth((100/noOfLi)+"%");*/
    /*----------- Sticky nav end ----*/


    /*  if (currWidth >= 992 && $j('#stickyNav').length > 0) {
        $j('.menuWrapper li a').height($j('.menuWrapper ul').height());
      }
      else{
        $j('.menuWrapper li a').height('auto');
      }
      */



    /*----------- Sections Landing Navigation starts -------------*/
    if ($j('.menuWrapper').length > 0) {
        menuOffset = $j('.menuWrapper').offset().top;
        //var hash = location.hash;
        var hash = globalHash;
        if (hash == "") {
            //hash = "#home";
            hash = "#/";
        }

        var $selec = $j(hash.split("/")[0]);
        //$selec.attr("id", "");
        if (location.hash.length > 0) {
            //if(hash != "#home")
            if (hash != "#/")
                setTimeout(function() {
                    var toClick = "";
                    if (hash.indexOf("/") > 0) {
                        arr = hash.split("/");
                        //$selec.attr("id", arr[0].substring(1, arr[0].length));
                        //$j(".menuWrapper li a[href='"+hash+"']").trigger("click");
                        $selec.attr("data-hash", hash);
                        $j(".menuWrapper li a[href='" + arr[0] + "']").trigger("click");
                        $j("body").append("<div class='fullLoader'></div>");
                        for (i = 1; i < arr.length; i++) {
                            var arrI = arr[i];
                            timeOutClick(arrI, i);
                        }
                        setTimeout(function() {
                            $j(".fullLoader").fadeOut();
                        }, (500 * i) + 100);
                    } else {
                        //$selec.attr("id", hash.substring(1, hash.length));
                        $selec.attr("data-hash", hash);
                        $j(".menuWrapper li a[href='" + hash + "']").trigger("click");
                    }
                }, 4000);
        }
    } else {
        var hash = globalHash;

        /* Code Updated on 16-01-2018 Start */
        if ($j('.stickyNavWrap').length === 0) {
            if ($j('.prgm-view-all').length > 0) {
                arrLAT = hash.split("/");
                setTimeout(function() {
                    $j("#" + arrLAT[1]).trigger("click");
                }, 500);

                $j("html,body").animate({
                    //scrollTop: ($j('.prgm-view-all').offset().top - 30)
                }, 600);
            }
        }
        /* Code Updated on 16-01-2018 End */


        if (hash == "") {
            //hash = "#home";
            hash = "#/";
        }
        // scrollTo(0, 0);
        if (hash != "#/") {

            var currSection = hash.split("/")[0];

            if ($j(currSection)[0]) {
                // console.log($j(currSection).offset().top + 0.9);
                $j("html,body").animate({
                    scrollTop: $j(currSection).offset().top + 0.9
                }, "slow", function() {
                    //alert($j(currSection).attr("data-hash"));
                    $j(currSection).attr("data-hash", hash);
                });
            }

        }
    }
    var stickyNavWrapHt = $j('.stickyNavWrap').outerHeight();

    /*$j(document).on('click', '.menuWrapper li.newlink a', function(e) {
      var newNavLink = $j(this).attr('data-nav-url');
      //alert(newNavLink);
      location.href(newNavLink);
      //window.open(newNavLink);
    });*/

    $j(document).on('click', '.menuWrapper li a', function(e) {

        if ($j(this).parent().hasClass('newlink newwindow')) {
            var newNavLink = $j(this).attr('data-nav-url');
            window.open(newNavLink);
        }

        if ($j(this).parent().hasClass('newlink samewindow')) {
            var newNavLink1 = $j(this).attr('data-nav-url');
            self.location.href = newNavLink1;
            //window.open(newNavLink);
        }

        e.preventDefault();
        var thisSelec = $j(this);
        var sect = $j(this).attr('href');
        $j("html,body").animate({
            scrollTop: ($j(sect).offset().top - stickyNavWrapHt) + 6.5
        }, "1000", function() {});
        // console.log($j(sect).offset().top - stickyNavWrapHt);
        if ($j(".menuWrapper .career-dd").hasClass("open")) {
            $j(".menuWrapper .career-dd").trigger("click");
        }
        setTimeout(function() {
            $j('.header-outer,.stickyNavWrap,.header-outer-dummy,.stickyNavI').removeClass('nav-down').addClass('nav-up');
        }, 900);

    });

    /*----------- Sections Landing Navigation ends -------------*/



    windowScrollHandler();


});

window.onscroll = function() {

    windowProgressbar();
};

function windowProgressbar() {
    var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
    var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    var scrolled = (winScroll / height) * 100;
    //console.log(scrolled);
    $j(".srcollDistance").css('width', scrolled + "%");
}


$j(window).resize(function() {
    //if($j('.menuWrapper').length > 0){
    /*setTimeout(function(){
        scrollAmount = $window.scrollTop();      
        menuOffset = $j('.menuWrapper').offset().top;
        //windowScrollHandler();
      },700);*/
    //}
    //requestAnimationFrame();

});


/*
$j(window).on('resize', function() {
  setTimeout(function(){
    scrollAmount = $window.scrollTop();
    menuOffset = $j('.menuWrapper').offset().top;
    console.log(scrollAmount);
    console.log(menuOffset);
  },700);
});
*/

var resizeId;
$j(window).resize(function() {
    clearTimeout(resizeId);
    resizeId = setTimeout(doneResizing, 700);
});

function doneResizing() {
    //scrollAmount = $window.scrollTop();
    if ($j('.stickyNavWrap').lenght > 0) {
        menuOffset = $j('.stickyNavWrap').removeClass('fixed');
        $j('.menuWrapper li a.active').trigger('click');
        menuOffset = $j('.menuWrapper').offset().top;
    }
}
/*
window.onresize = resize;
function resize()
{
  scrollAmount = $window.scrollTop();      
  menuOffset = $j('.menuWrapper').offset().top;
  console.log(scrollAmount);
  console.log(menuOffset);
}*/

//$j(window).bind("resize.browsersize", function() {

function windowScrollHandler() {

    requestAnimationFrame(function() {
        var scrollDir = lastPosition > $window[0].pageYOffset ? "up" : "down";
        if (lastPosition == $window[0].pageYOffset) {
            windowScrollHandler();
            return false;
        } else lastPosition = $window[0].pageYOffset;

        scrollAmount = $window.scrollTop();

        //console.log(scrollAmount);
        //var sectionNum = R_SECTIONS_OFFSET_TOP_ARR.length;

        //if(!$j("#footer-search").hasClass("open")){
        //}
        //country-landing nav
        //if ($j(".homecontentwrapper").length > 0)
        //countryNav(scrollAmount);

        //Sections Landing Sticky Navigation
        if ($j('.menuWrapper').length > 0) {
            var maxOffset = $j('.stickyNavWrap').parents('body').outerHeight() - $j('.menuWrapper').outerHeight();
            //console.log(menuOffset);
            // menuOffset = $j('.menuWrapper').offset().top;
            var currSectionNo = 1;
            //console.log(menuOffset + '--' + scrollAmount);

            if (!($j('html').hasClass("mm-opened"))) {
                if ((menuOffset - scrollAmount) <= 0) {
                    $j('.stickyNavWrap').css('top', 'auto');
                    $j('.stickyNavWrap').addClass('fixed');

                    $j('.homecontentwrapper,.full-width-banner').addClass('fixedMenu');
                    //currSectionNo = 1;
                    $j('.section').each(function(i) {
                        if ($j(this).offset().top - $j('.stickyNavWrap').outerHeight() <= scrollAmount) {
                            if (scrollAmount != (maxOffset - viewport().height)) {

                                $j('.menuWrapper li a.active').removeClass('active');
                                $j('.menuWrapper li a[href="#' + $j(this).attr("id") + '"]').addClass('active');
                                currSectionNo = i + 1;
                            } else {
                                $j('.menuWrapper li a.active').removeClass('active');
                                $j('.menuWrapper li:last a').addClass('active');
                                currSectionNo = $j('.menuWrapper li').length;
                            }
                        }
                        handleVideoPause($j(this), scrollAmount);
                    });
                } else {
                    $j('.stickyNavWrap').removeClass('fixed');
                    menuOffset = $j('.menuWrapper').offset().top;
                    //setTimeout(function(){

                    if ($j(window).width() > '991') {
                        var stickyHt = $j('.stickyNavWrap').outerHeight();
                    } else {
                        var stickyHt = $j('.stickyNavWrap .career-section-txt').outerHeight();
                    }

                    var bannerHt = $j('.homecontentwrapper,.full-width-banner').outerHeight() - stickyHt;


                    $j('.stickyNavWrap').css('top', bannerHt);
                    //},500);

                    $j('.homecontentwrapper,.full-width-banner').removeClass('fixedMenu');
                    $j('.menuWrapper li a').removeClass('active');
                }

            }

            //Navigation fill effect
            //console.log(currSectionNo + ' first if' + tobeFilled);
            var el = $j('.menuWrapper li a.active');
            var id = el.attr("href");
            var selec = $j(id);
            var tobeFilled = (currSectionNo - 1) * $j('.menuWrapper li').outerWidth();
            if (scrollAmount < (maxOffset - viewport().height)) {
                prevSelec = currSectionNo === 0 ? $j(".section").first() : $j('.menuWrapper li a').eq(currSectionNo - 1).attr("href");
                //console.log(currSectionNo + ' first if' + tobeFilled);

                var heightToBeTravelled = $j(prevSelec).outerHeight();
                var prevSelectDist = 0;
                if (typeof($j(prevSelec).offset()) === 'undefined') {
                    prevSelectDist = 0;
                } else {
                    prevSelectDist = $j(prevSelec).offset().top;
                }
                var distanceTravelled = scrollAmount - prevSelectDist;
                if (currSectionNo > 0 && distanceTravelled > 0) {
                    tobeFilled += ($j('.menuWrapper li').outerWidth() * distanceTravelled) / heightToBeTravelled;
                }
            } else {
                tobeFilled = "100%";
            }
            //      $j(".srcollDistance").width(tobeFilled);


            //location hash update
            if (id != undefined) {
                if (location.hash != id) {
                    var ID = selec.attr('id');
                    selec.attr('id', "");

                    location.hash = selec.attr("data-hash") || id;
                    selec.attr('id', ID);

                    $j('.selected-section').html($j(".menuWrapper ul li a.active").html());
                }
            } else {
                //location.hash = "#home";
                location.hash = "#/";

            }
        }
        windowScrollHandler();
    });
}
//});
// MIT license
(function() {
    var lastTime = 0;
    var vendors = ['ms', 'moz', 'webkit', 'o'];
    for (var x = 0; x < vendors.length && !window.requestAnimationFrame; ++x) {
        window.requestAnimationFrame = window[vendors[x] + 'RequestAnimationFrame'];
        window.cancelAnimationFrame = window[vendors[x] + 'CancelAnimationFrame'] || window[vendors[x] + 'CancelRequestAnimationFrame'];
    }
    if (!window.requestAnimationFrame) window.requestAnimationFrame = function(callback, element) {
        var currTime = new Date().getTime();
        var timeToCall = Math.max(0, 16 - (currTime - lastTime));
        var id = window.setTimeout(function() {
            callback(currTime + timeToCall);
        }, timeToCall);
        lastTime = currTime + timeToCall;
        return id;
    };
    if (!window.cancelAnimationFrame) window.cancelAnimationFrame = function(id) {
        clearTimeout(id);
    };
}());