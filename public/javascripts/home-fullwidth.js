$j(window).resize(function() {
    if (viewport().width > 767) {
        if ($j('.tabbed-vid-img-wrapperA').outerWidth() > 1400) {
            var height45 = parseInt((1400 * 45) / 100);
        } else {
            var height45 = parseInt(($j('.tabbed-vid-img-wrapperA').outerWidth() * 45) / 100);
        }
        $j('.VideoFullWidthParentCon,.VideoParentCon').height(height45);
    }

});

$j(window).load(function() {
    $j(document).on('click', '.inv_videoListThumbnail', function() {
        if (viewport().width <= 767) {

            $j("html, body").animate({
                scrollTop: $j('.inv_ParentContainer').offset().top - 110
            }, 500);
        }

    });
});

/*---VGP Form reset Button---*/
var msg = '';

/*--Text box/aera clicks--*/
$j(document).on("keyup", ".vgp-wrapper input[type=text], .vgp-wrapper textarea", function(e) {
    var count = 0;
    $j(".vgp-wrapper .inputs:not(.hide) input[type=text],.vgp-wrapper textarea,.vgp-wrapper .hasDatepicker").each(function(i) {
        if ($j(this).val().length > 0) {
            count++;
        }
    }).promise().done(function() {
        if (count < 1) {
            $j(".vgp-wrapper").find('.btn-reset input').attr('disabled', 'disabled').addClass('disabled');
        } else {
            $j(".vgp-wrapper").find('.btn-reset input').removeAttr('disabled').removeClass('disabled');
        }
    });
});

/*--Date picker clicks--*/
$j(document).on("blur", ".vgp-wrapper .last-service,.vgp-wrapper .next-service", function(e) {
    var count = 0;
    $j(".vgp-wrapper .last-service,.vgp-wrapper .next-service").each(function(i) {
        if ($j(this).find(".filled")) {
            count++;
        }
    }).promise().done(function() {
        if (count < 1) {
            $j(".vgp-wrapper").find('.btn-reset input').attr('disabled', 'disabled').addClass('disabled');
        } else {
            $j(".vgp-wrapper").find('.btn-reset input').removeAttr('disabled').removeClass('disabled');
        }
    });
});

/*--Radio clicks--*/
$j(document).on("click", ".vgp-wrapper input[type=radio]", function(e) {
    // alert();
    var count = 0;
    count++;
    if (count < 1) {
        $j(".vgp-wrapper").find('.btn-reset input').attr('disabled', 'disabled').addClass('disabled');
    } else {
        $j(".vgp-wrapper").find('.btn-reset input').removeAttr('disabled').removeClass('disabled');
    }
});


var resetButton = $j(".vgp-wrapper").find('.btn-reset input');

$j(resetButton).click(function() {
    if (!$j(this).hasClass('disabled')) {
        $j(this).attr('disabled', 'disabled').addClass('disabled');
    }
});



/*---/ VGP Form reset Button---*/

/* Page Up Show Menu End */


/* Mobi Detect Starts */
isMobile = {
    Android: function() {
        return navigator.userAgent.match(/Android/i);
    },
    BlackBerry: function() {
        return navigator.userAgent.match(/BlackBerry/i);
    },
    Opera: function() {
        return navigator.userAgent.match(/Opera Mini/i);
    },
    Windows: function() {
        return navigator.userAgent.match(/IEMobile/i);
    },
    iOS: function() {
        return navigator.userAgent.match(/iPhone|iPad|iPod/i);
    },
    any: function() {
        return (isMobile.Android() || isMobile.BlackBerry() || isMobile.Opera() || isMobile.Windows() || isMobile.iOS());
    }
};
/* Mobi Detect Ends */

$j(document).on('click touchstart', function(event) {
    if (!$j(event.target).closest('#ddTypeOfProduct').length) {
        if ($j('.drop-title').hasClass("active")) {
            $j('.drop-title').removeClass("active");
            $j('.drop-title').next().slideUp();
        }
    }

    if (!$j(event.target).closest('.mobi-tabs-menu').length && !$j(event.target).closest('.mobi-tabs-list').length) {
        if ($j('.mobi-tabs-menu').hasClass('active')) {
            $j('.mobi-tabs-list').slideUp('500', function() {
                $j('.mobi-tabs-list').css('overflow', '');
                $j('.mobi-tabs-menu').removeClass("active");
            });
        }
    }


});



$j(document).on("change", ".right-fields select", function(e) {
    e.preventDefault();
    $j(this).parents('.field').siblings('.drop-title').html($j(this).val());
    $j(this).parents('.field').siblings('.drop-title').trigger("click");
});

var videos_loaded = 0;
var inv_video_debug_mode = false;

/*------------------ Module Downloads and Contacts 50-50 -------------------*/

$j(window).resize(function() {

    setTimeout(function() {
        slider_arrows_adjust('.contacts-card-slider');
        slider_arrows_adjust('.downloads-list-slider');

    }, 200);

});

function OSgoToByScroll(id) {
    $j('html,body').animate({
        scrollTop: $j(id).offset().top - 100
    }, 'slow');
}

