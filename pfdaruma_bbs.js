"use strict";

$(function(){
    //----BBS_Page----
    //アコーディオン初期化
    $('#input1').addClass('hidden');

    //書き込みボタントグル
    $('#bbs_post').click(function(){
        $('#input1').slideToggle();
    }); 
})