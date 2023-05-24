/*!
 * jQuery imagesLoaded plugin v2.1.0
 * http://github.com/desandro/imagesloaded
 *
 * MIT License. by Paul Irish et al.
 */
/*jshint curly: true, eqeqeq: true, noempty: true, strict: true, undef: true, browser: true */ /*global jQuery: false */
(function(c, n) {
    var l = "data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw==";
    c.fn.imagesLoaded = function(f) {
        function m() {
            var b = c(i),
                a = c(h);
            d && (h.length ? d.reject(e, b, a) : d.resolve(e));
            c.isFunction(f) && f.call(g, e, b, a)
        }

        function j(b, a) {
            b.src === l || -1 !== c.inArray(b, k) || (k.push(b), a ? h.push(b) : i.push(b), c.data(b, "imagesLoaded", {
                isBroken: a,
                src: b.src
            }), o && d.notifyWith(c(b), [a, e, c(i), c(h)]), e.length === k.length && (setTimeout(m), e.unbind(".imagesLoaded")))
        }
        var g = this,
            d = c.isFunction(c.Deferred) ? c.Deferred() :
            0,
            o = c.isFunction(d.notify),
            e = g.find("img").add(g.filter("img")),
            k = [],
            i = [],
            h = [];
        c.isPlainObject(f) && c.each(f, function(b, a) {
            if ("callback" === b) f = a;
            else if (d) d[b](a)
        });
        e.length ? e.bind("load.imagesLoaded error.imagesLoaded", function(b) {
            j(b.target, "error" === b.type)
        }).each(function(b, a) {
            var d = a.src,
                e = c.data(a, "imagesLoaded");
            if (e && e.src === d) j(a, e.isBroken);
            else if (a.complete && a.naturalWidth !== n) j(a, 0 === a.naturalWidth || 0 === a.naturalHeight);
            else if (a.readyState || a.complete) a.src = l, a.src = d
        }) : m();
        return d ? d.promise(g) :

            g
    }
})($j);





//$j = jQuery.noConflict();
//prot = location.protocol;
var myCounter = 0;

prot = "https:";

