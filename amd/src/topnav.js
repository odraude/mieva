/*
* @Author: odraude
* @Date:   2018-03-22 00:55:43
* @Last Modified by:   odraude
* @Last Modified time: 2018-03-22 00:56:24
*/

function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}