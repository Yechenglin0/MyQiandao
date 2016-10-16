/* 
* @Author: anchen
* @Date:   2016-10-08 14:59:34
* @Last Modified by:   anchen
* @Last Modified time: 2016-10-08 21:47:22
*/

'use strict';
var user = {
    name: "zxy",
    sex: "man",
    time:0
};//用户信息用微信的openid获取
function ajax(opts){
     var defaults = {    
             method: 'GET',
                url: '',
               data: '',        
              async: true,
              cache: true,
        contentType: 'application/x-www-form-urlencoded',
            success: function (){},
              error: function (){}
         };    
  
     for(var key in opts){
         defaults[key] = opts[key];
     }
 
     if(typeof defaults.data === 'object'){    //处理 data
         var str = '';
         for(var key in defaults.data){
             str += key + '=' + defaults.data[key] + '&';
         }
         defaults.data = str.substring(0, str.length - 1);
     }
 
     defaults.method = defaults.method.toUpperCase();    //处理 method
 
     defaults.cache = defaults.cache ? '' : '&' + new Date().getTime() ;//处理 cache
 
     if(defaults.method === 'GET' && (defaults.data || defaults.cache))    defaults.url += '?' + defaults.data + defaults.cache;    //处理 url    
     


     //1.创建ajax对象
     var oXhr = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
     //2.和服务器建立联系，告诉服务器你要取什么文件
     oXhr.open(defaults.method, defaults.url, defaults.async);
     //3.发送请求
     if(defaults.method === 'GET')    
         oXhr.send(null);
     else{
         oXhr.setRequestHeader("Content-type", defaults.contentType);
         oXhr.send(defaults.data);
     }    
     //4.等待服务器回应
     oXhr.onreadystatechange = function (){
         if(oXhr.readyState === 4){
             if(oXhr.status === 200)
                 {console.log("OK");
                 defaults.success.call(oXhr, oXhr.responseText);}
             else {
                 defaults.error();
             }
         }
     };
 }

 //点击签到
var sign = document.querySelector("#sign");
sign.addEventListener('click', function() {

    if(/*Ntime.hour == 7 && 5<= Ntime.min <=30*/1){
        ajax({

            method:"GET",
            url: "sign",
            async: true,
            success: function (data){
                // alert("签到成功");
                console.log(data);
                // window.location.href = "https://www.baidu.com";
            }
        }); 
    }
});

//榜单显示
var list = document.querySelector("#list");
var listD = document.querySelector("#listDet");
list.addEventListener('click', function () {
    var url =  window.location.href;
    console.log(url);
    alert("显示榜单");
    window.location.href = url +'showList';            //总之这里跳转到 server.php/showList这里 js这里应该有不对的地方  ycl
    listD.style.display = "block";
    // ajax({
    //     method: "GET",
    //     url:  "{{url('/').'/showlist'}}",
    //     data: "fuck",
    //     async: true,
    //     success: function(data) {
    //         // console.log(data);
    //         // data = JSON.parse(data);
    //         // listD.style.height = data.num * 0.5 + "rem";
    //         // for(var i = 0; i < data.num; i++)
    //         // {
    //         //     (function(j){
    //         //         var Niv = document.createElement('div');
    //         //         Niv.innerHTML =  data.use[j];
    //         //         Niv.className = "useL";
    //         //         listD.appendChild(Niv);
    //         //     })(i);
    //         // }

    //     },
    //     error: function() {
    //         console.log("fail");
    //     }
    // })
})