/* 
* @Author: anchen
* @Date:   2016-10-15 10:07:33
* @Last Modified by:   anchen
* @Last Modified time: 2016-10-15 15:59:38
*/

'use strict';
function $(dom) {
    return document.querySelector(dom);
}
;(function() {
    ajax({
        method: "GET",
        url: "",
        data: "banL",
        async: "true",
        success: function(data) {
            $("#userR").innerHTML += data[rank];
            
        }
    })
})()