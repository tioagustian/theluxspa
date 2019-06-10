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

    // Lead Overview chart start
    // Lead Overview chart end
    // sales-analytics-chart start
        var charts = AmCharts.makeChart("lead-overview-chart", {
            "type": "serial",
            "theme": "light",
            "marginTop": 0,
            "marginRight": 0,
            "dataProvider": [{
                "year": "1950",
                "value": -0.307
            }, {
                "year": "1951",
                "value": -0.168
            }, {
                "year": "1952",
                "value": -0.073
            }, {
                "year": "1953",
                "value": -0.027
            }, {
                "year": "1954",
                "value": -0.251
            }, {
                "year": "1955",
                "value": -0.281
            }, {
                "year": "1956",
                "value": -0.348
            }, {
                "year": "1957",
                "value": -0.074
            }, {
                "year": "1958",
                "value": -0.011
            }, {
                "year": "1959",
                "value": -0.074
            }, {
                "year": "1960",
                "value": -0.124
            }, {
                "year": "1961",
                "value": -0.024
            }, {
                "year": "1962",
                "value": -0.022
            }, {
                "year": "1963",
                "value": 0
            }, {
                "year": "1964",
                "value": -0.296
            }, {
                "year": "1965",
                "value": -0.217
            }, {
                "year": "1966",
                "value": -0.147
            }, {
                "year": "1967",
                "value": -0.15
            }, {
                "year": "1968",
                "value": -0.16
            }, {
                "year": "1969",
                "value": -0.011
            }, {
                "year": "1970",
                "value": -0.068
            }, {
                "year": "1971",
                "value": -0.19
            }, {
                "year": "1972",
                "value": -0.056
            }, {
                "year": "1973",
                "value": 0.077
            }, {
                "year": "1974",
                "value": -0.213
            }, {
                "year": "1975",
                "value": -0.17
            }, {
                "year": "1976",
                "value": -0.254
            }, {
                "year": "1977",
                "value": 0.019
            }, {
                "year": "1978",
                "value": -0.063
            }, {
                "year": "1979",
                "value": 0.05
            }, {
                "year": "1980",
                "value": 0.077
            }, {
                "year": "1981",
                "value": 0.12
            }, {
                "year": "1982",
                "value": 0.011
            }, {
                "year": "1983",
                "value": 0.177
            }, {
                "year": "1984",
                "value": -0.021
            }, {
                "year": "1985",
                "value": -0.037
            }, {
                "year": "1986",
                "value": 0.03
            }, {
                "year": "1987",
                "value": 0.179
            }, {
                "year": "1988",
                "value": 0.18
            }, {
                "year": "1989",
                "value": 0.104
            }, {
                "year": "1990",
                "value": 0.255
            }, {
                "year": "1991",
                "value": 0.21
            }, {
                "year": "1992",
                "value": 0.065
            }, {
                "year": "1993",
                "value": 0.11
            }, {
                "year": "1994",
                "value": 0.172
            }, {
                "year": "1995",
                "value": 0.269
            }, {
                "year": "1996",
                "value": 0.141
            }, {
                "year": "1997",
                "value": 0.353
            }, {
                "year": "1998",
                "value": 0.548
            }, {
                "year": "1999",
                "value": 0.298
            }, {
                "year": "2000",
                "value": 0.267
            }, {
                "year": "2001",
                "value": 0.411
            }, {
                "year": "2002",
                "value": 0.462
            }, {
                "year": "2003",
                "value": 0.47
            }, {
                "year": "2004",
                "value": 0.445
            }, {
                "year": "2005",
                "value": 0.47
            }],
            "valueAxes": [{
                "axisAlpha": 0,
                "position": "left"
            }],
            "graphs": [{
                "id": "g1",
                "balloonText": "[[category]]<br><b><span style='font-size:14px;'>[[value]]</span></b>",
                "bullet": "round",
                "bulletSize": 0,
                "lineColor": "#33db9e",
                "lineThickness": 3,
                "negativeLineColor": "#33db9e",
                "type": "smoothedLine",
                "valueField": "value"
            }],
            "chartScrollbar": {
                "graph": "g1",
                "gridAlpha": 0,
                "color": "#888888",
                "scrollbarHeight": 40,
                "backgroundAlpha": 0,
                "selectedBackgroundAlpha": 0.1,
                "selectedBackgroundColor": "#888888",
                "graphFillAlpha": 0,
                "autoGridCount": true,
                "selectedGraphFillAlpha": 0,
                "graphLineAlpha": 0.2,
                "graphLineColor": "#c2c2c2",
                "selectedGraphLineColor": "#888888",
                "selectedGraphLineAlpha": 1

            },
            "chartCursor": {
                "categoryBalloonDateFormat": "YYYY",
                "cursorAlpha": 0,
                "valueLineEnabled": true,
                "valueLineBalloonEnabled": true,
                "valueLineAlpha": 0.5,
                "fullWidth": true
            },
            "dataDateFormat": "YYYY",
            "categoryField": "year",
            "categoryAxis": {
                "minPeriod": "YYYY",
                "parseDates": true,
                "minorGridAlpha": 0.1,
                "minorGridEnabled": true
            },
            "export": {
                "enabled": true
            }
        });
        setTimeout(function() {
            charts.zoomToIndexes(Math.round(charts.dataProvider.length * 0.4), Math.round(charts.dataProvider.length * 0.509));
        }, 800);
        // sales-analytics-chart end
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
    // data-use-chart end

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

    });
}
