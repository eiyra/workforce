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
  <link rel="icon" href="../../../image/school.png">
</head>
<body>
<h1>Donut Chart</h1>
<div id="graph"></div>
<?php
require '../../conn.php';

//$dataPoints = array();

	
	/*$month = array ('%%-JAN-18',
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
	  
	  {*/
		 $query=oci_parse ($conn,"SELECT COUNT(*) AS PACKAGE
									FROM PACKAGE P, BOOKING B
									WHERE P.PACKAGEID=B.PACKAGEID
									AND P.PACKAGE_NAME='BASIC SMALL'
									");
			oci_execute($query);
			$row1=oci_fetch_array($query);
			//while($row1=oci_fetch_array($query))
			//{
				$count = $row1['PACKAGE'];
				$name = $row1['PACKAGE_NAME'];
				
			//}
			//$dataPoints[$i] = $count;
				
	  //}
  
  
 	
?>
<script>
Morris.Donut({
  element: 'graph',
  data: [
    {value: <?php echo $count;?>, label: '<?php echo $name;?>'}
    
  ],
  formatter: function (x) { return x + "%"}
}).on('click', function(i, row){
  console.log(i, row);
});
</script>

</body>
