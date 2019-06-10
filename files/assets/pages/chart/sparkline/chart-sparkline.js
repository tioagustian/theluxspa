"use strict";
$(document).ready(function() {
    /*Line*/
    setTimeout(function(){
    $(".linechart").sparkline([5, 6, 7, 9, 9, 5, 3, 2, 2, 4, 6, 7], {
        type: 'line',
        width: '100%',
        height: '300px',
        tooltipClassname: 'chart-sparkline',
        lineColor: 'rgba(255, 82, 82, 0.92)',
        fillColor: 'rgba(255, 82, 82, 0.50)',
        spotColor: '#bdc3c7'
    });



    /*Bar*/
    $(".barchart").sparkline([5, 2, 2, 4, 9, 5, 7, 5, 2, 2, 6], {
        type: 'bar',
        barWidth: '40px',
        height: '300px',
        tooltipClassname: 'chart-sparkline',
        barColor: 'rgba(51, 219, 158, 0.80)'
    });

    /*Pie*/
    $(".piechart").sparkline([1, 1, 2, 2], {
        type: 'pie',
        width: '100%',
        height: '300px',
        sliceColors: ['#ff8a65','#4fc3f7','#33db9e','#f0466b'],
        tooltipClassname: 'chart-sparkline'
    });


    /*Mouse Speed*/
    var mrefreshinterval = 500; // update display every 500ms
    var lastmousex = -1;
    var lastmousey = -1;
    var lastmousetime;
    var mousetravel = 0;
    var mpoints = [];
    var mpoints_max = 30;
    $('body').mousemove(function(e) {
        var mousex = e.pageX;
        var mousey = e.pageY;
        if (lastmousex > -1)
            mousetravel += Math.max(Math.abs(mousex - lastmousex), Math.abs(mousey - lastmousey));
        lastmousex = mousex;
        lastmousey = mousey;
    });
    var mdraw = function() {
        var md = new Date();
        var timenow = md.getTime();
        if (lastmousetime && lastmousetime != timenow) {
            var pps = Math.round(mousetravel / (timenow - lastmousetime) * 1000);
            mpoints.push(pps);
            if (mpoints.length > mpoints_max)
                mpoints.splice(0, 1);
            mousetravel = 0;

            var mouse_wid = $('#mousespeed').parent('.card-block').parent().width();
            var a = mpoints - mouse_wid;
            $('#mousespeed').sparkline(mpoints, {
                width: '100%',
                height: '300px',
                tooltipClassname: 'chart-sparkline',
                tooltipSuffix: 'pixels per second',
                lineColor: 'rgb(240, 70, 107)',
                fillColor: 'rgba(240, 70, 107, 0.38)'
            });
        }
        lastmousetime = timenow;
        mtimer = setTimeout(mdraw, mrefreshinterval);
    }
    var mtimer = setTimeout(mdraw, mrefreshinterval); // We could use setInterval instead, but I prefer To Do it this way
    $.sparkline_display_visible();



    /*custom line chart*/
    $(".customchart").sparkline([15, 30, 27, 35, 50, 71, 60], {
        type: 'line',
        width: '100%',
        height: '300px',
        tooltipClassname: 'chart-sparkline',
        chartRangeMax: '50',
        lineColor: '#33db9e',
        fillColor: '#33db9e'
    });

    $(".customchart").sparkline([0, 5, 10, 7, 25, 35, 30], {
        type: 'line',
        width: '100%',
        height: '300px',
        composite: '!0',
        tooltipClassname: 'chart-sparkline',
        chartRangeMax: '40',
        lineColor: '#4fc3f7',
        fillColor: '#4fc3f7'
    });
    /* Tristate chart */

    $(".tristate").sparkline([1, 1, 0, 1, -1, -1, 1, -1, 0, 0, 1, 1], {
        type: 'tristate',
        height: '300',
        posBarColor: '#4fc3f7',
        negBarColor: '#33db9e',
        zeroBarColor: '#ff8a65',
        barWidth: 30
    });
    },350);
});
