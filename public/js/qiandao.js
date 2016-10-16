/* 
* @Author: anchen
* @Date:   2016-10-14 10:47:46
* @Last Modified by:   anchen
* @Last Modified time: 2016-10-15 22:29:41
*/

'use strict';
 var Isign = document.querySelector("#Isign");
 var banL = document.querySelector("#banL");
 var alertB = document.querySelector("#alertB");
 var yes = document.querySelector("#yes");

 Isign.addEventListener("click", function() {
    alertB.style.display = "block";
    ajax({
        method:"GET",
        // data: "click",
        url: "sign",
        async: true,
        success: function(data) {
            data = JSON.parse(data);
            console.log(data);
            if(data.num == 0) {

                alertB.style.display = "block";
                document.querySelector("#lineT").innerHTML = "你是今天第" + data.rank + "位签到的喔~";
                yes.src = "/img/yes.png";
                yes.alt = "Su";
            }else if (data.num == 1) {
                alertB.style.display = "block";
                document.querySelector("#signCk").src = "/img/bangding.png";
                document.querySelector("#lineO").innerHTML = "别着急哟(>_<)";
                document.querySelector("#lineT").innerHTML = "先去绑定重邮小帮手后再来试试吧~";
                yes.src = "../public/img/fanhui.png";
                yes.alt = "fal";
            }else if (data.num == 2) {
                alertB.style.display = "block";
                document.querySelector("#signCk").src = "/img/signfa.png";
                document.querySelector("#lineO").innerHTML = "明天再来吧(T_T)";
                document.querySelector("#lineT").innerHTML = "签到时间为每日7:15-7.45喔~";
                yes.src = "../public/img/fanhui.png";
                yes.alt = "fal";
            }else if (data.num == 3) {
                alertB.style.display = "block";
                document.querySelector("#signCk").src = "/img/signfa.png";
                document.querySelector("#lineO").innerHTML = "已结签到过了(T_T)";
                document.querySelector("#lineT").innerHTML = "签到时间为每日7:15-7.45喔~";
                yes.src = "../public/img/fanhui.png";
                yes.alt = "fal";
            }
        },
        error: function(data) {
            console.log(data);
        }
    })
 })

 yes.addEventListener("click", function() {
    if (yes.alt == "fal") {
        alertB.style.display = "none";
    }else {
        window.location.href = "http://www.cctalk.com/course/161330947815";
    }
 });

banL.addEventListener("click", function() {
    //window.location.href = "showList";
    alertB.style.display = "block";
    document.querySelector("#signCk").src = "/img/signCC.png";
    document.querySelector("#lineO").innerHTML = "别着急哟(>_<)";
    document.querySelector("#lineT").innerHTML = "榜单暂未出炉";
    yes.src = "/img/fanhui.png";
    yes.alt = "fal";
})