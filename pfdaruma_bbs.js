"use strict";

$(function(){

    const mk_open = "./img/ikonate/ikonate_on/svg/switch-on.svg";
    const mk_close = "./img/ikonate/ikonate_off/svg/switch-off.svg";

    //----BBS_Page----
    //アコーディオン初期化
    $('#input1').addClass('hidden');

    //トグル画像パスを保存する変数の初期化
    let mks ='';

    //書き込みボタントグル
    $('#bbs_post').click(function(){

        $('#input1').slideToggle();

        //画像の置き換え
        let mk_ini = $('#btnImg').attr('src');
        mks = (mk_ini == mk_open) ? mk_close : mk_open;
        $('#btnImg').attr('src', mks);
    });

})