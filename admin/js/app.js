$(document).ready(function(){
    $.ajax({
        url: "includes/chart.php",
        method: "GET",
        success: function(data) {
            console.log(data);
            var order = [];
            var progress = [];

            for(var i in data) {
                data[i].progress=data[i].progress*100;
                order.push (data[i].orderid);
                progress.push(data[i].progress);
            }

            
            var ctx = $("#mycanvas");

            var barGraph = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: order,
                    datasets : [
                    {
                        label: 'Progress',
                        backgroundColor: 'rgba(30,144,255,0.75)',
                        borderColor: 'rgba(30,144,255, 0.75)',
                        hoverBackgroundColor: 'rgba(30,144,255, 1)',
                        hoverBorderColor: 'rgba(30,144,255, 1)',
                        data: progress,
                        
                    }
                ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        xAxes: [{
                            barThickness: 60,
                            gridLines: {
                                color: "rgba(0, 0, 0, 0)",
                            }
                        }],
                        yAxes: [{
                            display: true,
                            ticks: {
                                beginAtZero: true,
                                max: 100
                            },
                            gridLines: {
                                color: "rgba(0, 0, 0, 0)",
                            }
                        }]
                    }
                }
            });
        },
        error: function(data) {
            console.log(data);

        }
    });
});