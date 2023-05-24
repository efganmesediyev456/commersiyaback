$j(window).load(function() {



});

$j(document).ready(function() {

    if (is_touch_device()) {
        $j('.discover-items-wrapper').addClass('touch');
    }

    if (viewport1().width > 767) {
        if ($j('.products-wrapper > div').length > 3) {

            $j('.products-wrapper.slick-initialized').slick('unslick');

            $j('.products-wrapper').slick({
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

        } else {
            $j('.products-wrapper').addClass('disabled-slick-space');
        }
    } else {
        if ($j('.products-wrapper > div').length > 1) {
            $j('.products-wrapper.slick-initialized').slick('unslick');
            $j('.products-wrapper').slick({
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
        } else {
            $j('.products-wrapper').addClass('disabled-slick-space');
        }
    }
}); //  End of document ready


$j('.tabs').on('afterChange', function(slick, currentSlide) {

    $j('.tab-content.current .products-wrapper').slick('setPosition');

    setTimeout(function() {
        //$this = $j('.tab-content.current .products-wrapper');

        slider_arrows_adjust($j(this).closest('.sub-section').find('.tab-content.current .products-wrapper'));

        /*if ($this.find('.slick-dots > li').length > 0) {
            var totalWidth1 = 0;
            $this.find('.slick-dots > li').each(function() {
                totalWidth1 = totalWidth1 + $j(this).width();
            });
            var newPrevNext1 = totalWidth1 + 50;
            if (currWidth < 768) {
                if ($this.find('.slick-dots > li').length > 8) {
                    $this.find('.slick-dots > li').hide();
                    $this.parent().parent().find('.slick-initialized').addClass('morethen8dots');
                    $this.find('.slick-arrow.slick-next').css('right', '-8px');
                    $this.find('.slick-arrow.slick-prev').css('left', '0');
                } else {
                    $this.find('.slick-dots > li').show();
                    $this.parent().parent().find('.slick-initialized').removeClass('morethen8dots');
                    $this.find('.slick-arrow.slick-next').css('right', - + (newPrevNext1 + 120));
                    $this.find('.slick-arrow.slick-prev').css('left', -(newPrevNext1 + 120));
                }
            } else {
                $this.find('.slick-dots > li').show();
                $this.parent().parent().find('.slick-initialized').removeClass('morethen8dots');
                $this.find('.slick-arrow.slick-next').css('right', -(newPrevNext1+120));
                $this.find('.slick-arrow.slick-prev').css('left', -(newPrevNext1 +120));
            }
        }*/

    }, 200);
});