$j(document).ready(function() {

    var mypagename = $j("body").attr("id");
    if (mypagename === "sustainability") {
        $j(".hsp-main").hide();
        var totalboxes = $j(".hsp-main").length;
        if (totalboxes <= 8) {
            $j(".hsp-main").slice(0, 8).show();
            $j("#airline-loadmore-wrapper").fadeOut('fast');
        } else {
            $j(".hsp-main").slice(0, 8).show();
            $j("#airline-loadmore-wrapper").fadeIn('fast');
        }
    }

    $j(".airline-loadmore").on('click', function(e) {
        e.preventDefault();
        //$j(".hsp-main:hidden").slice(0, 8).show();
        $j(".hsp-main:hidden").slice(0, 8).show();
        //setImagesHeightEqual();
        var vlviewport = viewport().width;
        if (vlviewport <= 640) {
            $j('.home-mid-fw-inner1 .hsp-main').height('361');
            $j('.home-mid-fw-inner1 .hsp-main .hsp-img').height('361');
            $j('.home-mid-fw-inner1 .hsp-main .hsp-img img').height('auto');
        } else {

            $j('.home-mid-fw-inner1 .hsp-main').height('auto');
            // $j('.home-mid-fw-inner1 .hsp-main .hsp-img').height('auto');
            //$j('.home-mid-fw-inner1 .hsp-main .hsp-img img').height('auto');
        }
        if ($j(".hsp-main:hidden").length === 0) {
            $j("#airline-loadmore-wrapper").fadeOut('slow');
        }
    });



    /*------------------ Interactive Content - Our Strategy - start -------------------*/

    var osdevicewidth = viewport().width;
    $j("#overview .interactive-content-wrapper .int-box").each(function(index) {
        $j(this).mouseover(function() {
                var myintbox = "#" + $j(this).attr("id") + "-text";
                //console.log(osdevicewidth);
                if (osdevicewidth === 736 || osdevicewidth === 667 || osdevicewidth === 640 || osdevicewidth === 375) {
                    OSgoToByScroll(".int-content-text");
                }
                $j(myintbox).show();
            })
            .mouseout(function() {
                $j("#overview .int-box-text").hide();
            });
    });
    /*------------------ Interactive Content - Our Strategy - start -------------------*/


    /*------------------ Interactive Content - Our Strategy - start -------------------*/

    var osdevicewidth = viewport().width;
    $j("#our-business-system .interactive-content-wrapper-obs.hidden-xs .int-box").each(function(index) {
        $j(this).mouseover(function() {
                var myintboxobs = "#" + $j(this).attr("id") + "-text-obs";
                //console.log(myintboxobs);
                $j(myintboxobs).show();
            })
            .mouseout(function() {
                $j("#our-business-system .int-content-text-obs .int-box-text-obs").hide();
            });
    });


    $j("#our-business-system .interactive-content-wrapper-obs.interactive-content-wrapper-obs-mob .int-box").each(function(index) {
        $j(this).mouseover(function() {
                var myintboxobsMob = "#" + $j(this).attr("id") + "-text-obs-mob";
                $j(myintboxobsMob).show();
                OSgoToByScroll(".int-content-text-obs-mob");
            })
            .mouseout(function() {
                $j("#our-business-system .int-content-text-obs-mob .int-box-text-obs-mob").hide();
            });
    });
    /*------------------ Interactive Content - Our Strategy - start -------------------*/


    var options = {
        infinite: false,
        dots: true,
        prevArrow: "<span class='rr-icon-arrow-nav slick-prev'></span>",
        nextArrow: "<span class='rr-icon-arrow-nav slick-next'></span>",
        slidesToShow: 1,
        slidesToScroll: 1,
        speed: 300,
        responsive: [{
                breakpoint: 992,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    dots: true
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    dots: true
                }
            }
        ]
    };

    $j('.contacts-card-slider').each(function() {
        if ($j(this).find('.fw-sld-inner-box').length > 1) {
            $j(this).not('.slick-initialized').slick(options);
        }
    });

    $j('.downloads-list-slider').each(function() {
        if ($j(this).find('.downloads-bar').length > 3) {

            var divs = $j(this).find('.downloads-bar');
            for (var i = 0; i < divs.length; i += 3) {
                divs.slice(i, i + 3).wrapAll('<div class="downloads-list-slide"></div>');
            }
        }
    }).promise().done(function() {
        $j('.downloads-list-slider').each(function() {
            if ($j(this).find('.downloads-list-slide')[0]) {
                $j(this).not('.slick-initialized').slick(options);
            }
        });
    });

    slider_arrows_adjust('.contacts-card-slider');
    slider_arrows_adjust('.downloads-list-slider');


    setTimeout(function() {
        $j('.downloads-contacts-wrapper').each(function() {
            setEqualHeight_CommonClass($j(this).find('.equal-height'));
        });
    }, 200);




    /*----------------- Module Downloads and Contacts 50-50 ends -------------------*/


    if (viewport().width > 767) {
        if ($j('.tabbed-vid-img-wrapperA').outerWidth() > 1400) {
            var height45 = parseInt((1400 * 45) / 100);
        } else {
            var height45 = parseInt(($j('.tabbed-vid-img-wrapperA').outerWidth() * 45) / 100);
        }
        $j('.VideoFullWidthParentCon,.VideoParentCon').height(height45);
    }


    $j('.new-video-play-list-item').each(function() {
        if ($j('.new-video-play-list-item').length > 0) {
            var vidListID = $j(this).attr('ID');
            /*var vidListVIDEOid = '"'+$j(this).attr("data-vid-id")+'"';
            var vidListTags =  '"'+$j(this).attr("data-vid-tags")+'"';
            var vidListText = '"'+$j(this).attr("data-vid-text")+'"';*/

            var vidListVIDEOid = $j(this).attr("data-vid-id");
            var vidListTags = $j(this).attr("data-vid-tags");
            var vidListText = $j(this).attr("data-vid-text");

            /*console.log(vidListID);
            console.log(vidListVIDEOid);
            console.log(vidListTags);
            console.log(vidListText);*/



            $j("#" + vidListID).InvPlayer({
                onVideoComplete: function() {
                    //	console.log("video complete");	
                }
            });


            /* $j("#"+vidListID).embedCode({
              playerType: "galleryplayer",
              videoTags: vidListTags,
              videoId: vidListVIDEOid,
              overlayPlay: true,
              autoPlay: false,
              isBanner: false,
              showInfo: false,
              rrcareers: true,
              sectionText: vidListText
            });  */

        }
    });
    if ($j('.innovation-timeline-image-wrapper').siblings('a').length > 0) {
        $j('.innovation-timeline-image-wrapper').parents('.fw-single-img').addClass('linked');

        $j(document).on('click', '.fw-single-img.linked', function() {
            var linkAbs = $j('.innovation-timeline-image-wrapper').siblings('a').attr('href');

            window.open(linkAbs, '_self');


        });
    }
    //$j('.tab-list').next().find('.slick-dots li:eq(6)').trigger('click');
    $j(document).on('click', '.fw-tabbed-wrap-inner.fw-tabbed-list-wrap-inner .mobi-tabs-list li', function(e) {

        var tab_click_id = $j(this).attr('tab-click');
        var newTABCLICKID = tab_click_id - 1;
        $j('.tab-list-content-wrapper .tab-content-main.tlsld.slick-initialized').slick('slickGoTo', newTABCLICKID);

        /*$j('.fw-tabbed-wrap-inner.fw-tabbed-list-wrap-inner').find('.slick-dots li:eq('+tab_click_id+')').trigger('click');
    
        console.log(tab_click_id);*/

    });
    //$j('.tab-list').next().find('.slick-dots > li:nth-child(3)').trigger('click');


    if ($j('.tab-list-content-wrapper .tab-content-main.tlsld').length > 0) {
        $j('.tab-list-content-wrapper .tab-content-main.tlsld').on('afterChange', function(event, slick, currentSlide, nextSlide) {
            var tablistPREVNEXTdropTXT = $j('.tab-list-content-wrapper .tab-content-main.tlsld .slick-dots li.slick-active button').text();
            //var tablistPREVNEXTdropTXTcls = $j('.tab-list-content-wrapper .tab-content-main.tlsld .slick-dots li.slick-active').index() + 1;
            $j(this).parents('.fw-tabbed-list-wrap-inner').find('p.mobi-tabs-menu').html();

            //console.log(tablistPREVNEXTdropTXT);

            $j('.fw-tabbed-list-wrap-inner').find('p.mobi-tabs-menu').html($j('.fw-tabbed-list-wrap-inner').find('.fw-tabbed-wrap .tabs li:nth-child(' + tablistPREVNEXTdropTXT + ') a').html());

            //console.log($j('.fw-tabbed-list-wrap-inner').find('.fw-tabbed-wrap .tabs li:nth-child('+tablistPREVNEXTdropTXT+') a').html());

            $j('.fw-tabbed-list-wrap-inner').find('.fw-tabbed-wrap .tabs li').removeClass('current');
            $j('.fw-tabbed-list-wrap-inner').find('.fw-tabbed-wrap .tabs li:nth-child(' + tablistPREVNEXTdropTXT + ')').addClass('current');

            //$j(this).parents('.fw-tabbed-list-wrap-inner').find('.fw-tabbed-wrap .tabs li:nth-child("'+tablistPREVNEXTdropTXT+'") a').html();

        });
    }


    /* Aerospace Related Products Slider Start */

    $j('.tab-content').each(function() {
        if ($j(this).find('.product-item').length < 4) {
            $j(this).find('.show-3-8-filter').addClass('hide invisible');
        }
    });

    if ($j('.desk-tab-with-icon').length > 5) {
        $j('.desk-tab-with-icon').slick({
            infinite: false,
            dots: false,
            prevArrow: "<span class='rr-icon-arrow-nav sl-prev slick-prev'></span>",
            nextArrow: "<span class='rr-icon-arrow-nav sl-next slick-next'></span>",
            slidesToShow: 5,
            slidesToScroll: 5,
            speed: 300,
            responsive: [{
                breakpoint: 992,
                settings: {
                    prevArrow: "<span class='rr-icon-arrow-nav sl-prev slick-prev'></span>",
                    nextArrow: "<span class='rr-icon-arrow-nav sl-next slick-next'></span>",
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            }]
        });
    }


    if ($j('.fw-rp-sld-outer').length > 0) {
        $j('.fw-rp-sld-outer').slick({
            infinite: false,
            dots: true,
            prevArrow: "<span class='rr-icon-arrow-nav slick-prev'></span>",
            nextArrow: "<span class='rr-icon-arrow-nav slick-next'></span>",
            slidesToShow: 3,
            slidesToScroll: 3,
            speed: 300,
            responsive: [
                /*{
                  breakpoint: 992,
                  settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    dots: true
                  }
                },*/
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        dots: true
                    }
                }
            ]
        });
    }

    $j('.fw-rp-sld-outer').each(function() {

        if ($j(this).find('.slick-dots > li').length > 0) {
            var totalWidth1 = 0;
            $j(this).find('.slick-dots > li').each(function() {
                totalWidth1 = totalWidth1 + $j(this).width();
            });
            var newPrevNext1 = (totalWidth1 * 2) + 110;
            $j(this).find('.slick-arrow.slick-next').css('right', -(newPrevNext1 + 120));
            $j(this).find('.slick-arrow.slick-prev').css('left', -(newPrevNext1 + 120));
        }
    });



    $j(document).on('click', 'a.show-8.active', function() {
        //$j('a.show-8.active').click(function(){
        /*$j(this).parent().find('.fw-rp-sld-outer .product-item').removeAttr('data-slick-index');  
        $j('.fw-rp-sld-outer .product-item').removeAttr('tabindex');
        $j('.fw-rp-sld-outer .product-item').removeAttr('role');
        $j('.fw-rp-sld-outer .product-item').removeAttr('aria-describedby');*/

        $j(this).removeClass('active');
        $j(this).parents('.fw-sld-wrapper').find('a.show-3').addClass('active');
        $j(this).parents('.fw-sld-wrapper').find('.fw-rp-sld-outer').addClass('show-8');

        $j(this).parents('.fw-sld-wrapper').find('.fw-rp-sld-outer').slick('unslick');

        var rpCntWrap = $j(this).parents('.fw-sld-wrapper').find('.fw-rp-sld-outer .product-item');

        for (var i = 0; i < rpCntWrap.length; i += 4) {
            rpCntWrap.slice(i, i + 4).wrapAll("<div class='rp-show-8-container clearfix'></div>");
        }

        var rpCntWrapCnt = $j(this).parents('.fw-sld-wrapper').find('.rp-show-8-container');

        for (var j = 0; j < rpCntWrapCnt.length; j += 2) {
            rpCntWrapCnt.slice(j, j + 2).wrapAll("<div class='rp-show-8-container-slider'></div>");
        }

        $j(this).parents('.fw-sld-wrapper').find('.fw-rp-sld-outer').removeClass('show-3');
        $j(this).parents('.fw-sld-wrapper').find('.fw-rp-sld-outer').addClass('show-8');

        $j(this).parents('.fw-sld-wrapper').find('.fw-rp-sld-outer').slick({
            infinite: false,
            dots: true,
            prevArrow: "<span class='rr-icon-arrow-nav slick-prev'></span>",
            nextArrow: "<span class='rr-icon-arrow-nav slick-next'></span>",
            slidesToShow: 1,
            slidesToScroll: 1,
            speed: 300,
            responsive: [{
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    dots: true
                }
            }]
        });

        $j(this).parents('.fw-sld-wrapper').find('.fw-rp-sld-outer').each(function() {

            if ($j(this).find('.slick-dots > li').length > 0) {
                var totalWidth1 = 0;
                $j(this).find('.slick-dots > li').each(function() {
                    totalWidth1 = totalWidth1 + $j(this).width();
                });
                var newPrevNext1 = (totalWidth1 * 2) + 50;
                $j(this).find('.slick-arrow.slick-next').css('right', -(newPrevNext1 + 120));
                $j(this).find('.slick-arrow.slick-prev').css('left', -(newPrevNext1 + 120));
            }
        });

    });

    $j(document).on('click', 'a.show-3.active', function() {
        //$j('a.show-3.active').click(function(){

        $j(this).removeClass('active');
        $j(this).parents('.fw-sld-wrapper').find('a.show-8').addClass('active');
        $j(this).parents('.fw-sld-wrapper').find('.fw-rp-sld-outer').slick('unslick');

        /*$j('.fw-rp-sld-outer .product-item').removeAttr('data-slick-index');  
        $j('.fw-rp-sld-outer .product-item').removeAttr('tabindex');
        $j('.fw-rp-sld-outer .product-item').removeAttr('role');
        $j('.fw-rp-sld-outer .product-item').removeAttr('aria-describedby');*/

        $j(this).parents('.fw-sld-wrapper').find('.rp-show-8-container').unwrap();
        $j(this).parents('.fw-sld-wrapper').find('.fw-rp-sld-outer .product-item').unwrap();

        $j(this).parents('.fw-sld-wrapper').find('.fw-rp-sld-outer').removeClass('show-8');
        $j(this).parents('.fw-sld-wrapper').find('.fw-rp-sld-outer').addClass('show-3');

        $j(this).parents('.fw-sld-wrapper').find('.fw-rp-sld-outer').slick({
            infinite: false,
            dots: true,
            prevArrow: "<span class='rr-icon-arrow-nav slick-prev'></span>",
            nextArrow: "<span class='rr-icon-arrow-nav slick-next'></span>",
            slidesToShow: 3,
            slidesToScroll: 3,
            speed: 300,
            responsive: [{
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    dots: true
                }
            }]
        });
        $j(this).parents('.fw-sld-wrapper').find('.fw-rp-sld-outer').each(function() {

            if ($j(this).find('.slick-dots > li').length > 0) {
                var totalWidth1 = 0;
                $j(this).find('.slick-dots > li').each(function() {
                    totalWidth1 = totalWidth1 + $j(this).width();
                });
                var newPrevNext1 = (totalWidth1 * 2) + 50;
                $j(this).find('.slick-arrow.slick-next').css('right', -(newPrevNext1 + 120));
                $j(this).find('.slick-arrow.slick-prev').css('left', -(newPrevNext1 + 120));
            }
        });
    });

    /* Aerospace Related Products Slider End */


    /* Enquiry Form Start */

    $j('.fw-en-form-wrapper .right-fields .webform-row select option:first-child').val($j('.fw-en-form-wrapper .right-fields .webform-row select option:first-child').text());


    $j('.fw-en-form-wrapper .field > input[type="submit"]').click(function(e) {

        if ($j('.fw-en-form-wrapper span.select').text() == "Please select") {
            $j('.fw-en-form-wrapper .right-fields .webform-row select').next().css('visibility', 'visible');
            e.preventDefault();
        } else {
            $j('.fw-en-form-wrapper .right-fields .webform-row select').next().css('visibility', 'hidden');
        }
    });

    $j('.fw-en-form-wrapper-inner input[type="text"],.fw-en-form-wrapper-inner #messageTA,textarea').blur(function() {
        if ($j(this).val().length >= 1) {
            $j(this).addClass('active');
        } else {
            $j(this).removeClass('active');
        }
    });
    if ($j("#nameTB").val() !== "") {
        $j("#nameTB").addClass("active");
    }
    if ($j("#emailTB").val() !== "") {
        $j("#emailTB").addClass("active");
    }
    if ($j("#messageTA").val() !== "") {
        $j("#messageTA").addClass("active");
    }
    if ($j(".fw-en-form-wrapper-inner #txtCaptcha").val() !== "") {
        $j(".fw-en-form-wrapper-inner #txtCaptcha").addClass("active");
    }
    $j(".fw-en-form-wrapper-inner .con-title,.fw-en-form-wrapper-inner .con-address").click(function() {
        $j(this).siblings("input").focus();
    });

    $j(".fw-en-form-wrapper-inner .con-title, .fw-en-form-wrapper-inner .con-address").click(function() {
        $j(this).siblings("input").focus();
    });

    if ($j("iframe.responsive").length > 0) {
        $j("iframe.responsive").each(function() {
            $j(this).css("width", $j(this).parent('div').width() + "px");
            $j(this).css("height", $j(this).parent('div').height() + "px");
        });
    }

    $j('.webform-container input[type=text], .webform-container textarea').each(function() {
        if ($j(this).val() !== '') {
            $j(this).addClass("active");
        }
    });

    /* Enquiry Form End */

    /* Tabbed Section Start */

    $j('.tab-content-main > div:first-child').addClass('current');
    $j('ul.tabs:not(.inv-tabs) li:first-child').addClass('current');

    $j(document).on('click', 'ul.tabs:not(.inv-tabs) li a', function(e) {
        e.preventDefault();
    });

    $j(document).on('click', 'ul.tabs:not(.inv-tabs) li', function() {

        if ($j('.fw-rp-sld-outer').length > 0) {}

        var tab_id = $j(this).attr('data-tab');
        if ($j(this).parents('.fw-tabbed-wrap').find('.tab-list-all-programme').length > 0) {
            var tab_id_list = $j(this).attr('data-tab');
            $j(this).parents('.fw-tabbed-wrap').find('.tab-list-all-programme').slideUp();


            $j('.all-programme-updates ul.slick-slide li').removeClass('makeListActive');

            $j(this).parents('.fw-tabbed-wrap').find('.all-programme-updates ul.slick-slide').find('li[data-tab="' + tab_id_list + '"]').addClass('makeListActive');
        }


        if ($j(this).closest('.async-tabs')[0]) {

            var tabhash = window.location.hash;
            var hash = tabhash.substring(tabhash.indexOf('#') + 1);
            var fields = hash.split('/');
            var phash = fields[0];
            var chash = fields[1];
            var tab_id = $j(this).attr("data-tab");
            if ($j('.stickyNavWrap')[0]) {
                if (chash === undefined) {
                    window.location.hash = phash + "/" + tab_id;
                } else {
                    window.location.hash = phash + "/" + tab_id;
                }
            } else {
                window.location.hash = tab_id;
            }
            $j(this).parents('.tab-list').find('li').removeClass('current');
            $j(this).addClass('current');

            $j(this).parents('.tab-list').next().find('.async-tab-content').html("<img src='/~/media/Images/R/Rolls-Royce/css/loader.png' alt='' style='margin:30px auto;display:block;' />");

            var link = $j(this).find('>a').attr('href').split('.aspx')[0] + '?async=1';

            var $this = $j(this);

            $j.ajax({
                url: link
            }).done(function(data) {
                $this.closest('.tab-list').next().find('.async-tab-content').html(data).promise().done(function() {
                    contacts_slider();
                    slider_arrows_adjust('.fw-sld-outer-contact-card');
                });
            });
        } else {
            $j(this).parents('.tab-list').find('li').removeClass('current');
            $j(this).parents('.tab-list').next().find('.tab-content').removeClass('current');
            $j(this).addClass('current');
            $j(this).parents('.tab-list').next().find('.' + tab_id).addClass('current');
        }

        if ($j(this).parents('.tab-list').next().find('.' + tab_id).find('.fw-rp-sld-outer').length > 0) {

            var slidr = $j(this).parents('.tab-list').next().find('.' + tab_id).find('.fw-rp-sld-outer');
            if (slidr.hasClass('slick-initialized')) {
                slidr.get(0).slick.setPosition();
                setEqualHeight_CommonClass(slidr.find('.cc-info'));
                setEqualHeight_CommonClass(slidr.find('.cc-ttl'));
            }
        }

        if ($j(this).parents('.tab-list').next().find('.' + tab_id).find('.fw-tab-sld-outer').length > 0) {
            var sldr = $j(this).parents('.tab-list').next().find('.' + tab_id).find('.fw-tab-sld-outer');
            if (sldr.hasClass('slick-initialized')) {
                sldr.get(0).slick.setPosition();
                setEqualHeight_CommonClass(sldr.find('.cc-info'));
                setEqualHeight_CommonClass(sldr.find('.cc-ttl'));
            }
        }

        $j(this).parents('.tab-list').next().find('.' + tab_id).find('.fw-rp-sld-outer').each(function() {

            if ($j(this).find('.slick-dots > li').length > 0) {
                var totalWidth1 = 0;
                $j(this).find('.slick-dots > li').each(function() {
                    totalWidth1 = totalWidth1 + $j(this).width();
                });
                var newPrevNext1 = (totalWidth1 * 2) + 50;
                $j(this).find('.slick-arrow.slick-next').css('right', -(newPrevNext1 + 120));
                $j(this).find('.slick-arrow.slick-prev').css('left', -(newPrevNext1 + 120));
            }
        });

        $j(this).parents('.tab-list').next().find('.' + tab_id).find('.fw-tab-sld-outer').each(function() {

            if ($j(this).find('.slick-dots > li').length > 0) {
                var totalWidth1 = 0;
                $j(this).find('.slick-dots > li').each(function() {
                    totalWidth1 = totalWidth1 + $j(this).width();
                });
                var newPrevNext1 = (totalWidth1 * 2) + 50;
                $j(this).find('.slick-arrow.slick-next').css('right', -(newPrevNext1 + 120));
                $j(this).find('.slick-arrow.slick-prev').css('left', -(newPrevNext1 + 120));
            }
        });

        setTimeout(function() {

            $j('.fw-sld-wrapper .fw-rp-sld-outer').each(function() {

                if ($j(this).find('.slick-dots > li').length > 0) {
                    var totalWidth1 = 0;
                    $j(this).find('.slick-dots > li').each(function() {
                        totalWidth1 = totalWidth1 + $j(this).width();
                    });
                    var newPrevNext1 = (totalWidth1 * 2) + 50;
                    if (currWidth < 768) {
                        if ($j(this).find('.slick-dots > li').length > 8) {
                            $j(this).find('.slick-dots > li').hide();
                            $j(this).parent().parent().find('.slick-initialized').addClass('morethen8dots');
                            $j(this).find('.slick-arrow.slick-next').css('right', '-8px');
                            $j(this).find('.slick-arrow.slick-prev').css('left', '0');
                        } else {
                            $j(this).find('.slick-dots > li').show();
                            $j(this).parent().parent().find('.slick-initialized').removeClass('morethen8dots');
                            $j(this).find('.slick-arrow.slick-next').css('right', -(newPrevNext1 + 120));
                            $j(this).find('.slick-arrow.slick-prev').css('left', -(newPrevNext1 + 120));
                        }
                    } else {
                        $j(this).find('.slick-dots > li').show();
                        $j(this).parent().parent().find('.slick-initialized').removeClass('morethen8dots');
                        $j(this).find('.slick-arrow.slick-next').css('right', -(newPrevNext1 + 120));
                        $j(this).find('.slick-arrow.slick-prev').css('left', -(newPrevNext1 + 120));
                    }
                }

            });
        }, 200);

        if ($j(".BusinessHighlights ul li[data-tab='tab-2']").parents('.tab-list').next('.tab-content-main').find('.graph').length > 0) {

            var getHCindex = $j(this).parents('.tab-list').next().find('.' + tab_id + ' .graph > div').attr('data-highcharts-chart');
            allPieChartBH[getHCindex - 1].reflow();
        }

        $j('.fw-tab-sld-outer').each(function() {
            if ($j(this).find(".fw-dwld-top").length > 0) {
                setEqualHeight_CommonClass($j(this).find(".fw-dwld-top"));
            }
        });



    });

    //var tabtext = $j('ul.tabs.mobi-tabs-list li:first-child p a').text();
    var tabtext = $j('ul.tabs.mobi-tabs-list li:first-child p a').html();
    //alert($j('ul.tabs.mobi-tabs-list li:first-child p').text());

    $j(document).on('click', 'p.mobi-tabs-menu', function(e) {
        //$j('p.mobi-tabs-menu').click(function(){
        $j(this).toggleClass('active');
        $j(this).next().slideToggle();
    });

    $j('.tab-list').each(function() {
        //$j(this).find('p.mobi-tabs-menu').text($j(this).find('.mobi-tabs-list li:first-child a').text());
        $j(this).find('p.mobi-tabs-menu').html($j(this).find('.mobi-tabs-list li:first-child a').html());
    });

    /*
    Commented to make more then one tabs on one page
  
    $j('p.mobi-tabs-menu').text($j('.fw-tabbed-wrap .mobi-tabs-list li:first-child a').text());
    */

    $j(document).on('click', '.mobi-tabs-list li', function(e) {
        //$j('p.mobi-tabs-menu').next().find('li').click(function(){
        //$j('.mobi-tabs-menu').toggleClass('active');
        $j(this).parents('.tab-list').find('.mobi-tabs-menu').toggleClass('active');
        $j(this).parents('.tab-list').find('.mobi-tabs-list').slideToggle();
        //alert($j(this).find('p').text());
        //var tabtext1 = $j(this).find('a').text();
        var tabtext1 = $j(this).find('a').html();
        //$j('p.mobi-tabs-menu').text(tabtext1);
        //$j(this).parents('.tab-list').find('p.mobi-tabs-menu').text(tabtext1);
        $j(this).parents('.tab-list').find('p.mobi-tabs-menu').html(tabtext1);
    });
    /* Tabbed Section End */

    /* Tabbed List All Programme Start */
    $j(document).on('click', '.close-all-programme', function(e) {
        $j('.tab-list-all-programme').slideUp();
        $j('.prgm-view-all.active').removeClass('active');
    });

    $j(document).on('click', '.fw-tabbed-list-wrap-inner .tab-list .slick-arrow', function(e) {
        $j('.tab-list-all-programme').slideUp();
    });

    /* Tabbed List All Programme End */

    /* Web Form */

    $j(".webform-container input").keypress(function(e) {
        if (e.keyCode == 13) {
            $j(".webform-container").find("input[type=submit]").trigger("click");
            if ($j('.fw-en-form-wrapper span.select').text() == "Please select") {
                $j('.fw-en-form-wrapper .right-fields .webform-row select').next().css('visibility', 'visible');
            } else {
                $j('.fw-en-form-wrapper .right-fields .webform-row select').next().css('visibility', 'hidden');
            }
            //document.getElementById("body_0_main_1_ctl05_ctl11_contactUs_submit").click();
            return false;
        }
    });

    /* Web Form */

    contacts_slider();

    /* Single Image Text Slider */

    $j('.fw-sld-outer').each(function() {
        if ($j(this).find('.fw-sld-inner-box').length > 1) {
            //console.log($j(this).find('.fw-sld-inner-box').length);
            $j(this).slick({
                infinite: false,
                dots: true,
                prevArrow: "<span class='rr-icon-arrow-nav slick-prev'></span>",
                nextArrow: "<span class='rr-icon-arrow-nav slick-next'></span>",
                slidesToShow: 1,
                slidesToScroll: 1,
                speed: 300
            });
        }
    });
    /* Single Image Text Slider */

    /* Downloads Slider */

    $j('.fw-downloads-sld').each(function() {
        if ($j(this).hasClass('fw-downloads-sld-featured')) {
            $j(this).find('.fw-dwld-sld-outer').slick({
                infinite: false,
                dots: true,
                prevArrow: "<span class='rr-icon-arrow-nav slick-prev'></span>",
                nextArrow: "<span class='rr-icon-arrow-nav slick-next'></span>",
                slidesToShow: 2,
                slidesToScroll: 2,
                speed: 300,
                responsive: [{
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        dots: true
                    }
                }]
            });
        } else {
            if ($j(this).find('.fw-dwld-sld-outer').length > 0) {
                $j(this).find('.fw-dwld-sld-outer').slick({
                    infinite: false,
                    dots: true,
                    prevArrow: "<span class='rr-icon-arrow-nav slick-prev'></span>",
                    nextArrow: "<span class='rr-icon-arrow-nav slick-next'></span>",
                    slidesToShow: 4,
                    slidesToScroll: 4,
                    speed: 300,
                    responsive: [{
                            breakpoint: 992,
                            settings: {
                                slidesToShow: 2,
                                slidesToScroll: 2,
                                dots: true
                            }
                        },
                        {
                            breakpoint: 768,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1,
                                dots: true
                            }
                        }
                    ]
                });
            }
        }
    });

    /* Downloads Slider */

    /* Tabs Slider */

    //if($j('.fw-tabbed-wrap .do-slick.tabs li').length > 5){
    if ($j('.do-slick').length > 0) {
        $j('.do-slick').slick({
            infinite: false,
            dots: false,
            prevArrow: "<span class='rr-icon-arrow-nav sl-prev slick-prev'></span>",
            nextArrow: "<span class='rr-icon-arrow-nav sl-next slick-next'></span>",
            slidesToShow: 5,
            slidesToScroll: 5,
            speed: 300,
            responsive: [{
                breakpoint: 992,
                settings: {
                    prevArrow: "<span class='rr-icon-arrow-nav sl-prev slick-prev'></span>",
                    nextArrow: "<span class='rr-icon-arrow-nav sl-next slick-next'></span>",
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            }]
        });
    }
    //} 
    /* Tabs Slider */


    /* Tabs Listing Slider */

    //if($j('.fw-tabbed-wrap .do-slick.tabs li').length > 5){
    if ($j('.do-slick-listing').length > 0) {
        $j('.do-slick-listing').slick({
            infinite: false,
            dots: false,
            prevArrow: "<span class='rr-icon-arrow-nav sl-prev slick-prev'></span>",
            nextArrow: "<span class='rr-icon-arrow-nav sl-next slick-next'></span>",
            slidesToShow: 3,
            slidesToScroll: 3,
            speed: 300,
            responsive: [{
                    breakpoint: 992,
                    settings: {
                        prevArrow: "<span class='rr-icon-arrow-nav sl-prev slick-prev'></span>",
                        nextArrow: "<span class='rr-icon-arrow-nav sl-next slick-next'></span>",
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        prevArrow: "<span class='rr-icon-arrow-nav sl-prev slick-prev'></span>",
                        nextArrow: "<span class='rr-icon-arrow-nav sl-next slick-next'></span>",
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                }
            ]
        });

        $j('.prgm-view-all').click(function() {
            $j(this).parent().next().find('.tab-list-all-programme').slideDown('500', function() {
                $j('.tab-list-all-programme').css('overflow', '');
            });
            //$j('.all-programme-updates').get(0).slick.setPosition();

            $j('.all-programme-updates').each(function() {
                $j(this).get(0).slick.setPosition();
            });

            $j(this).addClass('active');

        });

        $j('.all-programme-updates').each(function() {

            $j(this).slick({
                infinite: false,
                dots: true,
                arrows: false,
                slidesToShow: 3,
                slidesToScroll: 3,
                speed: 300
            });

        });

        $j(document).on('click', '.tab-list-all-programme ul.slick-slide li', function() {
            $j('.tab-list-all-programme').slideUp();
            var clickMe = $j(this).attr('data-tab');
            var SlideMe = $j(this).attr('data-counter') - 1;
            //console.log(SlideMe);
            $j('.fw-tabbed-wrap .do-slick-listing li[data-tab="' + clickMe + '"] a').trigger('click');
            $j('.do-slick-listing').slick('slickGoTo', SlideMe);
        });

    }
    if ($j('.do-slick-listing .slick-list li').length < 3) {
        $j('.fw-tabbed-list-wrap-inner .do-slick-listing').addClass('makeListCenter');
    }
    //} 
    /* Tabs Listing Slider */

    /*-------------------Video Player JS starts------------*/


    /* New Tabbed Video Start */
    /*$j('.tabbed-vid-img-inner').each(function () {
      createPlayer_New_Fw_Tabbed('videoplayer', $j(this).find('.inv_playerContainer'), true);
    });*/
    var flag_fullscreen_Fw = false;
    $j('.tabbed-vid-img-inner .margin-top-video-player').each(function() {
        $j(this).find('.inv_playerContainer').InvPlayer({
            onPlayerResize: function(mode) {
                if (mode == "fullscreen") {
                    $j('.inv_FullScreen').on('touchmove', function(e) {
                        e.preventDefault();
                    });
                    var stickyNavWrapHt1 = $j('.stickyNavWrap').outerHeight();
                    var off_top1 = $j('.inv_videoPlaying').closest('div').offset().top - stickyNavWrapHt1;
                    //console.log(off_top1);
                    setTimeout(function() {
                        $j('html, body').scrollTop(off_top1);
                        flag_fullscreen_Fw = true;
                    }, 200);
                } else {
                    $j('.inv_videoReady').unbind('touchmove');
                }
                if (flag_fullscreen_Fw == true) {
                    var stickyNavWrapHt2 = $j('.stickyNavWrap').outerHeight();
                    var off_top2 = $j('.inv_videoPlaying').closest('div').offset().top - stickyNavWrapHt2;
                    //console.log(off_top2);
                    setTimeout(function() {
                        $j('html, body').scrollTop(off_top2);
                        flag_fullscreen_Fw = false;
                    }, 200);
                }
            }

        });
    });


    /* New Tabbed Video End */

    $j(".home-fw .inn-play-video").click(function() {
        //alert('Fade');
        $j('#landing-video-player-wrapper').css('height', $j('.home-banner-fw').outerHeight());
        $j(".home-fw .video_fade").stop().animate({
            opacity: 0,
            visiblity: 'hidden'
        }, 500);
        setTimeout(function() {
            $j(".home-fw .margin-top-video-player").show();

            $j(".home-fw .banner-video-overlay-close-button").show();

            if ($j(this).hasClass("landing-video-btn")) {
                $j(".home-fw .innovation-video-container").stop().animate({
                    opacity: 1,
                    visiblity: 'visible'
                }, 500);
            } else {
                $j(".home-fw .innovation-video-container").stop().animate({
                    opacity: 1,
                    visiblity: 'visible'
                }, 500);
            }
            createPlayer('videoplayer', $j(".home-fw #inn-banner-main-video"), true);


        }, 500);


    });

    /*for 2.3 video 22/1/2020*/
    $j(".home-fw .inn-video-wrapper .inn-play-video.inn-play-video1").click(function() {
        //    alert('No Fade');
        $j(".home-fw .video_fade").stop().animate({
            opacity: 1,
            visiblity: 'hidden'
        }, 500);
        $j('#landing-video-player-wrapper').css('height', $j('.home-banner-fw').outerHeight());

        setTimeout(function() {
            $j(".home-fw .margin-top-video-player").show();

            $j(".home-fw .banner-video-overlay-close-button").show();

            if ($j(this).hasClass("landing-video-btn")) {
                $j(".home-fw .innovation-video-container").stop().animate({
                    opacity: 1,
                    visiblity: 'visible'
                }, 500);
            } else {
                $j(".home-fw .innovation-video-container").stop().animate({
                    opacity: 1,
                    visiblity: 'visible'
                }, 500);
            }
            createPlayer('videoplayer', $j(".home-fw #inn-banner-main-video"), true);


        }, 500);


    });

    $j(".home-fw .banner-video-overlay-close-button").click(function() {

        createPlayer('videoplayer', $j(".home-fw #inn-banner-main-video"), false);
        //$j('.home-banner-fw .video_fade').css('height','auto');
        if ($j(this).hasClass("landing-close-btn")) {
            $j(".home-fw .video_fade").animate({
                opacity: 1,
                visiblity: 'visible'
            }, 500);

        } else {
            $j(".home-fw .video_fade").animate({
                opacity: 1,
                visiblity: 'visible'
            }, 500);
        }
        //$j(".home-fw .margin-top-video-player").hide();


    });

    /*-------------------Video Player JS Ends------------*/

    /*----Main nav starts----*/
    if (is_touch_device()) {

        if (window.navigator.msPointerEnabled) {

            $j('.fwMenuwrapper.fwcountrynav ul > li.level3').hover(function() {
                $j('body').removeClass('megamenuhover');
                $j('.show-ul-outer').removeClass('white-bg');
                $j('.fwMenuwrapper.fwcountrynav ul > li.level3').removeClass('do-opaque');
                $j('.fwMenuwrapper.fwcountrynav ul > li.level3').removeClass('hoveractive');
                $j('.show-menu,.show-desc').show();
                $j('.show-menu,.show-desc').empty();

                if ($j(this).hasClass('haschildren')) {
                    $j('body').addClass('megamenuhover');
                    $j(this).addClass('do-opaque');
                    $j(this).addClass('hoveractive');
                    $j('.show-ul-outer').addClass('white-bg');

                    if ($j(this).hasClass('current')) {
                        var mTitle = $j(this).find(' > span').text();
                        $j('.show-menu').append("<p class='megamenu-title'>" + mTitle + "</p>");
                    } else {
                        var mTitle1 = $j(this).find(' > a span').text();
                        $j('.show-menu').append("<p class='megamenu-title'>" + mTitle1 + "</p>");
                    }
                    if ($j('.fw-' + $j(this).attr('id')).length > 0) {
                        $j('.fw-' + $j(this).attr('id')).clone().appendTo('.show-desc');
                    }

                    $j(this).children('ul').clone().appendTo('.show-menu');

                    setEqualHeight_CommonClass(".show-menu ul");
                    $j('.show-menu li.haschildren > a,.show-menu li.haschildren.current > span').each(function() {
                        $j(this).append('<span class="icon-chevron-right"></span>');
                    });

                }
            });


            $j('.white-overlay,.hide-content').hover(function() {
                $j('.show-ul-outer').removeClass('white-bg');
                $j('.fwMenuwrapper.fwcountrynav ul > li.level3').removeClass('hoveractive');
                $j('.fwMenuwrapper.fwcountrynav ul > li.level3').removeClass('do-opaque');
                $j('body').removeClass('megamenuhover');
            });


        } else {
            $j(".fwMenuwrapper.fwcountrynav ul > li.level3").one("click", function(e) {
                e.preventDefault();
                $j('body').removeClass('megamenuhover');
                $j('.show-ul-outer').removeClass('white-bg');
                $j('.fwMenuwrapper.fwcountrynav ul > li.level3').removeClass('do-opaque');
                $j('.fwMenuwrapper.fwcountrynav ul > li.level3').removeClass('hoveractive');
                $j('.show-menu,.show-desc').show();
                $j('.show-menu,.show-desc').empty();

                if ($j(this).hasClass('haschildren')) {
                    $j('body').addClass('megamenuhover');
                    $j(this).addClass('do-opaque');
                    $j(this).addClass('hoveractive');
                    $j('.show-ul-outer').addClass('white-bg');

                    if ($j(this).hasClass('current')) {
                        var mTitle = $j(this).find(' > span').text();
                        $j('.show-menu').append("<p class='megamenu-title'>" + mTitle + "</p>");
                    } else {
                        var mTitle1 = $j(this).find(' > a span').text();
                        $j('.show-menu').append("<p class='megamenu-title'>" + mTitle1 + "</p>");
                    }
                    if ($j('.fw-' + $j(this).attr('id')).length > 0) {
                        $j('.fw-' + $j(this).attr('id')).clone().appendTo('.show-desc');
                    }

                    $j(this).children('ul').clone().appendTo('.show-menu');

                    setEqualHeight_CommonClass(".show-menu ul");
                    $j('.show-menu li.haschildren > a,.show-menu li.haschildren.current > span').each(function() {
                        $j(this).append('<span class="icon-chevron-right"></span>');
                    });

                    /* Double Tap To Go */
                    $j('.show-menu ul li.haschildren').doubleTapToGo();
                    $j('.show-menu ul li.haschildren').each(function() {
                        $j(this).attr('aria-haspopup', 'true');
                        $j(this).children("a").attr('onclick', 'true');
                    });
                    /* Double Tap To Go */

                }
            });

            $j('.white-overlay,.hide-content').click(function() {
                $j('.show-ul-outer').removeClass('white-bg');
                $j('.fwMenuwrapper.fwcountrynav ul > li.level3').removeClass('hoveractive');
                $j('.fwMenuwrapper.fwcountrynav ul > li.level3').removeClass('do-opaque');
                $j('body').removeClass('megamenuhover');
            });
        }

    } else {
        var timer;

        $j(document).on("mouseover", ".fwMenuwrapper ul > li.level1,.microsite-menu.fwMenuwrapper > ul > li", function(e) {
            $j('.fwMenuwrapper.fwcountrynav ul > li.level3,.microsite-menu.fwMenuwrapper > ul > li').removeClass('do-opaque');
            $j('.fwMenuwrapper.fwcountrynav ul > li.level3,.microsite-menu.fwMenuwrapper > ul > li').removeClass('hoveractive');
            $j(this).addClass('do-opaque');
            $j(this).addClass('hoveractive');
            //$j('.show-ul').mCustomScrollbar("destroy");
        });
        $j('.MainWrapperInner,.white-overlay,.hide-content,#logo,#top-left,.customer-banner-container-outer').not('#topnavigation').mouseover(function() {
            $j('.fwMenuwrapper.fwcountrynav ul > li.level3,.microsite-menu.fwMenuwrapper > ul > li').removeClass('do-opaque');
            $j('.fwMenuwrapper.fwcountrynav ul > li.level3,.microsite-menu.fwMenuwrapper > ul > li').removeClass('hoveractive');
        });

        //$j(document).on("mouseover", ".fwMenuwrapper ul > li.level1", function(e) {
        $j(".fwMenuwrapper.fwcountrynav ul > li.level3,.microsite-menu.fwMenuwrapper > ul > li").mouseenter(function(e) {
            //$j(document).on("mouseenter", ".fwMenuwrapper ul > li.level1", function(e) {

            if ($j('#headerlinks > ul > li').hasClass('globalactive')) {
                $j('#headerlinks > ul > li > ul').slideUp('500', function() {
                    $j('#headerlinks > ul > li > ul').css('overflow', '');
                    $j('#headerlinks > ul > li').removeClass("globalactive");
                });
            }

            e.preventDefault();

            $j('.fwMenuwrapper.fwcountrynav ul > li.level3,.microsite-menu.fwMenuwrapper > ul > li').removeClass('do-opaque');
            $j('.fwMenuwrapper.fwcountrynav ul > li.level3,.microsite-menu.fwMenuwrapper > ul > li').removeClass('hoveractive');


            if ($j(this).hasClass('haschildren')) {
                if ($j('body').hasClass('megamenuhover')) {
                    timer = setTimeout(function() {
                        $j(this).addClass('do-opaque');
                        $j(this).addClass('hoveractive');
                    }, 300);
                } else {
                    $j('body').removeClass('megamenuhover');
                    $j('.show-ul-outer').removeClass('white-bg');
                }

                $j('.show-menu,.show-desc').show();
                $j('.show-menu,.show-desc').empty();

                timer = setTimeout(function() {
                    $j(this).addClass('do-opaque');
                    $j(this).addClass('hoveractive');
                    $j('body').addClass('megamenuhover');
                    $j('.show-ul-outer').addClass('white-bg');

                    //$j('.show-ul').mCustomScrollbar("destroy");         

                }, 300);

                if ($j(this).hasClass('current')) {
                    var mTitle = $j(this).find(' > span').text();
                    $j('.show-menu').append("<p class='megamenu-title'>" + mTitle + "</p>");
                } else {
                    var mTitle1 = $j(this).find(' > a span').text();
                    $j('.show-menu').append("<p class='megamenu-title'>" + mTitle1 + "</p>");
                }
                if ($j('.fw-' + $j(this).attr('id')).length > 0) {
                    $j('.fw-' + $j(this).attr('id')).clone().appendTo('.show-desc');
                }

                $j(this).children('ul').clone().appendTo('.show-menu');



                //setEqualHeight_CommonClass(".show-menu ul");
                $j('.show-menu li.haschildren > a,.show-menu li.haschildren.current > span').each(function() {
                    $j(this).append('<span class="icon-chevron-right"></span>');
                });
                /* Double Tap To Go */
                $j('.show-menu ul li.haschildren').doubleTapToGo();
                $j('.show-menu ul li.haschildren').each(function() {
                    $j(this).attr('aria-haspopup', 'true');
                    $j(this).children("a").attr('onclick', 'true');
                });
                /* Double Tap To Go */

            } else {
                $j('.show-ul-outer').removeClass('white-bg');
                $j('.fwMenuwrapper.fwcountrynav ul > li.level3,.microsite-menu.fwMenuwrapper > ul > li').removeClass('hoveractive');
                $j('.fwMenuwrapper.fwcountrynav ul > li.level3,.microsite-menu.fwMenuwrapper > ul > li').removeClass('do-opaque');
                $j('body').removeClass('megamenuhover');
            }

            $j('.show-ul').mCustomScrollbar({
                advanced: {
                    updateOnContentResize: true
                },
                mouseWheel: {
                    scrollAmount: 100
                }
            });

        }).mouseleave(function() {
            clearTimeout(timer);
        });



        $j('.white-overlay,.hide-content,.header-outer').hover(function() {
            /*console.log('hoverout');*/
            $j('.show-ul-outer').removeClass('white-bg');
            $j('.fwMenuwrapper.fwcountrynav ul > li.level3,.microsite-menu.fwMenuwrapper > ul > li').removeClass('hoveractive');
            $j('.fwMenuwrapper.fwcountrynav ul > li.level3,.microsite-menu.fwMenuwrapper > ul > li').removeClass('do-opaque');
            $j('body').removeClass('megamenuhover');
        });

        $j('.megamenu-close').click(function() {
            $j('.show-ul-outer').removeClass('white-bg');
            $j('.fwMenuwrapper.fwcountrynav ul > li.level3,.microsite-menu.fwMenuwrapper > ul > li').removeClass('hoveractive');
            $j('.fwMenuwrapper.fwcountrynav ul > li.level3,.microsite-menu.fwMenuwrapper > ul > li').removeClass('do-opaque');
            $j('body').removeClass('megamenuhover');
        });

    }

    /*----Main nav ends----*/

    /* Progressive Disclosure Start */

    $j('.pd-box-wrapper').each(function() {
        if ($j(this).find('.pd-box-snapdown-click').length < 2) {
            $j(this).addClass('pd-make-center');
        }
        if ($j(this).find('.pd-box-snapdown-click').length < 3) {
            $j(this).addClass('pd-make-center-two');
        }

    });





    currWidth = viewport().width;

    /*if(currWidth > 991){
      //$j(".pd-box-wrapper").children(".pd-box-main").unwrap();
      
      var divs = $j(".pd-box-wrapper > .pd-box-main");
      //console.log($j(".pd-box-wrapper > .pd-box-main").length);
      for(var i = 0; i < divs.length; i+=2) {
        divs.slice(i, i+2).wrapAll("<div class='pd-wrapper clearfix'></div>");      
      }
      $j(".pd-box-wrapper").append("<div class='pd-box-wrapper-open clearfix'></div>");    
    }
    if(currWidth < 992){
      //$j(".pd-box-wrapper").children(".pd-box-main").unwrap();
      
      var divsMOBI = $j(".pd-box-wrapper > .pd-box-main");
      //console.log($j(".pd-box-wrapper > .pd-box-main").length);
      for(var iMOBI = 0; iMOBI < divsMOBI.length; iMOBI+=1) {
        divsMOBI.slice(iMOBI, iMOBI+1).wrapAll("<div class='pd-wrapper clearfix'></div>");      
      }
      $j(".pd-box-wrapper > .pd-wrapper > .pd-box-main").append("<div class='pd-box-wrapper-open asdf clearfix'></div>");    
    }
    */
    setEqualHeight_CommonClass(".pd-box-main");

    //$j('.pd-box-snapdown-click').unbind('click').bind('click', function() {
    $j('.pd-box-snapdown-click').unbind('click');
    $j(document).on('click', ".pd-box-snapdown-click:not(.has-link)", function(e) {
        //if ($j(this).parent().hasClass("snapopen")) {
        if ($j(this).hasClass("snapopen")) {
            $j(this).removeClass("snapopen");
            //$j(this).parent().parent().siblings(".pd-box-wrapper-open").slideUp("slow");
            $j(".pd-box-snapdown-content").slideUp("slow", function() {
                if ($j(this).find('.inv_videoPlaying')[0]) {
                    $j(this).find('.inv_playerContainer').InvPlayer().pauseVideo();
                }
            });
            $j('.otherbodshadow').hide();
        } else {
            $j(".pd-box-snapdown-click").removeClass("snapopen");
            //$j(".pd-box-wrapper-open").slideUp();
            $j(".pd-box-snapdown-content").slideUp("slow", function() {
                if ($j(this).find('.inv_videoPlaying')[0]) {
                    $j(this).find('.inv_playerContainer').InvPlayer().pauseVideo();
                }
            });
            //$j(this).parent().parent().siblings(".pd-box-wrapper-open").slideDown();
            $j(this).next().slideDown();
            $j(this).addClass("snapopen");
            /*var pddetails = "";
            pddetails = $j(this).siblings(".pd-box-snapdown-content").html();      
            $j(this).parent().parent().siblings(".pd-box-wrapper-open").html(pddetails);*/
        }
    });


    $j(document).on('click', ".pd-snapdown-title", function(e) {
        if ($j(this).hasClass('active')) {
            $j('.pd-snapdown-item').removeClass('active');
            $j('.pd-snapdown-item .pd-snapdown-title').removeClass('active');
            $j(this).next().slideUp();
        } else {
            $j('.pd-snapdown-item').removeClass('active');
            $j('.pd-snapdown-item .pd-snapdown-title').removeClass('active');
            $j('.pd-snapdown-content').slideUp();
            $j(this).addClass('active');
            $j(this).parent().addClass('active');

            $j(this).next().find('.slick-initialized').css({
                'opacity': '0'
            });

            $j(this).next().not(':animated').slideDown(function() {
                if ($j(this).find('.slick-initialized')[0]) {
                    $j(this).find('.slick-initialized').each(function() {
                        $j(this).get(0).slick.setPosition();
                        $j(this).animate({
                            'opacity': '1'
                        }, 300);
                        setEqualHeight_CommonClass($j(this).find('.cc-info'));
                        setEqualHeight_CommonClass($j(this).find('.cc-ttl'));
                    });
                } else {

                }

                setTimeout(function() {
                    if ($j('.pd-snapdown-item.active').offset().top < $j(window).scrollTop() && $j(window).width() < '768') {


                        $j('html,body').animate({
                            scrollTop: $j('.pd-snapdown-item.active').offset().top - $j('#header').height()
                        }, 500);

                    } else {
                        if ($j(".stickyNavWrap").length > 0) {
                            $j('html,body').animate({
                                scrollTop: $j('.pd-snapdown-item.active').offset().top - $j(".stickyNavWrap").height()
                            }, 500);
                        } else {
                            //alert($j('.pd-snapdown-item.active').attr('class'));
                            if ($j('.pd-snapdown-item.active').parents().find('#popupAPIContent').length > 0) {

                            } else {
                                $j('html,body').animate({
                                    scrollTop: $j('.pd-snapdown-item.active').offset().top
                                }, 500);
                            }
                        }
                    }
                }, 300);

            });
        }
    });

    $j(document).on('click', ".close-pd-snapdown", function(e) {
        if ($j('.pd-box-snapdown-click').hasClass("snapopen")) {
            $j('.pd-box-snapdown-click').removeClass("snapopen");
            //$j(this).parent().parent().siblings(".pd-box-wrapper-open").slideUp("slow");
            $j(".pd-box-snapdown-content").slideUp("slow", function() {
                if ($j(this).find('.inv_videoPlaying')[0]) {
                    $j(this).find('.inv_playerContainer').InvPlayer().pauseVideo();
                }
            });
            $j('.otherbodshadow').hide();
        } else {
            $j(".pd-box-snapdown-click").removeClass("snapopen");
            //$j(".pd-box-wrapper-open").slideUp();
            $j(".pd-box-snapdown-content").slideUp("slow", function() {

                if ($j(this).find('.inv_videoPlaying')[0]) {
                    $j(this).find('.inv_playerContainer').InvPlayer().pauseVideo();
                }
            });
            //$j(this).parent().parent().siblings(".pd-box-wrapper-open").slideDown();
            $j(this).next().slideDown();
            $j(this).addClass("snapopen");
            /*var pddetails = "";
            pddetails = $j(this).siblings(".pd-box-snapdown-content").html();      
            $j(this).parent().parent().siblings(".pd-box-wrapper-open").html(pddetails);*/
        }
        /*$j(".pd-box-snapdown-content").slideUp("slow");
  
    $j('.pd-snapdown-item').removeClass('active');
    $j('.pd-snapdown-item .pd-snapdown-title').removeClass('active');  */
    });

    /* Progressive Disclosure End */


});


