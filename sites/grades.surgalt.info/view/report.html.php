

<?php 
    
    $my_array = array();
    $prev_pnt = -1;
    $i = 0;
    $niit_too = 1;
    
    $db = DataBase::getInstance();
    $lsnID = $_GET["li"];
    $lsnCntID = $_GET["lci"];
    $sql = "select a.Title,a.SelfPnt,b.Pnt,b.StdID,c.LsnNm,c.LsnCd from lessoncontent a 
inner join homework b on a.LsnCntID = b.LsnCntID 
inner join lesson c on c.LsnID = a.LsnID
where a.LsnID = ".$lsnID." and b.LsnCntID = '".$lsnCntID."'";
    $query = $db->query($sql);
    while($result = mysqli_fetch_assoc($query))
        {
            $my_array[] = $result;
            if($prev_pnt == $result["Pnt"])
                {
                    $niit_too++;
                }
                else
                    {
                        $i++;
                        $niit_too = 1;
                    }
            $array_pnt[$i] = $result["Pnt"];
            $array_too[$i] = $niit_too;
            $prev_pnt = $result["Pnt"];
        }
?>


<html>
  <head>
      <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Оюутны тоо', 'Оноо'],
          <?php
            $i = 0;
            $j = 0;
            while(count($array_too) > $i)
                {
                    $j++;
                    echo "['$array_too[$j]',$array_pnt[$j]]";
                    if(count($array_too) != $i+1)
                        {
                            echo ",";
                        }
                    $i++;
                }
            ?>
        ]);

        var options = {
          title: '<?php echo $my_array[0]["LsnCd"]." - ".$my_array[0]["LsnNm"]; ?>',
          hAxis: {title: 'Оюутны тоо', titleTextStyle: {color: 'green'}}
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="chart_div" style="width: 900px; height: 500px;"></div>
  </body>
</html>