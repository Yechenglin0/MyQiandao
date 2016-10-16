<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="{{URL::asset('css/qiandao.css') }}">
        <script type="text/javascript">
        window.onload=function(){function a(){var b=navigator.userAgent.toLowerCase();return(/micromessenger/.test(b))?true:false}if(!a()){document.write("请在微信浏览器打开 : )")}};
        </script>
        <script>
        !function(a,b){function c(){var b=f.getBoundingClientRect().width;b/i>540&&(b=540*i);var c=b/10;f.style.fontSize=c+"px",k.rem=a.rem=c}var d,e=a.document,f=e.documentElement,g=e.querySelector('meta[name="viewport"]'),h=e.querySelector('meta[name="flexible"]'),i=0,j=0,k=b.flexible||(b.flexible={});if(g){console.warn("将根据已有的meta标签来设置缩放比例");var l=g.getAttribute("content").match(/initial\-scale=([\d\.]+)/);l&&(j=parseFloat(l[1]),i=parseInt(1/j))}else if(h){var m=h.getAttribute("content");if(m){var n=m.match(/initial\-dpr=([\d\.]+)/),o=m.match(/maximum\-dpr=([\d\.]+)/);n&&(i=parseFloat(n[1]),j=parseFloat((1/i).toFixed(2))),o&&(i=parseFloat(o[1]),j=parseFloat((1/i).toFixed(2)))}}if(!i&&!j){var p=(a.navigator.appVersion.match(/android/gi),a.navigator.appVersion.match(/iphone/gi)),q=a.devicePixelRatio;i=p?q>=3&&(!i||i>=3)?3:q>=2&&(!i||i>=2)?2:1:1,j=1/i}if(f.setAttribute("data-dpr",i),!g)if(g=e.createElement("meta"),g.setAttribute("name","viewport"),g.setAttribute("content","initial-scale="+j+", maximum-scale="+j+", minimum-scale="+j+", user-scalable=no"),f.firstElementChild)f.firstElementChild.appendChild(g);else{var r=e.createElement("div");r.appendChild(g),e.write(r.innerHTML)}a.addEventListener("resize",function(){clearTimeout(d),d=setTimeout(c,300)},!1),a.addEventListener("pageshow",function(a){a.persisted&&(clearTimeout(d),d=setTimeout(c,300))},!1),"complete"===e.readyState?e.body.style.fontSize=12*i+"px":e.addEventListener("DOMContentLoaded",function(){e.body.style.fontSize=12*i+"px"},!1),c(),k.dpr=a.dpr=i,k.refreshRem=c,k.rem2px=function(a){var b=parseFloat(a)*this.rem;return"string"==typeof a&&a.match(/rem$/)&&(b+="px"),b},k.px2rem=function(a){var b=parseFloat(a)/this.rem;return"string"==typeof a&&a.match(/px$/)&&(b+="rem"),b}}(window,window.lib||(window.lib={}));
        </script>
    </head>
    <body>
        <img src="{{URL::asset('img/bg.png') }}" alt="bg" class="bg">
        <img src="{{URL::asset('img/light.png') }}" alt="" class="bg" id="light">
        <div id="readRead">
            <img src="{{URL::asset('img/fuli.png') }}" alt="fuli" id="fuli">
            <img src="{{URL::asset('img/logo.png') }}" alt="read">
        </div>
        <div id="alertB">
            <div id="meng"> </div>
            <div id="aBox">
                <img src="{{URL::asset('img/signbg.png')}}" alt="" id="signbg">
                <img src="{{URL::asset('img/signfa.png')}}" alt="" id="signCk">
                <img src="{{URL::asset('img/signcl.png')}}" alt="" id="signCL">
                <div id="yesCnt">
                    <div id="lineO">签到失败
                    </div>
                    <div id="lineT">对不起，签到时间为周一至周五7:00-7:15</div>
                </div>
                <div id="yesB">
                    <img src="{{URL::asset('img/fanhui.png')}}" alt="" id="yes">
                </div>
            </div>
        </div>
        <div id="coreCnt">
            <img src="{{URL::asset('img/detB.png')}}" alt="">
            <div id="coreCore">
                <img src="{{URL::asset('img/Isign.png')}}" alt="" id="Isign">
                <img src="{{URL::asset('img/banL.png')}}" alt="" id="banL">
            </div>
            <div id="youKnow">
                <div class="OL">
                    <span class="alc">活动时间:</span>
                    <p class="Od">2016年10月17日——11月17日</p>
                </div>
                <div class="OL">
                    <span class="alc">活动主题:</span>
                    <p class="Od">"四个一"英语口语提升计划之重邮早读趴</p>
                </div>
                <div class="OL">
                    <span class="alc">主办单位:</span>
                    <p class="Od">校团委，外语学院</p>
                </div>
                <div class="OL">
                    <span class="alc">承办单位:</span>
                    <p class="Od">红岩网校工作站，外语学院团总支,学生会，DE国际（重邮学生创业团队）</p>
                </div>
            </div>
        </div>
        <div id="redrock"><span> &copy; </span>红岩网校工作站</div>
        <img src="{{URL::asset('img/botttom.png')}}" alt="" id="btm">
    </body>
    <script type="text/javascript" src="{{URL::asset('js/ajax.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('js/qiandao.js')}}"></script>
    <script src="//res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
    <script>
        var TITLE = '重邮早读趴';
        var DESC = '我正在参加"重邮早读趴", 你也加入吧!';
        var LINK = '';
        var IMGURL = '';
        wx.config({
            debug: false,
            appId: '',
            timestamp: '',
            nonceStr: '',
            signature: '',
            jsApiList: [
                'onMenuShareTimeline',
                'onMenuShareAppMessage',
                'onMenuShareQQ',
                'onMenuShareWeibo',
                'onMenuShareQZone'
            ]
        });
        wx.ready(function () {
            wx.onMenuShareTimeline({
                title: TITLE,
                link: LINK,
                imgUrl: IMGURL,
                success: function () {
                },
                cancel: function () {
                }
            });
            wx.onMenuShareAppMessage({
                title: TITLE,
                desc: DESC,
                link: LINK,
                imgUrl: IMGURL,
                type: '',
                success: function () {
                },
                cancel: function () {
                }
            });
            wx.onMenuShareQQ({
                title: TITLE,
                desc: DESC,
                link: LINK,
                imgUrl: IMGURL,
                success: function () {
                },
                cancel: function () {
                }
            });
            wx.onMenuShareWeibo({
                title: TITLE,
                desc: DESC,
                link: LINK,
                imgUrl: IMGURL,
                success: function () {
                },
                cancel: function () {
                }
            });
            wx.onMenuShareQZone({
                title: TITLE,
                desc: DESC,
                link: LINK,
                imgUrl: IMGURL,
                success: function () {
                },
                cancel: function () {
                }
            });
        });
        wx.error(function(res){
        });
    </script>
</html>