<!DOCTYPE html>
<html>
  <head>
    <title>JADA Live Requests Count Graph</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  </head>
  <body>
    <canvas id="myChart" height="400"></canvas>
    <script>
      const ctx = document.getElementById('myChart').getContext('2d');
      const myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: [],
          datasets: [{
            label: 'Visitor Count',
            data: [],
            backgroundColor: ctx.createLinearGradient(5, 99, 3, 1),
    fill: true,
    borderColor: "rgba(5, 99, 3, 1)",
    backgroundColor: [
      "rgba(5, 99, 3, 1)",
      "rgba(5, 99, 3, 1)"
    ],

            borderColor: 'rgba(5, 99, 3, 1)',
            borderWidth: 3,
            pointRadius: 5
          }]
        },
        options: {
          maintainAspectRatio: false,
          responsive: true,
          scales: {
            xAxes: [{
              ticks: {
                fontColor: 'gray'
              }
            }],
            yAxes: [{
              ticks: {
                beginAtZero: true,
                fontColor: 'gray'
              }
            }]
          },
          legend: {
            labels: {
              fontColor: 'gray'
            }
          },
          tooltips: {
            titleFontColor: 'gray',
            bodyFontColor: 'gray'
          }
        }
      });

      setInterval(() => {
        fetch('data.php')
          .then(response => response.json())
          .then(data => {
            const now = new Date();
            myChart.data.labels.push(now.toLocaleTimeString());
            myChart.data.datasets[0].data.push(data.count);
            myChart.update();

            const oldestTime = now.getTime() - 25000;
            while (myChart.data.labels.length > 0 && new Date(myChart.data.labels[0]).getTime() < oldestTime) {
              myChart.data.labels.shift();
              myChart.data.datasets[0].data.shift();
            }

            if (myChart.data.labels.length > 25) {
              myChart.data.labels.splice(0, myChart.data.labels.length - 25);
              myChart.data.datasets[0].data.splice(0, myChart.data.datasets[0].data.length - 25);
            }
          })
          .catch(error => {
            console.error('Error fetching data:', error);
          });
      }, 2000);
    </script>
  </body>
  
</html>


