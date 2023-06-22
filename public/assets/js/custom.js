/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */

"use strict";
$(document).ready(function(){
    $("#sektor").changse(function(){
        filter();
    });
    $("#keyword").keypress(function(event){
        if(event.keyCode == 13){ // 13 adalah kode enter
            filter();
        }
    });
    var filter = function(){
        var sektor = $("#sektor").val();
        var keyword = $("#keyword").val();
        window.location.replace("/umkm?sektor="+sektor+"&keyword="+keyword);
    }
});
