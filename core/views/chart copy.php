<?php

$valor[0] = "";
$data[0] = "";
$aux = 0;
foreach ($chart as $chart) :

    $valor[$aux] = $chart->valor_total;
    $data[$aux] = $chart->data_operacao;
    $aux++;
endforeach;


echo($valor[0]."    ".$data[0]."<br>");
echo($valor[1]."    ".$data[1]."<br>");
echo($valor[2]."    ".$data[2]."<br>");
echo($valor[3]."    ".$data[3]."<br>");

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>chart with PHP & Mysql | lisenme.com </title>
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
  
 </head>
 <body>
  <br /><br />
  <div class="container" style="width:900px;">
   <h2 align="center">Morris.js chart with PHP & Mysql</h2>
   <h3 align="center">Last 10 Years Profit, Purchase and Sale Data</h3>   
   <br /><br />
   <div id="chart"></div>
  </div>
 </body>
</html>

<script>
Morris.Bar({
 element : 'chart',
 data:[<?php echo $valor; ?>],
 xkey:'year',
 ykeys:['profit', 'purchase', 'sale'],
 labels:['Profit', 'Purchase', 'Sale'],
 hideHover:'auto',
 stacked:true
});
</script>
</body>
</html>