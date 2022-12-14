/* ========= INFORMATION ============================

 - document:  Slick Modals - HTML5 and CSS3 powered modal popups
 - author:    Capelle @ Codecanyon
 - profile:   http://codecanyon.net/user/Capelle
 - version:   3.0

 ==================================================== */

!function(o){o.fn.slickModals=function(i){var n=o.extend({popupType:null,delayTime:null,exitTopDistance:null,scrollTopDistance:null,setCookie:!1,cookieDays:null,cookieTriggerClass:"setSlickCookie",cookieName:"slickCookie",overlayBg:!1,overlayBgColor:null,overlayTransition:null,overlayTransitionSpeed:null,bgEffect:null,blurBgRadius:null,scaleBgValue:null,windowWidth:null,windowHeight:null,windowLocation:null,windowTransition:null,windowTransitionSpeed:null,windowTransitionEffect:null,windowShadowOffsetX:null,windowShadowOffsetY:null,windowShadowBlurRadius:null,windowShadowSpreadRadius:null,windowShadowColor:null,windowBackground:null,windowRadius:null,windowMargin:null,windowPadding:null,closeButton:null,reopenClass:null},i);return this.each(function(){function i(){o(r).addClass("isActive")}function e(){o(r).removeClass("isActive")}function a(){function i(){o(c).not(".slickModal").addClass("blurred").css({"-webkit-filter":"blur("+n.blurBgRadius+")","-moz-filter":"blur("+n.blurBgRadius+")","-ms-filter":"blur("+n.blurBgRadius+")",filter:"blur("+n.blurBgRadius+")"})}function e(){o(c).not(".slickModal").addClass("scaled").css({"-webkit-transform":"scale("+n.scaleBgValue+")","-moz-transform":"scale("+n.scaleBgValue+")","-ms-transform":"scale("+n.scaleBgValue+")",transform:"scale("+n.scaleBgValue+")"})}"blur"===n.bgEffect&&i(),"scale"===n.bgEffect&&e(),"both"===n.bgEffect&&(i(),e()),o(c).not(".slickModal").css({"-webkit-transition-duration":n.overlayTransitionSpeed+"s","-moz-transition-duration":n.overlayTransitionSpeed+"s","-ms-transition-duration":n.overlayTransitionSpeed+"s","transition-duration":n.overlayTransitionSpeed+"s"})}function l(){o(c).removeClass("blurred scaled").css({"-webkit-transform":"","-moz-transform":"","-ms-transform":"",transform:"","-webkit-filter":"","-moz-filter":"","-ms-filter":"",filter:""})}function s(){o(r).prepend("<div class='overlay closeModal'></div>"),o(r).children(".overlay").addClass(n.overlayTransition+" "+n.cookieTriggerClass).css({background:n.overlayBgColor,"-webkit-transition-duration":n.overlayTransitionSpeed+"s","-moz-transition-duration":n.overlayTransitionSpeed+"s","-ms-transition-duration":n.overlayTransitionSpeed+"s","transition-duration":n.overlayTransitionSpeed+"s"})}function t(){o(r).children(".window").addClass(n.windowLocation+" "+n.windowTransitionEffect+" "+n.windowTransition).css({width:n.windowWidth,height:n.windowHeight,"box-shadow":n.windowShadowOffsetX+" "+n.windowShadowOffsetY+" "+n.windowShadowBlurRadius+" "+n.windowShadowSpreadRadius+" "+n.windowShadowColor,background:n.windowBackground,"border-radius":n.windowRadius,margin:n.windowMargin,padding:n.windowPadding,"-webkit-transition-duration":n.windowTransitionSpeed+"s","-moz-transition-duration":n.windowTransitionSpeed+"s","-ms-transition-duration":n.windowTransitionSpeed+"s","transition-duration":n.windowTransitionSpeed+"s"}),"center"===n.windowLocation&&o(r).children(".window").css({margin:"auto"})}function d(){days=n.cookieDays,CookieDate=new Date,days>0&&(CookieDate.setTime(CookieDate.getTime()+24*days*60*60*1e3),document.cookie=n.cookieName+"=true; expires="+CookieDate.toGMTString()),0===days&&(document.cookie=n.cookieName+"=true;")}var r=this;"delayed"===n.popupType&&document.cookie.indexOf(n.cookieName)<0&&(setTimeout(i,n.delayTime+200),setTimeout(a,n.delayTime)),"exit"===n.popupType&&o(document).mousemove(function(o){document.cookie.indexOf(n.cookieName)<0&&o.clientY<=n.exitTopDistance&&(i(),a())}),"scrolled"===n.popupType&&o(document).scroll(function(){var e=o(this).scrollTop();document.cookie.indexOf(n.cookieName)<0&&e>n.scrollTopDistance&&(i(),a())}),document.cookie.indexOf(n.cookieName)>=0&&(e(),l());var c="body > *";if(n.overlayBg===!0&&s(),o(r).children(".window").prepend("<div class='close closeModal'></div>"),o(r).find(".window").children(".closeModal").addClass(n.closeButton+" "+n.cookieTriggerClass),t(),n.setCookie===!0){{document.cookie.split(";").map(function(o){return o.trim().split("=")}).filter(function(o){return o[0]===n.cookieName}).pop()}o("."+n.cookieTriggerClass).on("click",function(){d()})}o(".closeModal").on("click",function(){e(),l()}),o("."+n.reopenClass).on("click",function(){i(),a()})})}}(jQuery);


// Plugin invoke
jQuery(function($) {
    $("#popup-1").slickModals({
        // Functionality
        popupType: "delayed",
        delayTime: 1000,
        exitTopDistance: 40,
        scrollTopDistance: 400,
        setCookie: true,
        cookieDays: 0,
        cookieTriggerClass: "setCookie-1",
        cookieName: "slickModal-1",

        // Overlay options
        overlayBg: true,
        overlayBgColor: "rgba(0,0,0,0.85)",
        overlayTransition: "ease",
        overlayTransitionSpeed: "0.4",

        // Background effects
        bgEffect: "scale",
        blurBgRadius: "2px",
        scaleBgValue: "0.9",

        // Window options
        windowWidth: "500px",
        windowHeight: "300px",
        windowLocation: "bottomRight",
        windowTransition: "ease",
        windowTransitionSpeed: "0.4",
        windowTransitionEffect: "zoomIn",
        windowShadowOffsetX: "0",
        windowShadowOffsetY: "0",
        windowShadowBlurRadius: "20px",
        windowShadowSpreadRadius: "0",
        windowShadowColor: "rgba(0,0,0,0.3)",
        windowBackground: "rgba(255,255,255,1)",
        windowRadius: "12px",
        windowMargin: "30px",
        windowPadding: "30px",

        // Close and reopen button
        closeButton: "icon",
        reopenClass: "openSlickModal-1",
    });
});