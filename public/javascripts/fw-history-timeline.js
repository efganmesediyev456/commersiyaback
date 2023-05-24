/* Time Line Js */
var MycurrWidth = viewport().width;
var NofTab2show = 7;
var Nofslides2move = 0;
var Nofslides2move1 = 0;
var TotalHistoryYears = 0;
var IsPrevDisable = true;




if (MycurrWidth === 768) {
    NofTab2show = 5;
} else if (MycurrWidth < 768) {
    NofTab2show = 3;
} else if (MycurrWidth > 768) {
    NofTab2show = 7;
} else if (MycurrWidth === 1024) {
    NofTab2show = 5;
}


$j(document).ready(function() {

    TotalHistoryYears = $j(".history-timeline-year-tab-index.slick-slide").length;

    $j(".history-timeline-data").not('.slick-initialized').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        autoplay: false,
        swipe: false,
        infinite: false,
        adaptiveHeight: true
    });

    $j(".history-timeline-year-nav").not('.slick-initialized').slick({
        slidesToShow: NofTab2show,
        slidesToScroll: NofTab2show,
        arrows: true,
        autoplay: false,
        swipe: false,
        infinite: false
    });


    $j(document).on('click', '.history-timeline-year-tab-index.slick-slide', function() {
        var yearID = $j(this).attr('data-slick-index');
        if (yearID == 0) {
            $j(".history-timeline-year-nav .history-year-prev-arrow").addClass("slick-disabled");
        }
        $j(".history-timeline-year-tab-index.slick-slide").removeClass("slick-current");
        $j(this).addClass("slick-current");
        $j('.history-timeline-data').slick('slickGoTo', yearID);
        Nofslides2move = yearID;
        Nofslides2move1 = yearID - 1;
        if ($j(".history-timeline-year-nav .history-timeline-year-tab-index.slick-slide.last-year").hasClass("slick-current")) {
            $j(".history-timeline-year-nav .history-year-next-arrow").addClass("slick-disabled");
        }

        var IsFirstYear2 = $j(".history-timeline-year-nav .history-timeline-year-tab-index.slick-slide.slick-current").hasClass("first-year");
        if (IsFirstYear2 === false) {
            $j(".history-timeline-year-nav .history-year-prev-arrow").removeClass("slick-disabled");
        }

        var IsLastYear2 = $j(".history-timeline-year-nav .history-timeline-year-tab-index.slick-slide.slick-current").hasClass("last-year");
        if (IsLastYear2 === false) {
            $j(".history-timeline-year-nav .history-year-next-arrow").removeClass("slick-disabled");
        }

    });


    $j(".history-timeline-year-nav").prepend('<button type="button" class="history-year-prev-arrow">Previous</button>');
    $j(".history-timeline-year-nav").append('<button type="button" class="history-year-next-arrow">Next</button>');
    $j(".history-timeline-year-nav .history-year-prev-arrow").addClass("slick-disabled");
    $j(".history-timeline-year-nav .history-timeline-year-tab-index.slick-slide").first().addClass("first-year");
    $j(".history-timeline-year-nav .history-timeline-year-tab-index.slick-slide").last().addClass("last-year");



    $j(document).on('click', '.history-year-next-arrow', function() {

        // if previous arrow disable, make it enable - start
        IsPrevDisable = $j(".history-timeline-year-nav .history-year-prev-arrow").hasClass("slick-disabled");
        if (IsPrevDisable === true) {
            $j(".history-timeline-year-nav .history-year-prev-arrow").removeClass("slick-disabled");
        }
        // if previous arrow disable, make it enable - end

        // if current slide is last slide, make next arrow disable - start		
        var IsLastYear = $j(".history-timeline-year-nav .history-timeline-year-tab-index.slick-slide.slick-current").hasClass("last-year");

        if (IsLastYear === true) {
            $j(".history-timeline-year-nav .history-year-next-arrow").addClass("slick-disabled");
        }
        // if current slide is last slide, make next arrow disable - start
        else {
            //console.log((parseInt(Nofslides2move))+" -- "+NofTab2show);

            var mynuewmove = (parseInt(Nofslides2move) + 1);
            var modValue = mynuewmove % NofTab2show;
            console.log("modValue value =" + modValue + " mynuewmove value = " + mynuewmove);
            if (modValue == 0) {
                $j(".history-timeline-year-nav .history-timeline-year-tab-index.slick-slide.slick-current").removeClass("slick-current").next(".history-timeline-year-nav .history-timeline-year-tab-index.slick-slide").addClass("slick-current").trigger("click");
                $j('.history-timeline-year-nav').slick('slickGoTo', mynuewmove);
                //mynuewmove = (parseInt(mynuewmove)+parseInt(mynuewmove));
            } else {
                $j(".history-timeline-year-nav .history-timeline-year-tab-index.slick-slide.slick-current").removeClass("slick-current").next(".history-timeline-year-nav .history-timeline-year-tab-index.slick-slide").addClass("slick-current").trigger("click");
            }
        }

    });



    $j(document).on('click', '.history-year-prev-arrow', function() {


        // if previous arrow disable, make it enable - start
        IsNextDisable = $j(".history-timeline-year-nav .history-year-next-arrow").hasClass("slick-disabled");
        if (IsNextDisable === true) {
            $j(".history-timeline-year-nav .history-year-next-arrow").removeClass("slick-disabled");
        }
        // if previous arrow disable, make it enable - end

        // if current slide is last slide, make next arrow disable - start		
        var IsFirstYear = $j(".history-timeline-year-nav .history-timeline-year-tab-index.slick-slide.slick-current").hasClass("first-year");

        if (IsFirstYear === true) {
            $j(".history-timeline-year-nav .history-year-prev-arrow").addClass("slick-disabled");
        }
        // if current slide is last slide, make next arrow disable - start
        else {
            //console.log((parseInt(Nofslides2move))+" -- "+NofTab2show);

            var mynuewmove = (parseInt(Nofslides2move) - 1);
            //mynuewmove = ~mynuewmove + 1
            var modValue = mynuewmove % (NofTab2show);
            console.log("modValue value1 =" + modValue + " mynuewmove value1 = " + mynuewmove);

            if ($j(".history-timeline-year-nav .history-timeline-year-tab-index.slick-slide.slick-active").first().hasClass("slick-current")) {
                $j(".history-timeline-year-nav .history-timeline-year-tab-index.slick-slide.slick-current").removeClass("slick-current").prev(".history-timeline-year-nav .history-timeline-year-tab-index.slick-slide").addClass("slick-current").trigger("click");
                $j('.history-timeline-year-nav').slick('slickGoTo', mynuewmove - 1);
                $j(".history-timeline-year-nav .history-timeline-year-tab-index.slick-slide").each(function() {
                    if ($j(this).attr("data-slick-index") == mynuewmove) {
                        $j(this).trigger("click");
                    }
                });
                //mynuewmove = (parseInt(mynuewmove)+parseInt(mynuewmove));
            } else {
                $j(".history-timeline-year-nav .history-timeline-year-tab-index.slick-slide.slick-current").removeClass("slick-current").prev(".history-timeline-year-nav .history-timeline-year-tab-index.slick-slide").addClass("slick-current").trigger("click");
            }


            /*
			
            if(modValue == 0){
            	$j(".history-timeline-year-nav .history-timeline-year-tab-index.slick-slide.slick-current").removeClass("slick-current").prev(".history-timeline-year-nav .history-timeline-year-tab-index.slick-slide").addClass("slick-current").trigger("click");
            	$j('.history-timeline-year-nav').slick('slickGoTo', mynuewmove-1);
            	$j(".history-timeline-year-nav .history-timeline-year-tab-index.slick-slide.slick-current").trigger("click");
            	//mynuewmove = (parseInt(mynuewmove)+parseInt(mynuewmove));
            }
            else{
            	$j(".history-timeline-year-nav .history-timeline-year-tab-index.slick-slide.slick-current").removeClass("slick-current").prev(".history-timeline-year-nav .history-timeline-year-tab-index.slick-slide").addClass("slick-current").trigger("click");
            }
			
            */
        }

    });






});


$j(window).load(function() {

    var MycurrWidth = viewport().width;
    var NofTab2show = 7;

    if (MycurrWidth === 768) {
        NofTab2show = 5;
    } else if (MycurrWidth < 768) {
        NofTab2show = 3;
    } else if (MycurrWidth > 768) {
        NofTab2show = 7;
    } else if (MycurrWidth === 1024) {
        NofTab2show = 7;
    }

    //alert("MycurrWidth - windowload"+MycurrWidth);

});