(function($j) {
    $j.fn.flickr = function(o) {
        var s = {
            api_key: null,
            type: null,
            photoset_id: null,
            text: null,
            user_id: null,
            group_id: null,
            tags: null,
            tag_mode: 'any',
            thumb_size: 's',
            sort: 'date-posted-desc',
            size: 'm',
            per_page: 100,
            page: 1,
            attr: '',
            api_url: null,
            params: '',
            href: '#',
            layout: 'table',
            api_callback: '?',
            callback: null
        };



        if (o) $j.extend(s, o);
        return this.each(function() {
            if (s.layout == "ul") {
                var list = $j('<ul id="images-carousel" class="jcarousel jcarousel-skin-rotator">').appendTo(this);
                //var listdesc = $j('<ul id="images-carousel-shortdesc" style="display:none;">').appendTo(this);
                var url = $j.flickr.format(s);
                $j.getJSON(url, function(r) {
                    //alert(r.stat);	
                    //console.log(url);

                    if (r.stat != "ok") {
                        for (i in r) {
                            $j('<li>').text(i + ': ' + r[i]).appendTo(list);
                        };
                    } else {
                        if (s.type == 'photoset') r.photos = r.photoset;


                        myCounter = r.photos.photo.length;

                        //list.append("<p>Showing " + s.per_page + " of " + r.photos.total + " photos in the pool.</p>");
                        for (var i = 0; i < r.photos.photo.length; i++) {
                            var photo = r.photos.photo[i];

                            var th = prot + '//farm' + photo['farm'] + '.static.flickr.com/' + photo['server'] + '/' + photo['id'] + '_' + photo['secret'] + '_s.jpg';
                            var preview = prot + '//farm' + photo['farm'] + '.static.flickr.com/' + photo['server'] + '/' + photo['id'] + '_' + photo['secret'] + '.jpg';
                            var t = prot + '//farm' + photo['farm'] + '.static.flickr.com/' + photo['server'] + '/' + photo['id'] + '_' + photo['secret'] + '_' + s.thumb_size + '.jpg';
                            var h = prot + '//farm' + photo['farm'] + '.static.flickr.com/' + photo['server'] + '/' + photo['id'] + '_';
                            switch (s.size) {
                                case 'm':
                                    h += photo['secret'] + '_m.jpg';
                                    break;
                                case 'b':
                                    h += photo['secret'] + '_b.jpg';
                                    break;
                                case 'o':
                                    if (photo['originalsecret'] && photo['originalformat']) {
                                        h += photo['originalsecret'] + '_o.' + photo['originalformat'];
                                    } else {
                                        h += photo['secret'] + '_b.jpg';
                                    };
                                    break;
                                default:
                                    h += photo['secret'] + '.jpg';
                            };


                            if (location.protocol == "https:") {
                                photourl = "https://www.flickr.com/services/rest/?method=flickr.photos.getInfo&api_key=" + s.api_key + "&photo_id=" + photo['id'] + "&secret=" + photo['secret'] + "&format=json&jsoncallback=?";
                            } else {
                                photourl = "https://api.flickr.com/services/rest/?method=flickr.photos.getInfo&api_key=" + s.api_key + "&photo_id=" + photo['id'] + "&secret=" + photo['secret'] + "&format=json&jsoncallback=?";
                            }


                            //list.append('<li><a href="javascript:void(0);"  onclick="disp_image('+preview+')" data-photoid="photoid_'+photo['id']+'" title="'+photo['title']+'" ><img src="'+th+'" alt="'+photo['title']+'" width="144" height="84" /></a></li>');
                            //alert("flickr");
                            var imageLoaded = 1;
                            $j.getJSON(photourl, function(data) {
                                //myCounter++;
                                //console.log ("Image loaded = "+ myCounter);                
                                imageLoaded++;
                                //console.log(data.photo.dates.taken);

                                /*console.log(data);
                                console.log(data.photo.urls.url[0]._content);*/
                                /*console.log(data);
                                console.log(data.photo.description._content);*/

                                var preview1 = prot + '//farm' + data.photo.farm + '.static.flickr.com/' + data.photo.server + '/' + data.photo.id + '_' + data.photo.secret + '_c.jpg';

                                if ($j.trim(data.photo.title._content) !== '') {
                                    list.append('<li data-date="' + data.photo.dates.taken + '"><a target="_blank" data-photoid="photoid_' + data.photo.id + '" title="Opens in a new window - ' + data.photo.title._content + '" href="' + data.photo.urls.url[0]._content + '"><img src="' + preview1 + '" alt="' + data.photo.title._content + '" /></a><span>' + data.photo.title._content + '</span></li>');
                                } else {
                                    list.append('<li data-date="' + data.photo.dates.taken + '"><a target="_blank" data-photoid="photoid_' + data.photo.id + '" title="Opens in a new window - ' + data.photo.description._content + '" href="' + data.photo.urls.url[0]._content + '"><img src="' + preview1 + '" alt="' + data.photo.title._content + '" /></a><span>' + data.photo.description._content + '</span></li>');
                                }

                                /*if($j.trim(data.photo.description._content) !== ''){
                                  list.append('<li data-date="'+data.photo.dates.taken+'"><a target="_blank" data-photoid="photoid_'+data.photo.id+'" title="Opens in a new window - '+data.photo.description._content+'" href="'+data.photo.urls.url[0]._content+'"><img src="'+preview1+'" alt="'+data.photo.title._content+'" /></a><span>'+data.photo.description._content+'</span></li>');
                                }else{
                                  list.append('<li data-date="'+data.photo.dates.taken+'"><a target="_blank" data-photoid="photoid_'+data.photo.id+'" title="Opens in a new window - '+data.photo.title._content+'" href="'+data.photo.urls.url[0]._content+'"><img src="'+preview1+'" alt="'+data.photo.title._content+'" /></a><span>'+data.photo.title._content+'</span></li>');
                                }*/


                                /*
                                newDesc = data.photo.description._content;
                                newDesc = data.photo.title._content;
                                console.log(data);
                                console.log(data.photo.dateuploaded);
                                console.log(data.photo.dates.taken);*/


                            });

                        }
                        if (s.callback) s.callback(list);

                    };
                });
            }
        });
    };
    $j.flickr = {
        format: function(s) {
            if (s.url) return s.url;
            if (location.protocol == "https:") {
                var url = '//www.flickr.com/services/rest/?format=json&jsoncallback=' + s.api_callback + '&api_key=' + s.api_key;
            } else {
                var url = 'https://api.flickr.com/services/rest/?format=json&jsoncallback=' + s.api_callback + '&api_key=' + s.api_key;
            }


            switch (s.type) {
                case 'photoset':
                    url += '&method=flickr.photosets.getPhotos&photoset_id=' + s.photoset_id;
                    break;
                case 'search':
                    url += '&method=flickr.photos.search&sort=' + s.sort;
                    if (s.user_id) url += '&user_id=' + s.user_id;
                    if (s.group_id) url += '&group_id=' + s.group_id;
                    if (s.tags) url += '&tags=' + s.tags;
                    if (s.tag_mode) url += '&tag_mode=' + s.tag_mode;
                    if (s.text) url += '&text=' + s.text;
                    break;
                default:
                    url += '&method=flickr.photos.getRecent';
            };
            if (s.size == 'o') url += '&extras=original_format';
            url += '&per_page=' + s.per_page + '&page=' + s.page + s.params;
            //alert(url);
            return url;
        }
    };
})($j);

