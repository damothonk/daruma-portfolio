"use strict";

$(function(){
    
    //--Top_Page--
    //navのトグル
    $("#menuBtn").click(function(){
        $("#menu").animate({
            width: "toggle"
        });
    });


    //--Profile_Page--
    //Graph_Sec_rader
    let ctx = $('#profile_chart');

    const data = {
        labels: [
            'HTML',
            'CSS',
            'JavaScript',
            'PHP',
            'MySQL',
            'Linux',
        ],
        datasets: [{
            label: 'My Skills',
            data: [30, 30, 20, 20, 10, 10],
            pointStyle: 'triangle',
            fill: true,
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            borderColor: 'rgb(54, 162, 235)',
            pointBorderColor: 'rgb(40, 72, 124)',
            borderWidth: 4,
            pointHoverBorderWidth: 6,
        }, {
            label: 'Future',
            data: [40, 40, 30, 30, 30, 30],
            pointStyle: 'rect',
            fill: true,
            backgroundColor: 'rgba(255, 188, 0, 0.2)',
            borderColor: 'rgb(255, 188, 0)',
            pointBorderColor: 'rgb(236, 136, 16)',
            borderWidth: 4,
            pointHoverBorderWidth: 6,
        }]
    };

    const config = {
        type: 'radar',
        data: data,
        //グラフ設定
        options: {
            scales: {
                r: {
                    //最大、最小
                    min: 0,
                    max: 50,
                    //目盛り
                    ticks: {
                        stepSize: 10,
                        color: 'red',
                        font: {
                            size: 14,
                            weight: 'bolder',
                        }, 
                    },
                    //グリッド
                    grid: {
                        color: 'snow',
                        lineWidth: 2,
                    },
                    //アングルライン
                    angleLines: {
                        color: 'red',
                        lineWidth: 2,                     
                    },
                    //座標ラベル
                    pointLabels: {
                        color: 'snow',
                        font: {
                            size: 14,
                        },                 
                    },
                },
            },
            plugins: {
                //凡例
                legend: {
                    labels: {
                        // This more specific font property overrides the global property
                        font: {
                            size: 16,
                        },
                        color: 'snow',
                        usePointStyle: true,
                    },
                },
            },                    
        },
    };

    let radarChart = new Chart(ctx,
        config
    );


    //----BBS_Page----
    //アコーディオン初期化
    $('#input1').addClass('hidden');

    //書き込みボタントグル
    $('#bbs_post').click(function(){
        $('#input1').slideToggle();
    });    

    
    console.log(data);
});

