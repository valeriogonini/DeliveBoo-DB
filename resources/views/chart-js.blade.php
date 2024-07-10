<!DOCTYPE html>
<html>

<head>
    {{-- <title>Laravel 8 Chart JS Example Tutorial - Pie Chart - Tutsmake.com</title>
    <!-- Latest CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
</head>

<body>
    <div class="chart-container">
        <div class="pie-chart-container">
            <canvas id="pie-chart"></canvas>
        </div>
    </div> --}}

    <!-- javascript -->

    {{-- <script>
        $(function() {
            //get the pie chart canvas
            {{-- var cData = JSON.parse(`<?php echo $chart_data; ?>`); 
            var ctx = $("#pie-chart");

            //pie chart data
            var data = {
                labels: cData.label,
                datasets: [{
                    label: "Users Count",
                    data: cData.data,
                    backgroundColor: [
                        "#DEB887",
                        "#A9A9A9",
                        "#DC143C",
                        "#F4A460",
                        "#2E8B57",
                        "#1D7A46",
                        "#CDA776",
                    ],
                    borderColor: [
                        "#CDA776",
                        "#989898",
                        "#CB252B",
                        "#E39371",
                        "#1D7A46",
                        "#F4A460",
                        "#CDA776",
                    ],
                    borderWidth: [1, 1, 1, 1, 1, 1, 1]
                }]
            };

            //options
            var options = {
                responsive: true,
                title: {
                    display: true,
                    position: "top",
                    text: "Last Week Registered Users -  Day Wise Count",
                    fontSize: 18,
                    fontColor: "#111"
                },
                legend: {
                    display: true,
                    position: "bottom",
                    labels: {
                        fontColor: "#333",
                        fontSize: 16
                    }
                }
            };

            //create Pie Chart class object
            var chart1 = new Chart(ctx, {
                type: 'bar',
                data: data,
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                },
            });

        });
    </script> --}}

    <div>
      <canvas id="myChart"></canvas>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <script>
      const ctx = document.getElementById('myChart');
    
      new Chart(ctx, {
        type: 'bar',
        data: {
          labels: ['gennaio', 'febbraio', 'marzo', 'aprile', 'maggio', 'goigno'],
          datasets: [{
            label: '# of Votes',
            data: [{{$gennaio}}, 30, 3, 10, 2, 3],
            borderWidth: 1
          }]
        },
        options: {
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      });
    </script>
</body>

</html>