/*--  Sublayout JS starts  --*/


function fetchFromPhotsetId(flikr_photoset_id, flikr_url) {
    var ip3flickrid;
    var currWidth = $j(window).width();

    ip3flickrid = flikr_photoset_id;

    $j('span.flikrid-rr').text(ip3flickrid);
    $j("span.download-flickr-text a").attr("href", "https://www.flickr.com/photos/rolls-royceplc/sets/" + $j('span.flikrid-rr').text());

    if ($j(".crotator").closest('.scrollable-container')[0]) {
        var slider = $j(".scrollable-container .crotator");
    } else {
        var slider = $j("#MainWrapper .crotator");
    }
    // console.log(flikr_photoset_id+"--"+flikr_url);

    if (!slider.find('#images-carousel')[0]) {
        slider.flickr({
            api_key: "ef5c54bb3c958215b5486702e0800628",
            photoset_id: ip3flickrid,
            type: 'photoset',
            tag_mode: "all",
            sort: 'date-posted-desc',
            href: flikr_url,
            layout: 'ul',
            size: 'm',
            per_page: 20,
            itemFallbackDimension: 100
        });
    }

}

function fetchFromTags(flikr_tags, flikr_url) {

    var ip3flickrtags;
    var currWidth = $j(window).width();

    ip3flickrtags = '<ip3:field name="Tags" selfServable="false" />';

    $j('span.flikrid-rr').text(ip3flickrtags);
    $j("span.download-flickr-text a").attr("href", "https://www.flickr.com/photos/rolls-royceplc/sets/" + $j('span.flikrid-rr').text());

    if ($j(".crotator").closest('.scrollable-container')[0]) {
        var slider = $j(".scrollable-container .crotator");
    } else {
        var slider = $j("#MainWrapper .crotator");
    }

    // console.log(flikr_tags+"--"+flikr_url);

    if (!slider.find('#images-carousel')[0]) {
        slider.flickr({
            api_key: "ef5c54bb3c958215b5486702e0800628",
            type: 'search',
            user_id: "75295451@N07",
            tags: flikr_tags,
            tag_mode: "all",
            sort: 'date-posted-desc',
            href: flikr_url,
            layout: 'ul',
            size: 'm',
            per_page: 20,
            itemFallbackDimension: 100
        });
    }
}


var flikr_url, flikr_photoset_id, flikr_tags;

