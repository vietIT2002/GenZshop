(function(window, document, $, undefined) {
        "use strict";
        $(function() { 
            if ($('#chartjs_bar').length) {
                var ctx = document.getElementById("chartjs_bar").getContext('2d');
                var myChart1 = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: labelarray,
                        datasets: [{
                            label: "Tổng tiền (VNĐ)",
                            data: dataarray,
                            backgroundColor:/* "rgba(89, 105, 255,0.5)"*/ "green",
                                    borderColor: /*"rgba(89, 105, 255,0.7)"*/"green",
                            borderWidth: 2
                        },]
                    },
                    options: {
                        scales: {
                            yAxes: [{

                            }]
                        },
                             legend: {
                        display: true,
                        position: 'bottom',

                        labels: {
                            fontColor: '#71748d',
                            fontFamily: 'Circular Std Book',
                            fontSize: 14,
                        }
                    },

                    scales: {
                        xAxes: [{
                            scaleLabel: {
                                display: true,
                                labelString: 'ID Khách hàng',
                                fontColor: "#546372"
                            },
                            ticks: {
                                fontSize: 14,
                                fontFamily: 'Circular Std Book',
                                fontColor: '#71748d',
                            }
                        }],
                        yAxes: [{
                            scaleLabel: {
                                display: true,
                                labelString: 'Tổng tiền',
                                fontColor: "#546372"
                            },
                            ticks: {
                                fontSize: 14,
                                fontFamily: 'Circular Std Book',
                                fontColor: '#71748d',
                            }
                        }]
                    }
                }

                    
                });
            }

            
            

        });
})(window, document, window.jQuery);

/////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////
(function(window, document, $, undefined) {
    "use strict";
    $(function() { 
        if ($('#chartjs_bar2').length) {
            var ctx = document.getElementById("chartjs_bar2").getContext('2d');
            var myChart2 = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labelarray2,
                    datasets: [{
                        label: "Tổng tiền (VNĐ)",
                        data: dataarray2,
                        backgroundColor:/* "rgba(89, 105, 255,0.5)"*/ "green",
                                borderColor: /*"rgba(89, 105, 255,0.7)"*/"green",
                        borderWidth: 2
                    },]
                },
                options: {
                    scales: {
                        yAxes: [{

                        }]
                    },
                         legend: {
                    display: true,
                    position: 'bottom',

                    labels: {
                        fontColor: '#71748d',
                        fontFamily: 'Circular Std Book',
                        fontSize: 14,
                    }
                },

                scales: {
                    xAxes: [{
                        scaleLabel: {
                            display: true,
                            labelString: 'ID Thể Loại',
                            fontColor: "#546372"
                        },
                        ticks: {
                            fontSize: 14,
                            fontFamily: 'Circular Std Book',
                            fontColor: '#71748d',
                        }
                    }],
                    yAxes: [{
                        scaleLabel: {
                            display: true,
                            labelString: 'Tổng tiền',
                            fontColor: "#546372"
                        },
                        ticks: {
                            fontSize: 14,
                            fontFamily: 'Circular Std Book',
                            fontColor: '#71748d',
                        }
                    }]
                }
            }

                
            });
        }

        
        

    });
})(window, document, window.jQuery);
/////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////

(function(window, document, $, undefined) {
    "use strict";
    $(function() { 
        if ($('#chartjs_bar3').length) {
            var ctx = document.getElementById("chartjs_bar3").getContext('2d');
            var myChart3 = new Chart(ctx, {
                type: 'bar',
                
                data: {
                    labels: labelarray3,
                    datasets: [{
                        label: "Tổng tiền (VNĐ)",
                        data: dataarray3,
                       backgroundColor:/* "rgba(89, 105, 255,0.5)"*/ "green",
                                borderColor: /*"rgba(89, 105, 255,0.7)"*/"green",
                        borderWidth: 2
                    },]
                },
                
                options: {
                    scales: {
                        yAxes: [{
                            
                        }]
                    },
                        legend: {
                    display: true,
                    position: 'bottom',

                    labels: {
                        fontColor: '#71748d',
                        fontFamily: 'Circular Std Book',
                        fontSize: 14,
                    }
                },

                scales: {
                    xAxes: [{
                        scaleLabel: {
                            display: true,
                            labelString: 'ID Sản phẩm',
                            fontColor: "#546372"
                        },
                        ticks: {
                            fontSize: 14,
                            fontFamily: 'Circular Std Book',
                            fontColor: '#71748d',
                        }
                    }],
                    yAxes: [{
                        scaleLabel: {
                            display: true,
                            labelString: 'Tổng tiền',
                            fontColor: "#546372"
                        },
                        ticks: {
                            fontSize: 14,
                            fontFamily: 'Circular Std Book',
                            fontColor: '#71748d',
                        }
                    }]
                }
            }

                
            });
        }

        
        

    });
})(window, document, window.jQuery);

////////////////////////////////////////////////////////////////////////////////////////////////////