/* New Full Width Video Start */
$j(document).on('click', ".new-video-fw .inn-play-video", function() {

    $j(this).closest('.homecontentwrapper').find('#landing-video-player-wrapper').css('height', $j(this).closest('.home-banner-fw').outerHeight());

    if ($j('.stickyNavWrap').length > 0) {
        $j('.new-video-fw').addClass('highZindex');
    }

    $j(this).parents('.new-video-fw').find(".margin-top-video-player").show();
    //$j(this).parents('.new-video-fw').find(".innovation-video-container").addClass('play-this-video');
    var playThisVid = $j(this).parents('.new-video-fw').find(".inv_playerContainer");
    $j(this).parents('.new-video-fw').find(".landing-close-btn").show();

    //$j('#landing-video-player-wrapper').css('height',$j('.home-banner-fw').outerHeight());
    $j(this).parents('.new-video-fw').find(".video_fade").stop().animate({
        opacity: 0,
        visiblity: 'hidden'
    }, 500);
    setTimeout(function() {
        $j(this).parents('.new-video-fw').find(".margin-top-video-player").show();

        $j(this).parents('.new-video-fw').find(".banner-video-overlay-close-button").show();

        if ($j(this).hasClass("landing-video-btn")) {
            $j(this).parents('.new-video-fw').find(".margin-top-video-player").stop().animate({
                opacity: 1,
                visiblity: 'visible'
            }, 500);
        } else {
            $j(this).parents('.new-video-fw').find(".margin-top-video-player").stop().animate({
                opacity: 1,
                visiblity: 'visible'
            }, 500);
        }
        createPlayer_New_Fw('videoplayer', playThisVid, true);
    }, 500);
    $j('.new-video-fw').each(function() {
        setTimeout(function() {
            $j(this).find('.inv_videoPlaying').css('height', $j(this).outerHeight());
        }, 600);
    });

});

