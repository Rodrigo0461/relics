<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Gráficos</title>
    <meta name="description" content="A admin dashboard theme that will get you started with Bootstrap 4. The sidebar toggles off-canvas on smaller screens." />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="generator" content="Codeply">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" />
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" />
     <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<!--     <script>
     $(function () { 
    $('#container').highcharts({
        chart: {
            type: 'column',
            borderWidth: 4,
            borderRadius: 30
        },
        title: {
            text: 'Fruit Consumption'
        },
        xAxis: {

            categories: "<?php echo $this->data['s']; ?>",
        },
        yAxis: {
            title: {
            text: 'Masalah Siswa'
            }
        },
        series: <?php echo $this->data['t']; ?>
    });
});
        </script>-->

    </head>
    <body>
  
    
<!--  <div id="container" style="width: 1500px; height: 350px; margin: 1 auto"></div>-->
<!--    <div id="container2" style="width: 1500px; height: 300px; margin: 1 auto">-->
        <?php var_dump($this->data); ?>
  

    </body>
</html>
