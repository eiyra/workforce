<!doctype html>
<head>
<title>CVMIS</title>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.2/raphael-min.js"></script>
  <script src="../morris.js"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/prettify/r224/prettify.min.js"></script>
  <script src="lib/example.js"></script>

  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/prettify/r224/prettify.min.css">
  <link rel="stylesheet" href="../ morris.css">
  <link rel="icon" href="../../image/school.png">
</head>
<body>
<h1>Bar Graph Total of Visitor and Student visit and outing</h1>
<div id="graph"></div>

<?php
  require '../../connect.php';
  
  

  
  $month = array ('%%-JAN-18',
           '%%-FEB-18',
           '%%-MAR-18',
           '%%-APR-18',
           '%%-MAY-18',
           '%%-JUN-18',
           '%%-JUL-18',
           '%%-AUG-18',
           '%%-SEP-18',
           '%%-OCT-18',
           '%%-NOV-18',
           '%%-DEC-18');
  
           
  $dataPoints = array();
  for ($i = 0; $i < sizeof($month); $i++)
    
    {
      $total=0;
      $sel_query="Select *
    from product pd, orders o  
    where pd.product_id = o.product_id 
      AND o.orders_date LIKE '$month[$i]'";
           $result = mysql_query($sel_query);
      
        
      while($row2= mysql_fetch_array($result)) 
      {

     // $uprice = $row2['PRODUCT_PRICE']  * $row2['ORDERS_QUANTITY'];
      $total= $total +  $row2['ORDERS_AMOUNT'];
    
    
      //$_SESSION['super'] = $super;
    
    }
      
      
      //$count = $row1['COUNT'];
      
      $dataPoints[$i] = $total ;
      
    
    }
  
  
  
?>


<script>

Morris.Bar({
  element: 'graph',
  data: [

  
   {x: 'January', y: <?php echo $dataPoints[0];?>},
    {x: 'February', y: <?php echo $dataPoints[1];?>},
    {x: 'March', y: <?php echo $dataPoints[2];?>},
    {x: 'April', y: <?php echo $dataPoints[3];?>},
    {x: 'May', y: <?php echo $dataPoints[4];?>},
    {x: 'Jun', y: <?php echo $dataPoints[5];?>},
    {x: 'July', y: <?php echo $dataPoints[6];?>},
    {x: 'August', y: <?php echo $dataPoints[7];?>},
    {x: 'September', y: <?php echo $dataPoints[8];?>},
  {x: 'October', y: <?php echo $dataPoints[9];?>},
  {x: 'November', y: <?php echo $dataPoints[10];?>},
  {x: 'December', y: <?php echo $dataPoints[11];?> }
  ],
  xkey: 'x',
  ykeys: ['y'],
  labels: ['Total sales'],
 
  barColors: function (row, series, type) {
    if (type === 'bar') {
      var red = Math.ceil(255 * row.y / this.ymax);
      return 'rgb(' + red + ',0,0)';
    }
    else {
      return '#000';
    }
  }
});
</script>
</body>
</html>  