$j(document).on("click", ".new-video-fw .banner-video-overlay-close-button", function() {

    if ($j('.stickyNavWrap').length > 0) {
        $j('.new-video-fw').removeClass('highZindex');
    }
    var closeThisVid = $j(this).parents('.new-video-fw').find(".inv_playerContainer");
    createPlayer_New_Fw('videoplayer', closeThisVid, false);
    //$j(this).parents('.new-video-fw').find(".innovation-video-container").removeClass('play-this-video');
    //$j('.home-banner-fw .video_fade').css('height','auto');
    if ($j(this).hasClass("landing-close-btn")) {
        $j(this).parents('.new-video-fw').find(".video_fade").stop().animate({
            opacity: 1,
            visiblity: 'visible'
        }, 500);

    } else {
        $j(this).parents('.new-video-fw').find(".margin-top-video-player").animate({
            opacity: 1,
            visiblity: 'visible'
        }, 500);
    }


    $j(this).parents('.new-video-fw').find(".margin-top-video-player").hide();
    $j('.inv_videoPlaying').css('height', $j('.inv_videoPlaying').parents('.new-video-fw').outerHeight());

});

/* New Full Width Video End */


var flag_fullscreen = false;

function createPlayer(playerType, divobj, open) {
    //console.log("player type = "+playerType + ",divobj = "+divobj+",open = "+open);
    if (playerType == 'videoplayer') {
        if (open) {
            flag_video = true;
            divobj.InvPlayer({
                onPlayerResize: function(mode) {
                    if ($j('#landing-video-player-wrapper').length > 0) {
                        $j('#landing-video-player-wrapper').css('height', $j('.home-banner-fw').outerHeight());
                    }
                    if (mode == "fullscreen") {

                        $j('.inv_FullScreen').on('touchmove', function(e) {
                            e.preventDefault();
                        });

                        flag_fullscreen = true;
                        $j.fn.fullpage.setAllowScrolling(false);

                        $j(document).on('touchmove', function(e) {
                            e.preventDefault();
                        }, false);

                    } else {
                        $j('.inv_videoReady').unbind('touchmove');
                        flag_fullscreen = false;
                        $j.fn.fullpage.setAllowScrolling(true);
                    }
                }
            });
            divobj.show();
        } else {

            divobj.InvPlayer({
                onPlayerResize: function(mode) {}
            }).done(function(e) {
                e.stopVideo();
            });
            divobj.empty();
            divobj.removeData();
            flag_video = false;
        }
    } else if (playerType == 'interactiveElement') {
        divobj.InvPlayer({
            onPopupModeChanged: function(mode) {
                currWidth = $j(window).width();
                if (currWidth > 767) {
                    if (mode == 'open') {
                        $j(".tabs-system-main-wrapper").hide();
                    } else {
                        $j(".tabs-system-main-wrapper").show();
                    }
                }
            }
        });
    } else if (playerType == 'interactiveImageElement') {
        divobj.InvPlayer();
    }
}


