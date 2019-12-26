$(document).ready(function(){
    $.ajax({
        url: "includes/trailchart.php",
        method: "GET",
        success: function(data) {
            console.log(data);
            var available = data[0];
            var repair = data[1];
            var site = data[2];

            
            var ctx = $("#trailerpie");

            var pieGraph = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ["Available","Repairs","Onsite"],
                    datasets : [
                    {
                        label: 'Trailer Rent',
                        data:[available,repair,site],
                        backgroundColor: ['rgba(92,184,92,1)',
                        'rgba(240,173,78, 1)','rgba(217,83,79, 1)'],
                        borderColor: [
                            'rgba(92,184,92,1)',
                            'rgba(240,173,78, 1)',
                            'rgba(217,83,79,1)'
                        ],
                        borderWidth: 1
                        
                    }
                ]
                },
            });
        },
        error: function(data) {
            console.log(data);

        }
    });
});