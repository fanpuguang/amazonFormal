/***********************************************

 * Scroll To Top Control script- � Dynamic Drive DHTML code library (www.dynamicdrive.com)

 * Modified by www.MyBloggerTricks.com

 * Modified by www.scrolltotop.com

 * This notice MUST stay intact for legal use

 * Visit Project Page at http://www.dynamicdrive.com for full source code

 ***********************************************/


var scrolltotop = {

    //startline: Integer. Number of pixels from top of doc scrollbar is scrolled before showing control

    //scrollto: Keyword (Integer, or "Scroll_to_Element_ID"). How far to scroll document up when control is clicked on (0=top).

    setting: {startline: 100, scrollto: 0, scrollduration: 1000, fadeduration: [500, 100]},

    controlHTML: '<img>', //HTML for control, which is auto wrapped in DIV w/ ID="topcontrol"

    controlattrs: {offsetx: 5, offsety: 5}, //offset of control relative to right/ bottom of window corner

    anchorkeyword: '#top', //Enter href value of HTML anchors on the page that should also act as "Scroll Up" links

    state: {isvisible: false, shouldvisible: false},


    scrollup: function () {

        if (!this.cssfixedsupport) //if control is positioned using JavaScript

            this.$control.css({opacity: 0}) //hide control immediately after clicking it

        var dest = isNaN(this.setting.scrollto) ? this.setting.scrollto : parseInt(this.setting.scrollto)

        if (typeof dest == "string" && jQuery('#' + dest).length == 1) //check element set by string exists

            dest = jQuery('#' + dest).offset().top

        else

            dest = 0

        this.$body.animate({scrollTop: dest}, this.setting.scrollduration);

    },


    keepfixed: function () {

        var $window = jQuery(window)

        var controlx = $window.scrollLeft() + $window.width() - this.$control.width() - this.controlattrs.offsetx

        var controly = $window.scrollTop() + $window.height() - this.$control.height() - this.controlattrs.offsety

        this.$control.css({left: controlx + 'px', top: controly + 'px'})

    },


    togglecontrol: function () {


        var scrolltop = jQuery(window).scrollTop()

        if (!this.cssfixedsupport)

            this.keepfixed()

        this.state.shouldvisible = (scrolltop >= this.setting.startline) ? true : false

        if (this.state.shouldvisible && !this.state.isvisible) {

            this.$control.stop().animate({opacity: 1}, this.setting.fadeduration[0])

            this.state.isvisible = true

        }

        else if (this.state.shouldvisible == false && this.state.isvisible) {

            this.$control.stop().animate({opacity: 0}, this.setting.fadeduration[1])

            this.state.isvisible = false

        }
    },

    init: function () {
        jQuery(document).ready(function ($) {
            var mainobj = scrolltotop
            var iebrws = document.all
            mainobj.cssfixedsupport = !iebrws || iebrws && document.compatMode == "CSS1Compat" && window.XMLHttpRequest //not IE or IE7+ browsers in standards mode
            mainobj.$body = (window.opera) ? (document.compatMode == "CSS1Compat" ? $('html') : $('body')) : $('html,body')
            mainobj.$control = $('<div id="topcontrol">' + mainobj.controlHTML + '</div>')
                .css({
                    position: mainobj.cssfixedsupport ? 'fixed' : 'absolute',
                    bottom: mainobj.controlattrs.offsety,
                    right: mainobj.controlattrs.offsetx,
                    opacity: 0,
                    cursor: 'pointer'
                })
                .attr({title: 'Scroll to Top'})
                .click(function () {
                    mainobj.scrollup();
                    return false
                })
                .appendTo('body')
            if (document.all && !window.XMLHttpRequest && mainobj.$control.text() != '') //loose check for IE6 and below, plus whether control contains any text
                mainobj.$control.css({width: mainobj.$control.width()}) //IE6- seems to require an explicit width on a DIV containing text
            mainobj.togglecontrol()

            $('a[href="' + mainobj.anchorkeyword + '"]').click(function () {
                mainobj.scrollup()
                return false
            })
            $(window).bind('scroll resize', function (e) {
                mainobj.togglecontrol()
            })
        })
    }
}
scrolltotop.init();

Date.prototype.format = function (fmt) { //author: meizz
    var o = {
        "M+": this.getMonth() + 1,                 //月份
        "d+": this.getDate(),                    //日
        "h+": this.getHours(),                   //小时
        "m+": this.getMinutes(),                 //分
        "s+": this.getSeconds(),                 //秒
        "q+": Math.floor((this.getMonth() + 3) / 3), //季度
        "S": this.getMilliseconds()             //毫秒
    };
    if (/(y+)/.test(fmt))
        fmt = fmt.replace(RegExp.$1, (this.getFullYear() + "").substr(4 - RegExp.$1.length));
    for (var k in o)
        if (new RegExp("(" + k + ")").test(fmt))
            fmt = fmt.replace(RegExp.$1, (RegExp.$1.length == 1) ? (o[k]) : (("00" + o[k]).substr(("" + o[k]).length)));
    return fmt;
}

function calcTime(date, offset) {
    // create Date object for current location
    //var d = new Date();
    // convert to msec
    // add local time zone offset
    // get UTC time in msec
    var utc = date.getTime() + (date.getTimezoneOffset() * 60000);
    // create new Date object for different city
    // using supplied offset
    //offset = (offset>0)?offset:offset--;
    var nd = new Date(utc + (3600000 * offset));
    // return time as a string
    return nd;
}

var intval;

function refresh() {

    var date = new Date();
    $('#tbeijing').html(calcTime(date, 8).format('MM-dd hh:mm:ss'));
    $('#teastus').html(calcTime(date, -5).format('MM-dd hh:mm:ss'));
    $('#twestus').html(calcTime(date, -8).format('MM-dd hh:mm:ss'));
    $('#tjapan').html(calcTime(date, 9).format('MM-dd hh:mm:ss'));
    $('#tenglish').html(calcTime(date, 0).format('MM-dd hh:mm:ss'));
    $('#tgermany').html(calcTime(date, 1).format('MM-dd hh:mm:ss'));
    $('#tfrance').html(calcTime(date, 1).format('MM-dd hh:mm:ss'));
    $('#tspain').html(calcTime(date, 1).format('MM-dd hh:mm:ss'));
    $('#titaly').html(calcTime(date, 1).format('MM-dd hh:mm:ss'));
    clearInterval(intval)
    intval = window.setTimeout("refresh()", 1000);
}

function setHomepage() {
    if (document.all) {
        document.body.style.behavior = 'url(#default#homepage)';
        document.body.setHomePage(window.location.href);
    } else if (window.sidebar) {
        if (window.netscape) {
            try {
                netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect");
            } catch (e) {
                alert("该操作被浏览器拒绝，如果想启用该功能，请在地址栏内输入 about:config,然后将项 signed.applets.codebase_principal_support 值该为true");
            }
        }
        var prefs = Components.classes['@mozilla.org/preferences-service;1'].getService(Components.interfaces.nsIPrefBranch);
        prefs.setCharPref('browser.startup.homepage', window.location.href);
    } else {
        alert('您的浏览器不支持自动自动设置首页, 请使用浏览器菜单手动设置!');
    }
}

$(function () {

    refresh()

});