function createPlayer_New_Fw(playerType, divobj, open) {
    //console.log("player type = "+playerType + ",divobj = "+divobj+",open = "+open);
    /*alert(("player type = "+playerType + ",divobj = "+divobj+",open = "+open));*/
    if (playerType == 'videoplayer') {
        if (open) {
            /*alert('open');*/
            flag_video = true;
            divobj.InvPlayer({
                onPlayerResize: function(mode) {
                    $j('.inv_videoPlaying').css('height', $j('.inv_videoPlaying').parents('.new-video-fw').outerHeight());

                    if (mode == "fullscreen") {

                        $j('.inv_FullScreen').on('touchmove', function(e) {
                            e.preventDefault();
                        });

                        var stickyNavWrapHt1 = $j('.stickyNavWrap').outerHeight();
                        var off_top1 = $j('.inv_videoPlaying').closest('div').offset().top - stickyNavWrapHt1;
                        //console.log(off_top1);
                        setTimeout(function() {
                            $j('html, body').scrollTop(off_top1);
                            flag_fullscreen = true;
                        }, 700);
                        $j.fn.fullpage.setAllowScrolling(false);

                    } else {
                        //$("#formx").unbind('submit');
                        $j('.inv_videoReady').unbind('touchmove');

                        if ($j('.stickyNavWrap').length > 0) {
                            setTimeout(function() {
                                var stickyNavWrapHt2 = $j('.stickyNavWrap').outerHeight();
                                //var off_top2 = $j('.inv_videoPlaying').closest('div').offset().top - stickyNavWrapHt2;              
                                //$j('html, body').scrollTop(off_top2);
                                flag_fullscreen = false;
                            }, 700);
                        }
                        $j.fn.fullpage.setAllowScrolling(true);
                    }
                }
            });
            /*setTimeout(function(){ $j(".margin-top-video-playr .invplayerContainer").find(".inv_overlayPlay").trigger("click").css("border","red"); alert('done'); },3000);*/

            divobj.show();

            divobj.InvPlayer().done(function(e) {
                setTimeout(function() {
                    e.playVideo();
                }, 1000);
            });

        } else {

            divobj.InvPlayer({
                onPlayerResize: function(mode) {}
            }).done(function(e) {
                e.stopVideo();
            });
            divobj.empty();
            divobj.removeData();
            flag_video = false;
        }
    } else if (playerType == 'interactiveElement') {
        divobj.InvPlayer({
            onPopupModeChanged: function(mode) {
                currWidth = $j(window).width();
                if (currWidth > 767) {
                    if (mode == 'open') {
                        $j(".tabs-system-main-wrapper").hide();
                    } else {
                        $j(".tabs-system-main-wrapper").show();
                    }
                }
            }
        });
    } else if (playerType == 'interactiveImageElement') {
        divobj.InvPlayer();
    }




}

