$(document).ready(function(){
  $("#sort").on('change', function(){
      var value = $(this).val();
      
      $.ajax({
          url:"sort.php",
          type:"POST",
          data:'request=' + value,
          beforeSend:function(){
              $(".result").html("<p>Working...</p>")
          },
          success:function(data){
              $(".result").html(
                 data
              );
          }
      })
  });
  showChart();
  showGraph();
});


function showChart()
        {
            {
                $.post("chart.php",
                function (data)
                {
                    
                    var events = data;
                    var chartdata = {
                        labels: [
                            'Upcoming',
                            'Past'
                          ],
                        datasets: [
                            {
                                label: 'Events',
                                backgroundColor: [
                                    'rgb(255, 99, 132)',
                                    'rgb(54, 162, 235)'
                                ],
                                data: events
                            }
                        ],
                        options: {
                            responsive: true
                        }
                    };

                    var graphTarget = $("#myChart");

                    var barGraph = new Chart(graphTarget, {
                        type: 'pie',
                        data: chartdata
                    });
                });
            }
        }

        function showGraph()
        {
            {
                $.post("graph.php",
                function (monthvalues)
                {
                    
                    console.log(monthvalues);
                    var months = [];
                    var values = [];

                    for (var i in monthvalues) {
                        months.push(monthvalues[i]);
                        values.push(monthvalues[i]);
                    }

                    var chartdata = {
                        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                        datasets: [
                            {
                                label: 'Monthly Events',
                                backgroundColor: 'green',
                                borderColor: '#46d5f1',
                                hoverBackgroundColor: '#CCCCCC',
                                hoverBorderColor: '#666666',
                                data: values
                            }
                        ],
                        options: {
                            responsive: true,
                            maintainAspectRatio: false
                        }
                    };
                    var graphTarget = $("#myGraph");

                    var barGraph = new Chart(graphTarget, {
                        type: 'bar',
                        data: chartdata
                    });
                });
            }
        }