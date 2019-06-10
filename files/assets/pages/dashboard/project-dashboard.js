'use strict';
$(document).ready(function() {
    floatchart()
    $(window).on('resize', function() {
        floatchart();
    });
    $('#mobile-collapse').on('click', function() {
        setTimeout(function() {
            floatchart();
        }, 700);
    });

    // revenue-chart start
    var chart = AmCharts.makeChart("revenue-chart", {
        "type": "serial",
        "theme": "light",
        "marginTop": 10,
        "marginRight": 0,
        "valueAxes": [{
            "id": "v1",
            "position": "left",
            "axisAlpha": 0,
            "lineAlpha": 0,
            "autoGridCount": false,
            "labelFunction": function(value) {
                return +Math.round(value) + "00";
            }
        }],
        "graphs": [{
            "id": "g1",
            "valueAxis": "v1",
            "lineColor": "#4fc3f7",
            "fillColors": "#4fc3f7",
            "fillAlphas": 1,
            "type": "column",
            "title": "Last Week ",
            "valueField": "sales2",
            "columnWidth": 0.5,
            "legendValueText": "$[[value]]M",
            "balloonText": "[[title]]<br /><b style='font-size: 130%'>$[[value]]M</b>"
        }, {
            "id": "g2",
            "valueAxis": "v1",
            "lineColor": "#f0466b",
            "fillColors": "#f0466b",
            "fillAlphas": 1,
            "type": "column",
            "title": "Market Place ",
            "valueField": "sales1",
            "columnWidth": 0.5,
            "legendValueText": "$[[value]]M",
            "balloonText": "[[title]]<br /><b style='font-size: 130%'>$[[value]]M</b>"
        }, {
            "id": "g3",
            "valueAxis": "v1",
            "lineColor": "#ff8a65",
            "fillColors": "#ff8a65",
            "fillAlphas": 1,
            "type": "column",
            "title": "Last Month",
            "valueField": "sales3",
            "columnWidth": 0.5,
            "legendValueText": "$[[value]]M",
            "balloonText": "[[title]]<br /><b style='font-size: 130%'>$[[value]]M</b>"
        }],
        "chartCursor": {
            "pan": true,
            "valueLineEnabled": true,
            "valueLineBalloonEnabled": true,
            "cursorAlpha": 0,
            "valueLineAlpha": 0.2
        },
        "categoryField": "date",
        "categoryAxis": {
            "dashLength": 1,
            "gridAlpha": 0,
            "axisAlpha": 0,
            "lineAlpha": 0,
            "minorGridEnabled": true
        },
        "legend": {
            "useGraphSettings": true,
            "position": "top"
        },
        "balloon": {
            "borderThickness": 1,
            "shadowAlpha": 0
        },
        "dataProvider": [{
            "date": "Mon",
            "sales1": 3,
            "sales2": 4,
            "sales3": 2
        }, {
            "date": "Tue",
            "sales1": 5,
            "sales2": 8,
            "sales3": 6
        }, {
            "date": "Wed",
            "sales1": 4,
            "sales2": 8,
            "sales3": 5
        }, {
            "date": "Thu",
            "sales1": 5,
            "sales2": 7,
            "sales3": 2
        }, {
            "date": "Fri",
            "sales1": 9,
            "sales2": 5,
            "sales3": 7
        }, {
            "date": "Sat",
            "sales1": 5,
            "sales2": 8,
            "sales3": 3
        }, {
            "date": "Sun",
            "sales1": 4,
            "sales2": 7,
            "sales3": 5
        }]
    });
    // revenue-chart end

    // data-use-chart start
    var chart = AmCharts.makeChart("data-use-chart", {
        "type": "serial",
        "theme": "light",
        "marginRight": 0,
        "marginLeft": 0,
        "autoMarginOffset": 0,
        "dataDateFormat": "YYYY-MM-DD",
        "valueAxes": [{
            "id": "v1",
            "gridAlpha": 0,
            "lineAlpha": 0,
            "axisAlpha": 0,
            "position": "left",
            "ignoreAxisWidth": true,
            "fontSize": 0,
        }],
        "balloon": {
            "borderThickness": 1,
            "shadowAlpha": 0
        },
        "graphs": [{
            "id": "g1",
            "balloon": {
                "drop": true,
                "adjustBorderColor": false,
                "color": "#ffffff",
                "type": "smoothedLine"
            },
            "fillAlphas": 0.2,
            "hideBulletsCount": 50,
            "lineThickness": 0,
            "lineColor": '#ff8a65',
            "title": "red line",
            "useLineColorForBulletBorder": true,
            "type": "smoothedLine",
            "valueField": "value",
            "balloonText": "<span style='font-size:18px;'>[[value]]</span>"
        }, {
            "id": "g2",
            "balloon": {
                "drop": true,
                "adjustBorderColor": false,
                "color": "#ffffff",
                "type": "smoothedLine"
            },
            "fillAlphas": 0.3,
            "hideBulletsCount": 50,
            "lineThickness": 0,
            "lineColor": '#ff8a65',
            "title": "red line",
            "useLineColorForBulletBorder": true,
            "type": "smoothedLine",
            "valueField": "value1",
            "balloonText": "<span style='font-size:18px;'>[[value]]</span>"
        }],
        "chartCursor": {
            "valueLineEnabled": true,
            "valueLineBalloonEnabled": true,
            "cursorAlpha": 0,
            "zoomable": false,
            "valueZoomable": true,
            "valueLineAlpha": 0.5
        },
        "categoryField": "date",
        "categoryAxis": {
            "parseDates": true,
            "dashLength": 1,
            "gridAlpha": 0,
            "lineAlpha": 0,
            "axisAlpha": 0,
            "fontSize": 0,
            "inside": true,
        },
        "dataProvider": [{
            "date": "2012-07-27",
            "value1": 0,
            "value": 0,
        }, {
            "date": "2012-07-28",
            "value1": 10,
            "value": 20
        }, {
            "date": "2012-07-29",
            "value1": 20,
            "value": 10
        }, {
            "date": "2012-07-30",
            "value1": 10,
            "value": 30
        }, {
            "date": "2012-07-31",
            "value1": 20,
            "value": 10
        }, {
            "date": "2012-08-01",
            "value1": 15,
            "value": 20
        }, {
            "date": "2012-08-02",
            "value1": 20,
            "value": 30
        }, {
            "date": "2012-08-03",
            "value1": 50,
            "value": 50
        }, {
            "date": "2012-08-04",
            "value1": 25,
            "value": 35
        }, {
            "date": "2012-08-05",
            "value1": 30,
            "value": 20
        }, {
            "date": "2012-08-06",
            "value1": 10,
            "value": 30
        }, {
            "date": "2012-08-07",
            "value1": 20,
            "value": 10
        }, {
            "date": "2012-08-08",
            "value1": 0,
            "value": 0
        }]
    });
    // data-use-chart start

});