/*----------- Tabs with image on top ------------*/

$j(document).ready(function() {
    $j('.desk-tab-with-icon-normal').each(function() {

        var noofTABSNORMAL = $j(this).find('> li').length;

        var getLiWidthOBNORMAL = 100 / noofTABSNORMAL;
        //console.log(getLiWidth);
        $j(this).find('> li').width((getLiWidthOBNORMAL) + "%");

    }).promise().done(function() {
        setTimeout(function() {
            $j('.desk-tab-with-icon-normal').each(function() {
                setEqualHeight_CommonClass($j(this).find('li a'));
            });
        }, 500);
    });
});

$j(window).resize(function() {
    $j('.desk-tab-with-icon-normal').each(function() {
        setEqualHeight_CommonClass($j(this).find('li a'));
    });


});

/*----------- Tabs with image on top ends ------------*/

$j(window).load(function() {


    $j('.sub-section').each(function() {
        setEqualHeight_CommonClass($j(this).find(".fw-dwld-top"));
    });

    $j('ul.desk-tab-with-icon').each(function() {
        var noofTABS = $j(this).find("> li").length;
        var getLiWidthOB = 100 / noofTABS;

        $j(this).find("> li").width((getLiWidthOB) + "%");
    }).promise().done(function() {
        $j('ul.desk-tab-with-icon span.menu-img,ul.desk-tab-with-icon span.menu-ttl').height('auto');
        setTimeout(function() {
            $j('ul.desk-tab-with-icon').each(function() {
                setEqualHeight_CommonClass($j(this).find('span.menu-img'));
                setEqualHeight_CommonClass($j(this).find('span.menu-ttl'));
            });
        }, 200);
    });


    $j('.insights-loader').hide();

    $j('.hsp-main').css('height', 'auto');
    setEqualHeight_CommonClass('.hsp-main');


    $j('.tabs-with-icon').each(function() {
        setEqualHeight_CommonClass($j(this).find('span.menu-img'));
        setEqualHeight_CommonClass($j(this).find('span.menu-ttl'));
    });


    /*var vid = 0;
    $j('.videos').each(function(i){
      vid++;
      console.log(vid);
      console.log("#inn-banner-main-video"+vid);
      createPlayer('videoplayer',$j("#inn-banner-main-video"+vid),false);    
    });*/


    $j('.img-cnt-outer-bg').each(function() {

        var imgcntHt = $j(this).find('.img-cnt-txt').outerHeight() + 90;
        //console.log(imgcntHt);
        $j(this).css('height', imgcntHt);
        $j(this).find('.img-cnt-img').css('height', imgcntHt);

    });


    if ($j('.stickyNavWrap').length > 0) {
        if (($j('#section-eq-form .failureMsg').html() !== '' && $j('#section-eq-form .failureMsg').length > 0) || ($j('#section-eq-form .successMsg').html() !== '' && $j('#section-eq-form .successMsg').length > 0)) {
            location.hash = "#section-eq-form";
        }
    } else {
        if ($j('.fw-en-form-wrapper-outer').length > 0) {
            if ($j('.successMsg').html() !== '' || $j('.failureMsg').html() !== '') {
                $j('html,body').animate({
                    scrollTop: ($j('.successMsg,.successMsg').offset().top)
                }, 'slow', function() {});
            }
        }
    }

    if (viewport1().width <= 991) {

        if ($j('#homewrapper .career-ul').length > 0) {
            $j('#homewrapper .career-ul').mCustomScrollbar({
                advanced: {
                    updateOnContentResize: true
                },
                mouseWheel: {
                    scrollAmount: 30
                }
            });
        }
    }

    //if(viewport1().width <= 767){

    if ($j('.new-site-fw .tabs.mobi-tabs-list').length > 0) {
        $j('.new-site-fw .tabs.mobi-tabs-list').mCustomScrollbar({
            advanced: {
                updateOnContentResize: true
            },
            mouseWheel: {
                scrollAmount: 30
            }
        });
    }
    //}

    /*if($j('.stickyNavWrap').length > 0){
      setTimeout(function(){
        $j('.stickyNavWrap').css('height',$j('.menuWrapper').outerHeight());
      },200);
    }*/

    $j('.fw-tabbed-wrap-inner.fw-tabbed-list-wrap-inner').css('height', 'auto');
    $j('.fw-tabbed-wrap-inner.fw-tabbed-list-wrap-inner').css('overflow', 'visible');
    $j('.flicker-module-section').css('height', 'auto');
    $j('.flicker-module-section').css('overflow', 'visible');
    /*
    if($j('.inv_mapWrapper .inv_listContainer').length > 0){
      $j('.inv_mapWrapper .inv_listContainer').mCustomScrollbar({
        axis: 'y',
        scrollbarPosition: 'inside',
        autoDraggerLength: false
      });
    }*/
    $j('.tab-list-all-programme ul:first-child li:first-child').addClass('makeListActive');

    /*--  IE  Edge class in body starts  --*/
    if (/Edge/.test(navigator.userAgent)) {
        $j('body').addClass('ie-edge-true');
    }
    /*--  IE  Edge class in body ends  --*/


    /* PlayList Start */

    /*
    var videoID =  $j(this).data("video");
    var videoTags = $j(this).data("tags");
    $j("#player-meet-our-people1.inv_playerContainer").embedCode({
      playerType: "galleryplayer",
      videoTags: "cat19:ourpeopleindia,rolls-royce,videogallery,web",
      videoId: 'rolls-royce483',
      overlayPlay: true,
      autoPlay: false,
      isBanner: false,
      showInfo: false,
      rrcareers: true,
      sectionText: "Rajashekhar Shivaram – Principle Test & Measurement Engineer"
    });
     */
    /*if(v_videoId==null || v_videoId==undefined)
				{
					v_videoId="rolls-royce028";
				}*/


    /*v_videoId="rolls-royce483";				
    inv_sectionText="MEET OUR PEOPLE";
    inv_videoTags="cat19:meetourpeopleindia,rolls-royce,videogallery,web";
  
    $j("#player-meet-our-people1").embedCode({
      playerType: "galleryplayer",
      videoTags: "cat19:ourpeopleindia,rolls-royce,videogallery,web",
      videoId: "rolls-royce481",
      overlayPlay: true,
      autoPlay: false,
      isBanner: false,
      showInfo: false,
      rrcareers: true,
      sectionText: "PEOPLE ARE OUR POWER"
    });*/


    /* PlayList End */


});

