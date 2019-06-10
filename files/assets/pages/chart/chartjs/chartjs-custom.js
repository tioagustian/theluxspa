"use strict";
$(document).ready(function(){
    /*Doughnut chart*/
    var ctx = document.getElementById("myChart");
    var data = {
        labels: [
            "A", "B", "C", "D "
        ],
        datasets: [{
            data: [40, 10, 40, 10],
            backgroundColor: [
                "#4fc3f7",
                "#ff8a65",
                "#f0466b",
                "#33db9e"
            ],
            borderWidth: [
                "0px",
                "0px",
                "0px",
                "0px"
            ],
            borderColor: [
                "#4fc3f7",
                "#ff8a65",
                "#f0466b",
                "#33db9e"

            ]
        }]
    };
    var myDoughnutChart = new Chart(ctx, {
        type: 'doughnut',
        data: data
    });

    /*Bar chart*/
    var data1 = {
        labels: [0, 1, 2, 3, 4, 5, 6, 7],
        datasets: [{
            label: "My First dataset",
            backgroundColor: [
                'rgba(51, 219, 158, 0.99)',
                'rgba(51, 219, 158, 0.99)',
                'rgba(51, 219, 158, 0.99)',
                'rgba(51, 219, 158, 0.99)',
                'rgba(51, 219, 158, 0.99)',
                'rgba(51, 219, 158, 0.99)',
                'rgba(51, 219, 158, 0.99)'
            ],
            hoverBackgroundColor: [
                'rgba(51, 219, 158, 0.88)',
                'rgba(51, 219, 158, 0.88)',
                'rgba(51, 219, 158, 0.88)',
                'rgba(51, 219, 158, 0.88)',
                'rgba(51, 219, 158, 0.88)',
                'rgba(51, 219, 158, 0.88)',
                'rgba(51, 219, 158, 0.88)'
            ],
            data: [65, 59, 80, 81, 56, 55, 50],
        }, {
            label: "My second dataset",
            backgroundColor: [
                'rgba(79, 195, 247, 0.93)',
                'rgba(79, 195, 247, 0.93)',
                'rgba(79, 195, 247, 0.93)',
                'rgba(79, 195, 247, 0.93)',
                'rgba(79, 195, 247, 0.93)',
                'rgba(79, 195, 247, 0.93)',
                'rgba(79, 195, 247, 0.93)'
            ],
            hoverBackgroundColor: [
                'rgba(79, 195, 247, 0.82)',
                'rgba(79, 195, 247, 0.82)',
                'rgba(79, 195, 247, 0.82)',
                'rgba(79, 195, 247, 0.82)',
                'rgba(79, 195, 247, 0.82)',
                'rgba(79, 195, 247, 0.82)',
                'rgba(79, 195, 247, 0.82)'
            ],
            data: [60, 69, 85, 91, 58, 50, 45],
        }]
    };

    var bar = document.getElementById("barChart").getContext('2d');
    var myBarChart = new Chart(bar, {
        type: 'bar',
        data: data1,
        options: {
            barValueSpacing: 20
        }
    });

    /*Radar chart*/
    var radarElem = document.getElementById("radarChart");

    var data2 = {
        labels: ["Eating", "Drinking", "Sleeping", "Designing", "Coding", "Cycling", "Running"],
        datasets: [{
            label: "My First dataset",
            backgroundColor: "rgba(51, 219, 158, 0.52)",
            borderColor: "rgba(51, 219, 158,0.88)",
            pointBackgroundColor: "rgba(51, 219, 158,0.88)",
            pointBorderColor: "rgba(51, 219, 158,0.88)",
            pointHoverBackgroundColor: "rgba(51, 219, 158,0.88)",
            pointHoverBorderColor: "rgba(51, 219, 158, 0.98)",
            data: [65, 59, 90, 81, 56, 55, 40]
        }, {
            label: "My Second dataset",
            backgroundColor: "rgba(255, 138, 101,  0.52)",
            borderColor: "rgba(255, 138, 101,  0.88)",
            pointBackgroundColor: "rgba(255, 138, 101, 0.88)",
            pointBorderColor: "rgba(255, 138, 101,  0.88)",
            pointHoverBackgroundColor: "rgba(255, 138, 101,  0.88)",
            pointHoverBorderColor: "rgba(255, 138, 101,  0.95)",
            data: [28, 48, 40, 19, 96, 27, 100]
        }]
    };
    var myRadarChart = new Chart(radarElem, {
        type: 'radar',
        data: data2,
        options: {
            scale: {
                reverse: true,
                ticks: {
                    beginAtZero: true
                }
            }
        }
    });

    /*Polar chart*/
    var polarElem = document.getElementById("polarChart");
    var data3 = {
        datasets: [{
            data: [
                11,
                16,
                7,
                3,
                14
            ],
            backgroundColor: [
                "#536dfe",
                "#f0466b",
                "#33db9e",
                "#ff8a65",
                "#4fc3f7"
            ],
            hoverBackgroundColor: [
                "#536dfe",
                "#f0466b",
                "#33db9e",
                "#ff8a65",
                "#4fc3f7"
            ],
            label: 'My dataset' // for legend
        }],
        labels: [
            "Blue",
            "Green",
            "Light Blue",
            "grey",
            "Sea Green"
        ]
    };

    new Chart(polarElem, {
        data: data3,
        type: 'polarArea',
        options: {
            elements: {
                arc: {
                    borderColor: ""
                }
            }
        }
    });
    /*Pie chart*/
    var pieElem = document.getElementById("pieChart");
    var data4 = {
        labels: [
            "Blue",
            "Orange",
            "Sea Green"
        ],
        datasets: [{
            data: [30, 30, 40],
            backgroundColor: [
                "#4fc3f7",
                "#33db9e",
                "#ff8a65"
            ],
            hoverBackgroundColor: [
                "#4fc3f7",
                "#33db9e",
                "#ff8a65"
            ]
        }]
    };

    var myPieChart = new Chart(pieElem, {
        type: 'pie',
        data: data4
    });

    //bubble chart
    var bubblechart = document.getElementById("bubblechart");
    var data = {
        datasets: [{
            label: 'First Dataset',
            data: [{
                x: 20,
                y: 15,
                r: 15
            }, {
                x: 10,
                y: 15,
                r: 10
            }, {
                x: 25,
                y: 11,
                r: 8
            }, {
                x: 15,
                y: 13,
                r: 8
            }, {
                x: 35,
                y: 18,
                r: 6
            }, {
                x: 40,
                y: 10,
                r: 10
            }],
            backgroundColor: "#ff8a65",
            hoverBackgroundColor: "ff8a65"
        }]
    };
    var myBubbleChart = new Chart(bubblechart, {
        type: 'bubble',
        data: data,
        options: {
            elements: {
                points: {
                    borderWidth: 1,
                    borderColor: 'rgb(0, 0, 0)'
                }
            }
        }
    });
// $color-color: #4fc3f7,#f0466b,#33db9e,#ff8a65,#FE8A7D,#69CEC6,#536dfe;
    //Scales chart
    var stancechart = document.getElementById("stancechart");
    var chartInstance = new Chart(stancechart, {
        type: 'line',
        data: data,
        options: {
            scales: {
                xAxes: [{
                    type: 'logarithmic',
                    position: 'bottom',
                    ticks: {
                        min: 1,
                        max: 1000
                    }
                }]
            }
        }
    });
    //Time Scale
    var timescalechart = document.getElementById("timescalechart");
    var chartInstance1 = new Chart(timescalechart, {
        type: 'line',
        data: data,
        options: {
            scales: {
                yAxes: [{
                    time: {
                        unit: 'day'
                    }
                }]
            }
        }
    })

});