function floatchart() {
    $(function() {
        //flot options
        var options = {
            legend: {
                show: false
            },
            series: {
                label: "",
                curvedLines: {
                    active: true,
                    nrSplinePoints: 20
                },
            },
            tooltip: {
                show: true,
                content: "x : %x | y : %y"
            },
            grid: {
                hoverable: true,
                borderWidth: 0,
                labelMargin: 0,
                axisMargin: 0,
                minBorderMargin: 0,
            },
            yaxis: {
                min: 0,
                max: 30,
                color: 'transparent',
                font: {
                    size: 0,
                }
            },
            xaxis: {
                color: 'transparent',
                font: {
                    size: 0,
                }
            }
        };
        var options_nospace = {
            legend: {
                show: false
            },
            series: {
                label: "",
                curvedLines: {
                    active: true,
                    nrSplinePoints: 20
                },
            },
            tooltip: {
                show: true,
                content: "x : %x | y : %y"
            },
            grid: {
                hoverable: true,
                borderWidth: 0,
                labelMargin: 0,
                axisMargin: 0,
                minBorderMargin: 0,
            },
            yaxis: {
                min: 0,
                max: 30,
                color: 'transparent',
                font: {
                    size: 0,
                }
            },
            xaxis: {
                color: 'transparent',
                font: {
                    size: 0,
                }
            }
        };
        $.plot($("#activity-cart"), [{
            data: [
                [0, 0],
                [1, 10],
                [2, 20],
                [3, 10],
                [4, 27],
                [5, 15],
                [6, 20],
                [7, 10],
                [8, 20],
                [9, 16],
                [10, 22],
                [11, 10],
                [12, 20],
                [13, 10],
                [14, 27],
                [15, 20],
                [16, 10],
                [17, 15],
                [18, 12],
                [19, 27],
                [20, 20],
                [21, 15],
                [22, 0],
            ],
            color: "#fff",
            lines: {
                show: true,
                fill: true,
                lineWidth: 0
            },
            points: {
                show: true,
                radius: 0,
                fill: true,
                fillColor: '#fff'
            },
            curvedLines: {
                apply: false,
            }
        }], options_nospace);

    });
}
