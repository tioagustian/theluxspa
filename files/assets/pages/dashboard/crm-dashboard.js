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
    // Lead Overview chart end

    // Round Chart activity start
    var chart = new Chartist.Pie('#activity-cir-chart', {
        series: [5, 7]
    }, {
        donut: true,
        donutWidth: 12,
        showLabel: false
    });
    // Round Chart activity start
    // statistics-chart start
    var chart = AmCharts.makeChart("statistics-chart", {
        type: "serial",
        marginTop: 10,
        marginRight: 0,
        dataProvider: [{
            year: "Jan",
            value: 100
        }, {
            year: "Feb",
            value: 220
        }, {
            year: "Mar",
            value: 150
        }, {
            year: "Apr",
            value: 410
        }, {
            year: "May",
            value: 90
        }, {
            year: "Jun",
            value: 250
        }, {
            year: "July",
            value: 100
        }, {
            year: "Aug",
            value: 300
        }, {
            year: "Sep",
            value: 200
        }, {
            year: "Oct",
            value: 450
        }, {
            year: "Nov",
            value: 360
        }, {
            year: "Dec",
            value: 500
        }],
        valueAxes: [{
            axisAlpha: 0,
            dashLength: 6,
            gridAlpha: 0.1,
            position: "left"
        }],
        graphs: [{
            id: "g1",
            bullet: "round",
            bulletSize: 10,
            lineColor: "#33db9e",
            lineThickness: 3,
            negativeLineColor: "#33db9e",
            type: "smoothedLine",
            valueField: "value"
        }],
        chartCursor: {
            cursorAlpha: 0,
            valueLineEnabled: false,
            valueLineBalloonEnabled: true,
            valueLineAlpha: false,
            color: "#fff",
            cursorColor: "#333",
            fullWidth: true
        },
        categoryField: "year",
        categoryAxis: {
            gridAlpha: 0,
            axisAlpha: 0,
        }
    });
    // statistics-chart start
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
        //  this month chart
        $.plot($("#this-month"), [{
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
            color: "#ff8a65",
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
        $.plot($("#web-chart2"), [{
            data: [
                [0, 10],
                [1, 30],
                [2, 12],
                [3, 20],
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
    });
}
