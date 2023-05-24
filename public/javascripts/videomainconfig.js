var _gaLoad = false;
if (typeof window.CookieConsent == "undefined" || typeof window.CookieConsent.categories == "undefined" || typeof window.CookieConsent.categories.performanceCookies == "undefined" || window.CookieConsent.categories.performanceCookies) {
    _gaLoad = true;
}

var inv_mainConfiguration = {
    //18-01-2017 Urvi : Allow File execution in local machine
    inv_local: false,

    inv_isIE8: ((/MSIE (\d+\.\d+);/.test(navigator.userAgent)) ? new Number(RegExp.$1) == 8 : false),
    inv_videoJQuery: $j,
    inv_videoCodeReady: false,
    inv_protocol: 'https://', //'http://'  //'https://'  //'http://'
    inv_hostName: 'viz.tools.investis.com/', //'visualisation.investis.com/'   //'viz.tools.investis.com/'    //'localhost/'
    inv_playerPath: 'video/videoPlayer-v.2.0-latest/', //'video/videoPlayer-v.2.0-test/'        //'video/videoPlayer-v.2.0/' 		

    inv_videoClient: 'rolls-royce',
    inv_videoClientDir: 'rolls-royce/rebrand-new',

    /* map flags */
    inv_mapCodeReady: false,
    inv_mapXmlPath: 'products-and-services/civil-aerospace/aftermarket-services/carestore/carestore/airlines/map-landing/map-hub.aspx?async=1&content-type=text/xml',
    inv_mapCssPath: 'css/googlemap.css',

    inv_urlProxy: '/tools/urlproxy/urlproxy.aspx?settingname=',

    inv_imageSequencePath: 'files/imagesequence/@referenceId/smallpng/img_@imageSequence.png',
    inv_cssPath: 'css/videoPlayer.css',
    inv_xmlPath: 'innovation-video-xml',
    inv_renderViewPath: 'innovation-video-@viewFileName-view',
    inv_brightcoveAnalyticsPath: 'sendBrightcoveAnalyticsData.php',

    inv_facebookAppId: '1706038252974554',
    inv_gaType: 'universal',
    inv_gaAccount: 'UA-22832915-1',
    inv_debugMode: false, //For debugging - Value:true/false - DefaultValue:false
    inv_startTime: new Date(),

    inv_dateFormat: 'dd/MM/yyyy',

    inv_modulesRequested: new Array(),
    inv_modulesLoaded: new Array(),
    inv_bypassModuleLoadLogic: false,
    inv_disableBuiltInDeeplinking: false,
    inv_disableBuiltInGATracking: !_gaLoad,

    inv_mapJSloaded: false
}
//18-01-2017 Urvi : Allow File execution in local machine -- start
if (window.location.host + "/" == inv_mainConfiguration.inv_hostName)
    inv_mainConfiguration.inv_local = true;

if (inv_mainConfiguration.inv_local) {
    inv_mainConfiguration.inv_bypassModuleLoadLogic = false;
    inv_mainConfiguration.inv_gaAccount = 'UA-123-1';

    inv_mainConfiguration.inv_xmlPath = 'files/videoXMLFile-smallpng.xml';
    inv_mainConfiguration.inv_renderViewPath = 'view/@viewFileName.html';

    inv_mainConfiguration.inv_mapXmlPath = 'files/googlemap.xml';
}

