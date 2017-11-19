<?php 
    include('include/header.php');
    include('data/result_model.php');  
    include('data/lesson_model.php');  
    $id = isset($_GET['id']) ? $_GET['id'] : null;
    $stud_id = $_SESSION['id'];
    $results = $dataresult->getall($stud_id);
    $lastscore = $dataresult->getlastscore($stud_id,$id);
?>

<script src="https://cdn.zingchart.com/zingchart.min.js"></script>

<?php 
    /* Open connection to "zing_db" MySQL database. */
    $mysqli = new mysqli("localhost", "root", "", "vhg");
     
    /* Check the connection. */
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
	
	/* Fetch result set from t_test table */
	$data=mysqli_query($mysqli,"SELECT * FROM bmi");
?>

<script>
    var myData=[<?php 
    while($info=mysqli_fetch_array($data))
        echo $info['weight'].','; /* We use the concatenation operator '.' to add comma delimiters after each data value. */
    ?>];
    <?php
    $data=mysqli_query($mysqli,"SELECT * FROM bmi");
    ?>
    var myLabels=[<?php 
    while($info=mysqli_fetch_array($data))
        echo '"'.$info['datetimesent'].'",'; /* The concatenation operator '.' is used here to create string values from our database names. */
    ?>];
</script>

<?php
    /* Close the connection */
    $mysqli->close(); 
?>

<br><br><br><div id='myChart'></div>

<script>
    window.onload=function(){
    zingchart.render({
        id:"myChart",
        width:"100%",
        height:400,
        data:{
        "type":"line",
        "title":{
            "text":"Weight",
			color:'#000000'
        },
		"legend":{
		"x":"25%",
		"y":"12%",
		"layout":"horizontal",
		"align":"center",
		"offset-y":"50px",
		"tooltip":{ //Legend Tooltips
			//"text":"The %t population is %plot-description",
			"text":"",
			"width":"20%",
			"height":"20%",
			"wrap-text":true,
			"padding":"5%",
			"background-color":"white",
			"font-color":"black",
			"font-family":"Georgia",
			"border-width":1,
			"border-color":"gray",
			"border-radius":"5px",
			"sticky":true,
			"timeout":10000
    }
  },
		backgroundColor:'none', // This is in the root
		plotarea:{
		backgroundColor:'transparent'
		},
        "scale-x":{
            "labels":myLabels
        },
        "series":[
            {
                "values":myData,
				"text":"Weight",
				"description":""
            }
    ]
    }
    });
    };
</script>

    <!--<div class="container" style="margin-top:50px;">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="text-center text-primary">Your BMI History</h1>
            <hr />
            <?php if(isset($_GET['id'])): ?>
                <div class="alert alert-success">
                    <?php $datalesson->updatestatus('no',$id);?>
                    <h2 class="text-center"><img src="../smiley/smiley-gen014.gif"> Your score is <?php echo $lastscore['score'];?> out of <?php echo $lastscore['total'];?>! <br />Thank You! </h2>
                </div>
            <?php endif; ?>
            <div class="table-responsive bg-info">
                <table class="table table-hover table-bordered table-striped">
                    <thead class="bg-primary" style="font-size:1.5em;">
                        <tr>
						<center>
                            <th class="text-center" width="20%">Time Submitted</th>
                            <th class="text-center" width="20%">BMI</th>
                            <th class="text-center" width="20%">Weight</th>
							
							
                        </center>
						</tr>
                    </thead>
                    <tbody>
<?php
  $conn = mysql_connect("localhost","root","");
  mysql_select_db("vhg",$conn);
  $result= mysql_query("SELECT * FROM bmi where userid = '" . $_SESSION['id'] . "'") or die (mysql_error());
    while($test = mysql_fetch_array($result))
    {
      $id = $test['userid'];
	        echo "

      <tr align='center'>
      <td><p>".$test['datetimesent']."</p></td>
      <td><p>".$test['bmi']."</p></td>
	  <td><p>".$test['weight']."</p></td>
      </tr>

      ";

  ?>

<?php } ?>
                    </tbody>
                </table>
            </div>
        </div>    
    </div>
  
<?php include('include/modal.php'); ?>
<?php include('include/footer.php'); ?>



<!--<div id="chartDiv"></div>
<script>
    var chartData = {
      type: 'bar',  // Specify your chart type here.
      title: {
        text: 'My First Chart' // Adds a title to your chart
      },
      legend: {}, // Creates an interactive legend
      series: [  // Insert your series data here.
          { values: [35, 42, 67, 89]},
          { values: [28, 40, 39, 36]}
      ]
    };
    zingchart.render({ // Render Method[3]
      id: 'chartDiv',
      data: chartData,
      height: 400,
      width: 600
    });
  </script>-->