$j(document).ready(function() {

    /*---Moving sublayout code here---*/

    flikr_url = $j(".flickrIDs").find('.flickr-url').text();
    flikr_photoset_id = $j(".flickrIDs").find('.flickr-photosetid').text();
    flikr_tags = $j(".flickrIDs").find('.flickr-tags').text();

    if (flikr_photoset_id !== '') {
        fetchFromPhotsetId(flikr_photoset_id, flikr_url);
    } else {
        fetchFromTags(flikr_tags, flikr_url);
    }

    /*---Moving sublayout code here---*/

    $j('#finalFlicker').on('afterChange', function(event, slick, currentSlide, nextSlide) {
        $j('.flicker-module-section .fw-sld-wrapper,.flicker-module-section .fw-sld-wrapper .slick-list').height($j('.flicker-module-section .fw-sld-wrapper ul div.slick-track').outerHeight());
    });

}); //  End of document ready fn

$j(window).load(function() {
    if ($j('.discover-items-wrapper')[0]) {} else {
        slider_call('true');
    }
}); //  End of window load fn

$j(document).ajaxComplete(function() {

    /*---Moving sublayout code here---*/

    flikr_url = $j(".flickrIDs").find('.flickr-url').text();
    flikr_photoset_id = $j(".flickrIDs").find('.flickr-photosetid').text();
    flikr_tags = $j(".flickrIDs").find('.flickr-tags').text();

    if (flikr_photoset_id !== '') {
        fetchFromPhotsetId(flikr_photoset_id, flikr_url);
    } else {
        fetchFromTags(flikr_tags, flikr_url);
    }

    /*---Moving sublayout code here---*/

    if ($j('.discover-items-wrapper')[0]) {} else {
        slider_call('true');
    }
});

function slider_call(bool) {


    /*$j('#images-carousel').photoset( {
  "initComplete": function( settings, json ) {
    alert('final');
  }
});*/

    setTimeout(function() {

        if (bool === 'true') {
            var img_corousal = $j('#images-carousel');
            var flickr_slider = $j('#finalFlicker');
        } else if (bool === 'false') {
            var img_corousal = $j('.scrollable-container #images-carousel');
            var flickr_slider = $j('.scrollable-container #finalFlicker');
        }


        var cnt2 = setInterval(function() {

            //console.log("log:::" + $j('#images-carousel li').length);

            if (myCounter == img_corousal.find('li').length) {
                img_corousal.find('li').sort(function(a, b) {
                    return new Date($j(a).attr("data-date")) > new Date($j(b).attr("data-date"));
                }).each(function() {
                    flickr_slider.prepend(this);
                });

                clearInterval(cnt2);
            }
        }, 100);

        var cnt = setInterval(function() {

            //console.log("log:::" + $j('#finalFlicker li').length);

            if (myCounter == flickr_slider.find('li').length) {

                flickr_slider.find('li').each(function() {
                    if ($j(this).find('span').text().length > 65) {
                        var titleFLKR = $j(this).find('span').text();
                        var shortTextFLKR = $j.trim(titleFLKR).substring(0, 65).split(" ").slice(0, -1).join(" ") + "...";
                        $j(this).find('span').text(shortTextFLKR);
                    }
                });


                if (flickr_slider.find('li').length <= 1) {
                    flickr_slider.parent().addClass('notFlickrSlick');
                }

                if (flickr_slider.find('li').length > 1) {
                    flickr_slider.not('.slick-initialized').slick({
                        dots: false,
                        prevArrow: "<span class='rr-icon-chevron-body slick-prev'></span>",
                        nextArrow: "<span class='rr-icon-chevron-body slick-next'></span>",
                        centerMode: true,
                        adaptiveHeight: true,
                        centerPadding: '0',
                        slidesToShow: 3,
                        responsive: [{
                                breakpoint: 992,
                                settings: {
                                    centerMode: true,
                                    centerPadding: '0',
                                    slidesToShow: 1
                                }
                            },
                            {
                                breakpoint: 768,
                                settings: {

                                    centerMode: true,
                                    centerPadding: '0',
                                    slidesToShow: 1
                                }
                            }
                        ]
                    });
                }

                clearInterval(cnt);
                //alert('done');

            } //  end of if

        }, 100);

    }, 10);

}

/*--  Sublayout js code ends  --*/