/*---------Link Arrow prevent fall-----------*/

$j(document).ready(function() {

    if ($j("body").hasClass("ip3-edit")) {
        //$j("body").find('span.scChromeData').remove();
    }

    chevron_do_not_fall();

});

$j(document).ajaxComplete(function() {
    chevron_do_not_fall();
});

function chevron_do_not_fall() {
    $j('.fw-progressive-disclosure .pd-box-text .fw-arrow-link,.module-aerospace-rp .product-item-inner .product-item-title, .download-doc-list .dl-list-title a,.discover-landing-page .hsp-text h3').each(function() {
        var text = $j(this).text().trim().split(' ');
        var last = '<em style="font-style:normal;display:inline-block;white-space: nowrap;">' + text[text.length - 1] + "<span class='icon-chevron-right-new'></span></em>";
        var lastIndex = $j(this).text().trim().lastIndexOf(" ");

        $j(this).html($j(this).text().trim().substring(0, lastIndex) + ' ' + last);
    });
}

/*---------Link Arrow prevent fall ends-----------*/

/*--------- Related products slider tabs-slider -----------*/
$j(document).ready(function() {

    $j('.module-aerospace-rp .desk-tab-with-icon').each(function() {
        if ($j(this).find('li').length > 3) {
            $j(this).slick({
                infinite: false,
                dots: false,
                prevArrow: "<span class='rr-icon-arrow-nav sl-prev slick-prev'></span>",
                nextArrow: "<span class='rr-icon-arrow-nav sl-next slick-next'></span>",
                slidesToShow: 3,
                slidesToScroll: 3,
                speed: 300,
                responsive: [{
                        breakpoint: 992,
                        settings: {
                            prevArrow: "<span class='rr-icon-arrow-nav sl-prev slick-prev'></span>",
                            nextArrow: "<span class='rr-icon-arrow-nav sl-next slick-next'></span>",
                            slidesToShow: 2,
                            slidesToScroll: 2
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            prevArrow: "<span class='rr-icon-arrow-nav sl-prev slick-prev'></span>",
                            nextArrow: "<span class='rr-icon-arrow-nav sl-next slick-next'></span>",
                            slidesToShow: 2,
                            slidesToScroll: 2
                        }
                    }
                ]
            });
        }
    });
});


/*---------- New Progressive disclosure update --------------*/
$j(document).ready(function() {
    $j('.updateChanges').each(function() {
        var productdivs = $j(this).find("> div:not(.whiteBG,.pd-box-wrapper)");
        for (var i = 0; i < productdivs.length; i += 4) {
            productdivs.slice(i, i + 4).wrapAll('<div class="pd-box-wrapper clearfix"></div>');
        }
    });
    $j('.pd-box-wrapper').each(function() {
        if ($j(this).find('.pd-box-snapdown-click').length < 2) {
            $j(this).addClass('pd-make-center');
        }
        if ($j(this).find('.pd-box-snapdown-click').length < 3) {
            $j(this).addClass('pd-make-center-two');

        }

    });
});


/*----------- Social media -----------*/

function create_layout_for_loadmore() {
    $j('#channels-wrapper #loadmore-social').remove();
    if (!$j('#channels-wrapper #loadmore-social')[0]) {
        $j('#channels-wrapper:not(.5-11-social-feed) .brick').hide().addClass('hidden');
        $j('#channels-wrapper:not(.5-11-social-feed) .brick:lt(12)').show().removeClass('hidden');

        $j('#channels-wrapper:not(.5-11-social-feed)').append('<div id="loadmore-social"><a href="#" class="font18 PioneerMedium">Load More</a></div>');


        setEqualHeight_CommonClass("#channels-wrapper .brick");
    }
}

$j(document).ready(function() {
    create_layout_for_loadmore();

    var time = new Date().getTime();
    $j(document.body).bind("mousemove keypress", function(e) {
        time = new Date().getTime();
    });

    function refresh() {
        if ($j('.social-page .brick')[0]) {
            if (new Date().getTime() - time >= 60000) {
                //window.location.reload(true);
                $j('.async-tab-content .tab-content').html("<img src='/~/media/Images/R/Rolls-Royce/css/loader.png' alt='' style='margin:30px auto;display:block;' />");
                $j('.async-tabs:not(.investorsTab) .tabs li.current').click();
            } else
                setTimeout(refresh, 10000);
        }
    }

    setTimeout(refresh, 10000);

});

