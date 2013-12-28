<html>
  <head>
      <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['', 'Hours per Day'],
          ['А',     2],
          ['B',      1],
          ['-C',  2],
          ['F', 1],
          ['+D',    3]
        ]);

        var options = {
          title: 'IS303 хичээлийн 2012 оны өвлийн улирлын нийт оюутны дүнгийн тайлан'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
  </body>
</html>