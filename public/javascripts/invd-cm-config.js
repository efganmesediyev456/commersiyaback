/* © InvestisDigital, All rights reserved, v2.0.0 */
var __CookieConsentConfig = {
    title: 'This site uses cookies to improve your experience.',
    description: 'We use cookies to personalise content and to analyse our traffic. We also share information about your use of our site with our analytics partners. View our <a href="/site-services/use-of-cookies.aspx">cookies page</a>.',
    acceptAllBtnText: 'Accept all cookies',
    cookieSettingBtnText: 'Change cookie preferences',
    saveBtnText: 'Save preferences',
    categoriesTitle: 'Manage cookie preferences',
    expiry: 90,
    cookieName: '__CookieConsentV200',
    legacyCookieName: '__CookieConsent',
    excludePages: ['/site-services/use-of-cookies.aspx'],
    categories: [{
        name: 'necessaryCookie',
        title: 'Strictly necessary cookies',
        description: 'These cookies allow the website to remember choices you make and provide enhanced, more personal features. The information these cookies collect may be anonymized and they cannot track your browsing activity on other websites.',
        required: true,
        requiredText: 'Required'
    }, {
        name: 'performanceCookies',
        title: 'Performance cookies',
        description: 'We\'d like to set Analytics cookies to help us to improve our website by collecting and reporting information on how you use it. For more information on how these cookies work please see our <a href="/site-services/use-of-cookies.aspx">cookies policy</a>. The cookies collect information in an anonymous form.',
        required: false,
        defaultState: false,
        cookieList: ['_gid', '_ga', '_gclxxxx', '_gat_UA-22832915-1', '_gat_UA-22832915-34', '_gat_INVDSitecore', 'ak_bmsc', 'UserMatchHistory', 'lidc', 'bcookie', 'IDE', 'lang', 'lissc', 'bscookie', 'lang', 'li_rm', 'JSESSIONID', 'li_sugr', 'personalization_id', 'anj', 'uuid2', '_gcl_au', '_lfa', '_ga_PGV1K2BN4M', '_ga_PWMX3HL491', '_ga_3BE10EX4QJ', '_ga_FB5VNNY0S4', '_ga_HDM6BN56JZ', '_ga_S8BHC5V3F8', '_ga_PGV1K2BN4M', '_ga_K3TQDEV94Y', '__utma', '__utmt', '__utmb', '__utmc', '__utmz']
    }, {
        name: 'functionalCookies',
        title: 'Functionality Cookies',
        description: 'These cookies are used to recognise you when you return to our website. This enables us to personalise our content for you, greet you by name and remember your preferences (for example, your choice of language or region).',
        required: false,
        defaultState: false,
        cookieList: ['xb', 'vp', 's_tp', 's_cc', 's_ptc', 's_ppv', 'ccc']
    }, {
        name: 'marketingCookies',
        title: 'Marketing Cookies',
        description: 'These cookies may be set through our site by our advertising partners. They may be used by those companies to build a profile of your interests and show you relevant adverts on other sites. They do not store directly personal information, but are based on uniquely identifying your browser and internet device. If you do not allow these cookies, your will experience less targeted advertising.',
        required: false,
        defaultState: false,
        cookieList: ['msd365mkttrs', 'msd365mkttr', '_hjTLDTest', '_hjid', '_hjFirstSeen', '_hjAbsoluteSessionInProgress', '_hjIncludedInPageviewSample', '_hjSessionUser_615119', '_hjSession_615119', 'fr', '_fbp']
    }],
    noticeText: 'This site uses cookies. To see how cookies are used, please review our <a href="/site-services/use-of-cookies.aspx">cookie notice</a>. If you agree to our use of cookies, please continue to use our site.',
    noticeButtonText: 'Continue',
    disableOptionalBtnText: 'Decline cookies'
};
window.CookieConsent = new CookieConsent(__CookieConsentConfig);