function social_text_to_links() {
    $j('#channels-wrapper .feed-title').each(function(i) {
        var str = $j(this).html();
        var regex = /(https?:\/\/([-\w\.]+)+(:\d+)?(\/([\w\/_\.]*(\?\S+)?)?)?)/ig;
        var replaced_text = str.replace(regex, "<a href='$1' target='_blank' title='Opens in a new window'>$1</a>");
        $j(this).html(replaced_text);
        var str1 = $j(this).html();

        if ($j(this).closest('.twitter-icon')[0]) {
            var replaced_text1 = str1.replace(/#(\S*)/g, '<a target="_blank" title="Opens in a new window" href="https://twitter.com/hashtag/$1">#$1</a>');
        } else if ($j(this).closest('.facebook-icon')[0]) {
            var replaced_text1 = str1.replace(/#(\S*)/g, '<a target="_blank" title="Opens in a new window" href="https://www.facebook.com/hashtag/$1">#$1</a>');
        } else if ($j(this).closest('.instagram-icon')[0]) {
            var replaced_text1 = str1.replace(/#(\S*)/g, '<a target="_blank" title="Opens in a new window" href="https://www.instagram.com/explore/tags/$1">#$1</a>');
        }

        $j(this).html(replaced_text1);
        var str2 = $j(this).html();

        if ($j(this).closest('.twitter-icon')[0]) {
            var replaced_text2 = str2.replace(/ @(\S*)/g, '<a target="_blank" title="Opens in a new window" href="https://twitter.com/$1"> @$1</a>');
        } else if ($j(this).closest('.facebook-icon')[0]) {
            var replaced_text2 = str2.replace(/ @(\S*)/g, '<a target="_blank" title="Opens in a new window" href="https://facebook.com/$1"> @$1</a>');
        } else if ($j(this).closest('.instagram-icon')[0]) {
            var replaced_text2 = str2.replace(/ @(\S*)/g, '<a target="_blank" title="Opens in a new window" href="https://instagram.com/$1"> @$1</a>');
        }

        $j(this).html(replaced_text2);
        $j(this).addClass("processed");

        if (!$j(this).next().is('.original-text')) {
            $j('<span class="hide original-text">' + $j(this).text() + '</span>').insertAfter(this);
        }


        if (i < 12) {
            $j(this).attr('id', 'brick' + i);
            ellipsizeTextBox($j(this).attr('id'));
            $j(this).height('auto');
            $j(this).attr('id', '');
        }

    });
}


$j(window).load(function() {
    //social_text_to_links();

});


$j(window).resize(function() {
    $j('#channels-wrapper .feed-title').each(function(i) {
        if ($j(this).text().indexOf('...') > -1) {

            if ($j(window).width() > 1200) {
                $j(this).css('height', '110px');
            } else {
                $j(this).css('height', '80px');
            }


            $j(this).text($j(this).next().text());
            $j(this).attr('id', 'brick' + i);
            ellipsizeTextBox($j(this).attr('id'));
            $j(this).height('auto');
            $j(this).attr('id', '');
        }
    });
});

$j(document).ajaxComplete(function() {
    setTimeout(function() {
        $j('.feed-title').each(function(i) {
            if (i < 12) {
                $j(this).attr('id', 'brick' + i);
                ellipsizeTextBox($j(this).attr('id'));
                $j(this).height('auto');
                $j(this).attr('id', '');
            }
        });
        setEqualHeight_CommonClass("#channels-wrapper .brick");
        social_text_to_links();
        create_layout_for_loadmore();
    }, 500);
});

function ellipsizeTextBox(id) {
    var el = document.getElementById(id);
    var wordArray = el.innerHTML.split(' ');
    while (el.scrollHeight > el.offsetHeight) {
        wordArray.pop();
        el.innerHTML = wordArray.join(' ') + '...';
    }
}

$j(document).on('click', '.social-filter-wrapper ul li a', function() {

    var id = $j(this).attr('id').split('-')[1];
    $j('#loadmore-social').remove();


    if (id == 'all') {
        $j('.social-filter-wrapper ul li a').removeClass('active');
        $j('#channels-wrapper .brick').show().removeClass('filtered');
        $j('.no-results').hide();

        create_layout_for_loadmore();
    } else {
        if ($j(this).hasClass('active')) {
            $j(this).removeClass('active');
        } else {
            $j(this).addClass('active');
            $j('#channels-wrapper .brick').hide();
        }
        $j('#channels-wrapper .brick').hide().removeClass('filtered');

        if ($j('.social-filter-wrapper ul li a.active')[0]) {
            $j('.social-filter-wrapper ul li a.active').each(function() {
                var i = $j(this).attr('id').split('-')[1];
                $j('#channels-wrapper .brick.' + i + '-icon').show().addClass('filtered');
            });


            $j('.brick').hide().removeClass('hidden');
            $j('.brick.filtered').hide().addClass('hidden');
            $j('.brick.filtered:lt(12)').show().removeClass('hidden');

            if ($j('.brick.filtered').length > 12) {
                if (!$j('#loadmore-social')[0]) {
                    $j('#channels-wrapper').append('<div id="loadmore-social"><a href="#" class="font18 PioneerMedium">Load More</a></div>');
                }
                $j('.no-results').hide();
            } else {
                if ($j('.brick.filtered').length < 1) {
                    $j('.no-results').show();
                } else {
                    $j('.no-results').hide();
                }
            }

        } else {
            $j('.social-filter-wrapper ul li a#filter-all').click();
        }

    }

    $j('.feed-title').each(function(i) {
        if ($j(this).text().indexOf('...') < 0) {
            $j(this).css('height', '110px');
            $j(this).attr('id', 'brick' + i);
            ellipsizeTextBox($j(this).attr('id'));
            $j(this).height('auto');
        }
    });

});

$j(document).on('click', "#loadmore-social a", function(e) {
    e.preventDefault();
    $j('.hidden').each(function(i, v) {
        if (i < 12) {
            $j(this).show().removeClass('hidden');
        }
    });

    if ($j('.hidden')[0]) {
        $j("#loadmore-social").show();
    } else {
        $j("#loadmore-social").hide();
    }

    $j('.feed-title').each(function(i) {
        if ($j(this).text().indexOf('...') < 0) {
            $j(this).attr('id', 'brick' + i);
            ellipsizeTextBox($j(this).attr('id'));
            $j(this).height('auto');
        }
    });

});

/*----------- Social media ends -----------*/


/*----------- Async Tabs deeplink -----------*/

$j(window).load(function() {
    var tabhash = window.location.hash;
    var hash = tabhash.substring(tabhash.indexOf('#') + 1);
    var fields = hash.split('/');
    var phash = fields[0];
    var chash = fields[1];

    if (!$j('.stickyNavWrap')[0]) {
        if ($j(window).width() > 767) {
            $j('.async-tabs').find('ul.desk-tab-with-icon-normal li[data-tab="' + phash + '"]').click();
        } else {
            $j('.async-tabs:not(.investorsTab)').find('ul.mobi-tabs-list li[data-tab="' + phash + '"]').click();
        }
    }

    $j('.fw-tabs-with-content ul.tabs li').each(function() {
        if ($j(this).attr('data-tab') == phash) {
            $j('html,body').animate({
                scrollTop: $j(this).parent().parent().offset().top - 60
            }, "slow");
        }

    });

});


/*---------- Remove all blank headings ------------*/
$j(document).ready(function() {
    $j('h2,h3,h4,h5').each(function() {
        if ($j.trim($j(this).text()) === '') {
            $j(this).remove();
        }
    });


});

function goToByScroll(id) {
    if ($j(id).length) {
        $j('html,body').animate({
            scrollTop: $j(id).offset().top - 50
        }, "slow");
    }
}

function contacts_slider() {
    /* Contact Cards Slider */

    $j('.fw-sld-outer-contact-card').each(function() {
        if ($j(this).find('.fw-sld-inner-box').length > 1) {
            $j(this).not('.slick-initialized').slick({
                infinite: false,
                dots: true,
                prevArrow: "<span class='rr-icon-arrow-nav slick-prev'></span>",
                nextArrow: "<span class='rr-icon-arrow-nav slick-next'></span>",
                slidesToShow: 3,
                slidesToScroll: 3,
                speed: 300,
                responsive: [{
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2,
                            dots: true
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            dots: true
                        }
                    }
                ]
            });
        }
    });

    /* Contact Cards Slider */
}


/*--------------- SVG image to SVG path --------------------*/
$j('.fw-tabbed-wrap .tabs-with-icon .tabs li a span.menu-img img').each(function() {
    var $img = $j(this);
    var imgID = $img.attr('id');
    var imgClass = $img.attr('class');
    var imgURL = $img.attr('src');

    $j.get(imgURL, function(data) {
        // Get the SVG tag, ignore the rest
        var $svg = $j(data).find('svg');

        // Add replaced image's ID to the new SVG
        if (typeof imgID !== 'undefined') {
            $svg = $svg.attr('id', imgID);
        }
        // Add replaced image's classes to the new SVG
        if (typeof imgClass !== 'undefined') {
            $svg = $svg.attr('class', imgClass + ' replaced-svg');
        }

        // Remove any invalid XML tags as per http://validator.w3.org
        $svg = $svg.removeAttr('xmlns:a');

        // Replace image with new SVG
        $img.replaceWith($svg);

    }, 'xml');

});

$j.fn.ForceNumericOnly = function() {
    return this.each(function() {
        $j(this).keydown(function(e) {
            var key = e.charCode || e.keyCode || 0;
            // allow backspace, tab, delete, arrows, numbers and keypad numbers ONLY
            return (
                key == 8 ||
                key == 9 ||
                key == 46 ||
                (key >= 37 && key <= 40) ||
                (key >= 48 && key <= 57) ||
                (key >= 96 && key <= 105));
        })
    })
};

$j(document).ready(function() {

    setEqualHeight_CommonClass(".four-signposts .signpost-wrapper");
    setEqualHeight_CommonClass(".equalheighticon");

    // Shareholder calculator - start
    $j("#ordinaryshareholding").ForceNumericOnly();
    //$j('#ordinaryshareholding').focus();

    $j("#RICalculate").on('click', function() {
        var ordval = $j('#ordinaryshareholding').val();
        if (ordval == "") {
            $j('#ordinaryshareholding').addClass('required');
            $j('#ordinaryshareholding').focus();
            return false;
        } else {
            $j('#ordinaryshareholding').removeClass('required');
        }

        var ordShareHoldings = Math.round($j("#ordinaryshareholding").val());
        var rightsAvailableToTake = parseInt(ordShareHoldings / 3 * 10);
        var costToTake = parseInt(rightsAvailableToTake * 0.32);
        var newOrdHoldingsAfterRI = rightsAvailableToTake + ordShareHoldings;


        $j('#rightstakeup').val(rightsAvailableToTake);
        $j('#costtotakeup').val(costToTake);
        $j('#newordinaryholding').val(newOrdHoldingsAfterRI);

        $j("#rightstakeup").val(function(index, value) {
            return value.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        });
        $j("#costtotakeup").val(function(index, value) {
            return value.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        });
        $j("#newordinaryholding").val(function(index, value) {
            return value.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        });
        $j("#ordinaryshareholding").val(function(index, value) {
            return value.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        });
        $j('#RICalculate').prop('disabled', true);
        $j('#RICalculate').addClass('disabled-button');
        $j("#costtotakeup").val("£" + $j("#costtotakeup").val());


    });

    $j("#RIReset").on('click', function() {
        $j('#rightstakeup').val("");
        $j('#costtotakeup').val("");
        $j('#newordinaryholding').val("");
        $j('#ordinaryshareholding').val("");
        $j('#ordinaryshareholding').focus();
        $j('#RICalculate').prop('disabled', false);
        $j('#RICalculate').removeClass('disabled-button');
    });
    // Shareholder calculator - end

});
$j(window).resize(function() {

    setEqualHeight_CommonClass(".four-signposts .signpost-wrapper");


});