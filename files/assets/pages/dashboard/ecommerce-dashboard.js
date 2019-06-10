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

    // yearly-profit-chart start
    var chart = AmCharts.makeChart("yearly-profit-chart", {
        "type": "serial",
        "theme": "light",
        "marginRight": 0,
        "marginLeft": 40,
        "autoMarginOffset": 5,
        "dataDateFormat": "YYYY-MM-DD",
        "valueAxes": [{
            "id": "v1",
            "axisAlpha": 0,
            "position": "left",
            "ignoreAxisWidth": true
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
            "lineThickness": 4,
            "lineColor": '#4fc3f7',
            "title": "red line",
            "useLineColorForBulletBorder": true,
            "type": "smoothedLine",
            "valueField": "value",
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
            "minorGridEnabled": true
        },
        "dataProvider": [{
            "date": "2012-07-27",
            "value": 0
        }, {
            "date": "2012-07-28",
            "value": 20
        }, {
            "date": "2012-07-29",
            "value": 10
        }, {
            "date": "2012-07-30",
            "value": 30
        }, {
            "date": "2012-07-31",
            "value": 20
        }, {
            "date": "2012-08-01",
            "value": 10
        }, {
            "date": "2012-08-02",
            "value": 30
        }, {
            "date": "2012-08-03",
            "value": 50
        }, {
            "date": "2012-08-04",
            "value": 35
        }, {
            "date": "2012-08-05",
            "value": 20
        }, {
            "date": "2012-08-06",
            "value": 10
        }, {
            "date": "2012-08-07",
            "value": 20
        }, {
            "date": "2012-08-08",
            "value": 0
        }]
    });
    // yearly-profit-chart start
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
        $.plot($("#sitevisite-chart"), [{
            data: [
                [0, 20],
                [1, 10],
                [2, 20],
                [3, 10],
                [4, 27],
                [5, 15],
            ],
            color: "#4fc3f7",
            lines: {
                show: true,
                fill: false,
                lineWidth: 5
            },
            points: {
                show: true,
                radius: 0,
                fill: false,
                fillColor: '#4fc3f7'
            },
            curvedLines: {
                apply: true,
            }
        }], options_nospace);

        //  Web chart chart
        $.plot($("#web-chart1"), [{
            data: [
                [0, 10],
                [1, 20],
                [2, 12],
                [3, 30],
            ],
            color: "#fff",
            lines: {
                show: true,
                fill: true,
                lineWidth: 0,
                fillColor: 'rgba(256,256,256,0.2)'
            },
            points: {
                show: true,
                radius: 0,
                fill: true,
            },
            curvedLines: {
                apply: true,
            }
        }], options_nospace);
        $.plot($("#web-chart3"), [{
            data: [
                [0, 15],
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
                [22, 25],
            ],
            color: "#fff",
            lines: {
                show: true,
                fill: false,
                lineWidth: 2
            },
            points: {
                show: true,
                radius: 0,
                fill: true,
                fillColor: '#fff'
            },
            curvedLines: {
                apply: true,
            }
        }], options_nospace);
        //  visitors-barcharts
        $.plot($("#visitors-barchart"), [{
            data: [
                [0, 18],
                [1, 10],
                [2, 20],
                [3, 10],
                [4, 27],
                [5, 15],
                [6, 20],
                [7, 24],
                [8, 20],
                [9, 16],
                [10, 18],
                [11, 10],
                [12, 20],
                [13, 10],
                [14, 27],
            ],
            color: "#fff",
            bars: {
                show: true,
                lineWidth: 1,
                fill: true,
                fillColor: {
                    colors: [{
                        opacity: 1
                    }, {
                        opacity: 1
                    }]
                },
                barWidth: 0.5,
                align: 'center',
                horizontal: false
            },
            points: {
                show: false
            },
        }], options_nospace);
    });
}
