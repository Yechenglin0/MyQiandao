<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="../public/css/banL.css">
        <script>
        !function(a,b){function c(){var b=f.getBoundingClientRect().width;b/i>540&&(b=540*i);var c=b/10;f.style.fontSize=c+"px",k.rem=a.rem=c}var d,e=a.document,f=e.documentElement,g=e.querySelector('meta[name="viewport"]'),h=e.querySelector('meta[name="flexible"]'),i=0,j=0,k=b.flexible||(b.flexible={});if(g){console.warn("将根据已有的meta标签来设置缩放比例");var l=g.getAttribute("content").match(/initial\-scale=([\d\.]+)/);l&&(j=parseFloat(l[1]),i=parseInt(1/j))}else if(h){var m=h.getAttribute("content");if(m){var n=m.match(/initial\-dpr=([\d\.]+)/),o=m.match(/maximum\-dpr=([\d\.]+)/);n&&(i=parseFloat(n[1]),j=parseFloat((1/i).toFixed(2))),o&&(i=parseFloat(o[1]),j=parseFloat((1/i).toFixed(2)))}}if(!i&&!j){var p=(a.navigator.appVersion.match(/android/gi),a.navigator.appVersion.match(/iphone/gi)),q=a.devicePixelRatio;i=p?q>=3&&(!i||i>=3)?3:q>=2&&(!i||i>=2)?2:1:1,j=1/i}if(f.setAttribute("data-dpr",i),!g)if(g=e.createElement("meta"),g.setAttribute("name","viewport"),g.setAttribute("content","initial-scale="+j+", maximum-scale="+j+", minimum-scale="+j+", user-scalable=no"),f.firstElementChild)f.firstElementChild.appendChild(g);else{var r=e.createElement("div");r.appendChild(g),e.write(r.innerHTML)}a.addEventListener("resize",function(){clearTimeout(d),d=setTimeout(c,300)},!1),a.addEventListener("pageshow",function(a){a.persisted&&(clearTimeout(d),d=setTimeout(c,300))},!1),"complete"===e.readyState?e.body.style.fontSize=12*i+"px":e.addEventListener("DOMContentLoaded",function(){e.body.style.fontSize=12*i+"px"},!1),c(),k.dpr=a.dpr=i,k.refreshRem=c,k.rem2px=function(a){var b=parseFloat(a)*this.rem;return"string"==typeof a&&a.match(/rem$/)&&(b+="px"),b},k.px2rem=function(a){var b=parseFloat(a)/this.rem;return"string"==typeof a&&a.match(/px$/)&&(b+="rem"),b}}(window,window.lib||(window.lib={}));
        </script>
    </head>
    <body>
        <img src="../public/img/banLbg.png" alt="bg" id="bg">
        <img src="../public/img/light.png" alt="" class="bg" id="light">
        <img src="../public/img/moreY.png" alt="" id="moreY">
        <div id="banLcore">
            <img src="../public/img/banLBbg.png" alt="" id="bLbg">
            <img src="../public/img/banLlogo.png" alt="" id="banner">
            <img src="../public/img/bannerD.png" alt="" id="bannerD">
            <img src="../public/img/top.png" alt="" id="top">
            <img src="../public/img/book.png" alt="" id="book">
            <div id="userR">本人排名： {{$myRank}}</div>
            <div id="banLTen">
                <div id="allP">
                    <img src="../public/img/allP.png" alt="">
                </div>
                <div id="first" class="deep">
                    <span class="rank">
                        <img src="../public/img/rewared.png" alt="" id="reO">
                    </span>
                    <span class="userName">{{$list[0]->username}}</span>
                    <span class="signDay">{{$list[0]->days}}</span>
                </div>
                <div class="rankLi low">
                    <span class="rank">02</span>
                    <span class="userName">{{$list[1]->username}}</span>
                    <span class="signDay">{{$list[1]->days}}</span>
                </div>
                <div class="rankLi deep">
                    <span class="rank">03</span>
                    <span class="userName">{{$list[2]->username}}</span>
                    <span class="signDay">{{$list[2]->days}}</span>
                </div>
                <div class="rankLi low">
                    <span class="rank">04</span>
                    <span class="userName">{{$list[3]->username}}</span>
                    <span class="signDay">{{$list[3]->days}}</span>
                </div>
                <div class="rankLi deep">
                    <span class="rank">05</span>
                    <span class="userName">{{$list[4]->username}}</span>
                    <span class="signDay">{{$list[4]->days}}</span>
                </div>
                <div class="rankLi low">
                    <span class="rank">06</span>
                    <span class="userName">{{$list[5]->username}}</span>
                    <span class="signDay">{{$list[5]->days}}</span>
                </div>
                <div class="rankLi deep">
                    <span class="rank">07</span>
                    <span class="userName">{{$list[6]->username}}</span>
                    <span class="signDay">{{$list[6]->days}}</span>
                </div>
                <div class="rankLi low">
                    <span class="rank">08</span>
                    <span class="userName">{{$list[7]->username}}</span>
                    <span class="signDay">{{$list[7]->days}}</span>
                </div>
                <div class="rankLi deep">
                    <span class="rank">09</span>
                    <span class="userName">{{$list[8]->username}}</span>
                    <span class="signDay">{{$list[8]->days}}</span>
                </div>
                <div class="rankLi low">
                    <span class="rank">10</span>
                    <span class="userName">{{$list[9]->username}}</span>
                    <span class="signDay">{{$list[9]->days}}</span>
                </div>
            </div>
        </div>
        <div id="redrock"><span> &copy; </span>红岩网校工作站</div>
    </body>
    <script type="text/javascript" src="../public/js/ajax.js"></script>
    <script type="text/javascript" src="../public/js/banL.js"></script>
</html>