inv_mainConfiguration.inv_videoBaseURL = function() {
    if (inv_mainConfiguration.inv_local)
        return '../../';
    else
        return (inv_mainConfiguration.inv_protocol + inv_mainConfiguration.inv_hostName + inv_mainConfiguration.inv_playerPath);
}
//18-01-2017 Urvi : Allow File execution in local machine -- end
if (!inv_mainConfiguration.inv_isIE8) {
    inv_mainConfiguration.inv_modules = {
        //18-01-2017 Urvi : Changed Centralized Files path
        paths: {
            libs: inv_mainConfiguration.inv_videoBaseURL() + "centralizedprojectfiles/js/libs/",
            models: inv_mainConfiguration.inv_videoBaseURL() + "centralizedprojectfiles/js/models/",
            controllers: inv_mainConfiguration.inv_videoBaseURL() + "centralizedprojectfiles/js/controllers/",
            clientDir: inv_mainConfiguration.inv_videoBaseURL() + inv_mainConfiguration.inv_videoClientDir + "/js/"
        },
        shim: {
            /* map paths */
            'clientDir/jquery.mapCode': {
                deps: ['libs/matchMedia', 'models/jquery.deviceDetection', 'models/jquery.readXMLFile', 'libs/infobubble']
            },
            /* videoplayer paths */
            'clientDir/jquery.videoCode': {
                deps: ['libs/matchMedia', 'models/jquery.deviceDetection', 'models/jquery.gaCode', 'models/jquery.readXMLFile', 'libs/imagesloaded.min']
            },
            'clientDir/jquery.videoDataCtrl': {
                deps: ['models/jquery.xmlVideoData', 'clientDir/jquery.brightcoveData']
            },
            'controllers/jquery.singlePlayerCtrl': {
                deps: ['models/jquery.html5Player', 'controllers/jquery.videoPlayerCtrl']
            },
            'clientDir/jquery.interactiveElementCtrl': {
                deps: ['libs/jquery.requestAnimationFramePolyfill', 'models/jquery.imagePlayer', 'controllers/jquery.videoPlayerCtrl', 'libs/jquery.parallax.min', 'libs/jquery.mobile.custom.min', 'libs/jquerymobile-swipeupdown']
            },
            'clientDir/jquery.interactiveImageElementCtrl': {
                deps: ['models/jquery.threesixty', 'libs/jquery.requestAnimationFramePolyfill', 'models/jquery.imagePlayer', 'controllers/jquery.videoPlayerCtrl', 'libs/jquery.parallax.min', 'libs/jquery.mobile.custom.min', 'libs/jquerymobile-swipeupdown']
            },
            'controllers/jquery.videoControlsCtrl': {
                deps: ['models/jquery.videoControls']
            },
            'controllers/jquery.soundCtrl': {
                deps: ['models/jquery.soundCode', 'libs/jquery.mobile.custom.min']
            },
            'controllers/jquery.infoCtrl': {
                deps: ['models/jquery.videoInformation']
            },
            'controllers/jquery.shareCtrl': {
                deps: ['models/jquery.shareCode']
            },
            'clientDir/jquery.videoGalleryCtrl': {
                deps: ['models/jquery.customSlider', 'models/jquery.customTabs', 'clientDir/jquery.videoGallery']
            },
            'controllers/jquery.colorboxPlayerCtrl': {},
            'controllers/jquery.bxSliderPlayerCtrl': {}
        }
    }
    inv_mainConfiguration.inv_videoJQuery(function() {
        /* inv_mainConfiguration.inv_videoJQuery.getScript('https://maps.google.com/maps/api/js?v=3&key=AIzaSyCtxMhOeg2UsYHCCqBNJstx5yfKxu3A9Fs', function() 
        { */
        inv_mainConfiguration.inv_videoJQuery.getScript((inv_mainConfiguration.inv_bypassModuleLoadLogic == true ? (inv_mainConfiguration.inv_modules.paths.clientDir + 'videoMerged.js') : (inv_mainConfiguration.inv_modules.paths.libs + 'globalScripts.js')) + '?' + inv_mainConfiguration.inv_videoJQuery.now(), function() {
            inv_mainConfiguration.inv_debugConsole("jquery is ready");

            //18-01-2017 Urvi : Allow File execution in local machine
            var inv_absoluteProxyFilePath;
            var inv_absoluteFilePath;
            if (!inv_mainConfiguration.inv_local) {
                inv_absoluteProxyFilePath = inv_mainConfiguration.inv_urlProxy;
                inv_absoluteFilePath = inv_mainConfiguration.inv_videoBaseURL() + inv_mainConfiguration.inv_videoClientDir;

                inv_mainConfiguration.inv_renderViewPath = inv_absoluteProxyFilePath + inv_mainConfiguration.inv_renderViewPath;
            }

            inv_mainConfiguration.inv_brightcoveAnalyticsPath = inv_mainConfiguration.inv_videoBaseURL() + "centralizedprojectfiles/" + inv_mainConfiguration.inv_brightcoveAnalyticsPath;


            /* video player Code */
            if (!inv_mainConfiguration.inv_local) {
                inv_mainConfiguration.inv_xmlPath = inv_absoluteProxyFilePath + inv_mainConfiguration.inv_xmlPath;
                inv_mainConfiguration.inv_cssPath = inv_absoluteFilePath + "/" + inv_mainConfiguration.inv_cssPath + "?" + Math.random();
                if (inv_mainConfiguration.inv_imageSequencePath != undefined)
                    inv_mainConfiguration.inv_imageSequencePath = inv_absoluteFilePath + "/" + inv_mainConfiguration.inv_imageSequencePath;
            }
            inv_mainConfiguration.inv_videoJQuery('<link rel="stylesheet" href="' + inv_mainConfiguration.inv_cssPath + '" type="text/css"/>').appendTo("head").each(function() {
                inv_mainConfiguration.inv_debugConsole("css is ready");
            });
            inv_mainConfiguration.inv_resolveModuleNameAndLoad(['clientDir/jquery.videoCode', 'clientDir/jquery.videoDataCtrl'], function() {
                inv_mainConfiguration.inv_debugConsole("video code and data js ready");
                inv_mainConfiguration.inv_videoDataContainer = inv_mainConfiguration.inv_videoJQuery("body").videoDataCtrl({
                    videoDataReceived: function(videoData) {
                        inv_mainConfiguration.inv_debugConsole("data loaded");
                        inv_mainConfiguration.inv_videoCodeReady = true;
                    },
                    errorReceived: function(errString) {
                        inv_mainConfiguration.inv_debugConsole('inv_videoDataContainer Error:' + errString);
                    }
                });
            });


            /* map Code */
            if (!inv_mainConfiguration.inv_local) {
                //inv_mainConfiguration.inv_mapXmlPath = inv_absoluteFilePath +"/"+ inv_mainConfiguration.inv_mapXmlPath; 
                inv_mainConfiguration.inv_mapCssPath = inv_absoluteFilePath + "/" + inv_mainConfiguration.inv_mapCssPath;
            }
            inv_mainConfiguration.inv_videoJQuery('<link rel="stylesheet" href="' + inv_mainConfiguration.inv_mapCssPath + '" type="text/css" />').appendTo("head").each(function() {
                inv_mainConfiguration.inv_debugConsole("map css is ready");
            });
            inv_mainConfiguration.inv_resolveModuleNameAndLoad(['clientDir/jquery.mapCode'], function() {
                inv_mainConfiguration.inv_debugConsole("map code ready");
                inv_mainConfiguration.inv_mapCodeReady = true;
            });
        });
        /* });	 */
    });
}
(function($) {
    $.fn.InvPlayer = function(params) {
        var def = new $.Deferred();
        var me = $(this);
        var dataname = 'videoCode';
        var instance = me.data(dataname);
        if (!inv_mainConfiguration.inv_isIE8) {
            if (instance == undefined && !inv_mainConfiguration.inv_videoCodeReady) {
                var checkVideoCodeReady = setInterval(function() {
                    if (inv_mainConfiguration.inv_videoCodeReady) {
                        clearInterval(checkVideoCodeReady);
                        def.resolve(me.videoCode(params));
                    }
                }, 500);
            } else
                def.resolve(me.videoCode(params));
        } else {
            me.html("not supported");
            def.reject();
        }
        return def.promise(instance);
    };
})(inv_mainConfiguration.inv_videoJQuery);
(function($) {
    $.fn.InvMap = function(params) {
        var def = new $.Deferred();
        var me = $(this);
        var dataname = 'mapCode';
        var instance = me.data(dataname);
        if (!inv_mainConfiguration.inv_isIE8) {
            if (instance == undefined && !inv_mainConfiguration.inv_mapCodeReady) {
                var checkInvMapCodeReady = setInterval(function() {
                    if (inv_mainConfiguration.inv_mapCodeReady) {
                        clearInterval(checkInvMapCodeReady);
                        def.resolve(me.mapCode(params));
                    }
                }, 500);
            } else
                def.resolve(me.mapCode(params));
        } else {
            me.html("not supported");
            def.reject();
        }
        return def.promise(instance);
    };
})(inv_mainConfiguration.inv_videoJQuery);