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
    $(".card-scroll").slimScroll({
        setTop: "1px",
        height: "290px",
        railOpacity: 0.5,
        size: "4px"
    });
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
                minBorderMargin: 1,
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
        $.plot($("#web-chart3"), [{
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

        $.plot($("#stat-fot-1"), [{
            data: [
                [0, 2],
                [1, 20],
                [2, 5],
                [3, 30],
            ],
            color: "#fff",
            lines: {
                show: true,
                fill: false,
                lineWidth: 2,
                fillColor: 'rgba(256,256,256,0.2)'
            },
            points: {
                show: true,
                radius: 0,
                fill: true,
            },
            curvedLines: {
                apply: false,
            }
        }], options);
        $.plot($("#stat-fot-2"), [{
            data: [
                [0, 10],
                [1, 2],
                [2, 20],
                [3, 3],
            ],
            color: "#fff",
            lines: {
                show: true,
                fill: false,
                lineWidth: 2,
                fillColor: 'rgba(256,256,256,0.2)'
            },
            points: {
                show: true,
                radius: 0,
                fill: true,
            },
            curvedLines: {
                apply: false,
            }
        }], options);
        $.plot($("#stat-fot-3"), [{
            data: [
                [0, 2],
                [1, 20],
                [2, 5],
                [3, 30],
            ],
            color: "#fff",
            lines: {
                show: true,
                fill: false,
                lineWidth: 2,
                fillColor: 'rgba(256,256,256,0.2)'
            },
            points: {
                show: true,
                radius: 0,
                fill: true,
            },
            curvedLines: {
                apply: false,
            }
        }], options);
        $.plot($("#stat-fot-4"), [{
            data: [
                [0, 10],
                [1, 2],
                [2, 20],
                [3, 3],
            ],
            color: "#fff",
            lines: {
                show: true,
                fill: false,
                lineWidth: 2,
                fillColor: 'rgba(256,256,256,0.2)'
            },
            points: {
                show: true,
                radius: 0,
                fill: true,
            },
            curvedLines: {
                apply: false,
            }
        }], options);
    });
}
