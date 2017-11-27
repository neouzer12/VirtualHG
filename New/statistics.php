<?php
    include('include/header.php');
    include('include/sidebar.php');  
   /* $r1 = mysql_query('select count(*) from lesson');
    $count1 = mysql_fetch_array($r1);

    $r2 = mysql_query('select count(*) from category');
    $count2 = mysql_fetch_array($r2);

    $r3 = mysql_query('select count(*) from quiz');
    $count3 = mysql_fetch_array($r3);

    $r4 = mysql_query('select count(*) from userdata');
    $count4 = mysql_fetch_array($r4);

    $r5 = mysql_query('select count(*) from student');
    $count5 = mysql_fetch_array($r5);
    */
	
	$search = isset($_POST['search']) ? $_POST['search']: null;
    //$user = $settings->getuser($search);
	
	include('data/count_model.php');
    $datarecord = new Data_record();
    $countlesson = $datarecord->countlesson();
    $countcategory = $datarecord->countcategory();
    $countuser = $datarecord->countuser();
	$countbmi = $datarecord->countbmi();
	$counthealthy = $datarecord->counthealthy();
	$countunderweight = $datarecord->countunderweight();
	$countoverweight = $datarecord->countoverweight();
	$countobese = $datarecord->countobese();
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
	$data=mysqli_query($mysqli,"SELECT * FROM userdata");
	//$data2=mysqli_query($mysqli,"SELECT * FROM userdata");
?>

<script>
    var myData1=[<?php 
	echo $counthealthy;
    ?>];

	var myData2=[<?php 
	echo $countunderweight;
    ?>];
	
	var myData3=[<?php 
	echo $countoverweight;
    ?>];
	
	var myData4=[<?php 
	echo $countobese;
    ?>];
</script>

    <?php
    /* Close the connection */
    $mysqli->close(); 
    ?>

<?php
    /*include('data/count_model.php');
    $datarecord = new Data_record();
    $countlesson = $datarecord->countlesson();
    $countcategory = $datarecord->countcategory();
    $countuser = $datarecord->countuser();
	$countbmi = $datarecord->countbmi();
	$counthealthy = $datarecord->counthealthy();
	$countunderweight = $datarecord->countunderweight();
	$countoverweight = $datarecord->countoverweight();
	$countobese = $datarecord->countobese();*/
?>
<div id="page-wrapper">    
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <small>Statistics</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> <a href="index.php">Dashboard</a>
                            </li>
							<li class="active">
								Statistics
							</li>
                        </ol>
                    </div>
                </div>
        <!-- /.row -->


  <div class="row">
				<!--<div class="form-inline form-padding">
                    <form action="users.php" method="post">
                        <input type="text" class="form-control" name="search" placeholder="Search by username">
                        <button type="submit" name="submitsearch" class="btn btn-success"><i class="fa fa-search"></i> Search</button>                                                                 
                    </form>
                </div>-->
                    <!--<div class="row">
						<div class="col-lg-12">                
							<?php include('pagination/report.php'); ?>
						</div>
					</div>-->
	  
					<td>
						<!--<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Total Users:</b><?php echo $counts['admin']+$counts['user'];?></p>-->
						<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Total Number of Accounts: </b><?php echo $counts['admin']+$counts['user'];?></p>
						<p style="margin-top:-10px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo $counts['admin'];?></b> are admin(s)</p>
						<p style="margin-top:-10px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo $counts['user'];?></b> are user(s)</p>
						<p style="margin-top:-10px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo $counthealthy; ?></b> user(s) are healthy</p>
						<p style="margin-top:-10px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo $countunderweight; ?></b> user(s) are underweight</p>
						<p style="margin-top:-10px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo $countoverweight; ?></b> user(s) are overweight</p>
						<p style="margin-top:-10px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo $countobese; ?></b> user(s) are obese</p>
						<p style="margin-top:-10px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo $countbmi; ?></b> recorded Calculated BMI(s)</p><br>
						<p style="margin-top:-10px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo $countcategory; ?></b> Tips and Suggestions Categories</p>
						<p style="margin-top:-10px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo $countlesson; ?></b> Tips and Suggestions Content</p>
					</td>
					
<div id='myChart' style="margin:-235px;"></div>

<script>
    window.onload=function(){
    zingchart.render({
        id:"myChart",
        width:"100%",
        height:400,
        data:{
        "type":"pie",
        "title":{
            "text":"Health Status of Users",
			color:'#000000'
        },
		"legend":{
		"x":"25%",
		"y":"12%",
		"layout":"horizontal",
		"align":"center",
		"offset-y":"35px",
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
        /*"scale-x":{
            "labels":myLabels
        },*/
        "series":[
            {
                "values": myData1,
				//"text": myLabels[0],
				"text": "Healthy",
				"background-color":"#66b3ff"
            },
			{
                "values": myData2,
				//"values": [ myData[1] ],
				//"text": myLabels[1],
				"text": "Underweight",
				"background-color":"#ff9933"
            },
			{
                "values": myData3,
				//"text": myLabels[2],
				"text": "Overweight",
				"background-color":"#e6e600"
            },
			{
                "values": myData4,
				"text": "Obese",
				"background-color":"#ff0000"
            }
    ]
    }
    });
    };
</script>


                    <!--<div class="col-lg-6 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-tasks fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $countlesson; ?></div>
                                        <div>Tips & Suggestions</div>
                                    </div>
                                </div>
                            </div>
                            <a href="lesson.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    
                    <div class="col-lg-6 col-md-6">
                        <div class="panel  panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-user fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $countcategory; ?></div>
                                        <div>Category</div>
                                    </div>
                                </div>
                            </div>
                            <a href="category.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    
                     <div class="col-lg-6 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-user fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $countuser; ?></div>
                                        <div>Users!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="users.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
					
                    <div class="col-lg-6 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-tasks fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php //echo $countlesson; ?><br></div>
                                        <div>Statistics</div>
                                    </div>
                                </div>
                            </div>
                            <a href="lesson.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>-->
      
                    <!--<div class="col-lg-6 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-user fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $countstudent; ?></div>
                                        <div>Students</div>
                                    </div>
                                </div>
                            </div>
                            <a href="studentlist.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>-->
                    
                    
                    
                </div>
                <!-- /.row -->

                
              
                    </div>



        </div>
        <!-- /.row -->



    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->    
<?php include('include/footer.php');