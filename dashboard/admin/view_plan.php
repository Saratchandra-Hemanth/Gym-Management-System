﻿
<?php
require '../../include/db_conn.php';
page_protect();
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <title>CFG | View Plan</title>
    <link rel="stylesheet" href="../../css/style.css"  id="style-resource-5">
    <script type="text/javascript" src="../../js/Script.js"></script>
    <link rel="stylesheet" href="../../css/dashMain.css">
    <link rel="stylesheet" type="text/css" href="../../css/entypo.css">
	<link href="a1style.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<style>
 		#button1
		{
		width:126px;
		}
		.page-container .sidebar-menu #main-menu li#planhassubopen > a {
    		background-color: #2b303a;
    		color: red;
		}
		logo {
    height: 40px; 
    width: 40px; 
    
   border-radius: 50%
  
}
body{

  background-image: url('background6.jpg');
  
  background-repeat: no-repeat;
   background-attachment: fixed;
  
  
  background-size: 100% 100%;
}
	</style>
</head>
     <body class="page-body  page-fade" onload="collapseSidebar()">

    	<div class="page-container sidebar-collapsed" id="navbarcollapse">	
	
		<div class="sidebar-menu">
	
			<header class="logo-env">
			<div class="logo">
                            
			<a href = "index.php"><img src="logo2.png" alt = "CROSS FIT LOGO"></a>
			</div>
			
			
					<!-- logo collapse icon -->
					<div class="sidebar-collapse" onclick="collapseSidebar()">
				<a href="#" class="sidebar-collapse-icon with-animation"><!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
					<i class="entypo-menu"></i>
				</a>
			</div>
							
			
		
			</header>
    		<?php include('nav.php'); ?>
    	</div>

    		<div >
		
				<div class="row">
					
					<!-- Profile Info and Notifications -->
					<div class="col-md-6 col-sm-8 clearfix">	
							
					</div>
					
					
					<!-- Raw Links -->
					<div class="col-md-6 col-sm-4 clearfix hidden-xs">
						
						<ul class="list-inline links-list pull-right">

							<li style="color:white;">Welcome <?php echo $_SESSION['full_name']; ?> 
							</li>						
						
							<li>
								<a href="logout.php"style="color:white;">
									Log Out <i class="entypo-logout right"></i>
								</a>
							</li>
						</ul>
						
					</div>
					
				</div>

		<h3 style="color:white;">Manage Plan</h3>

		<hr />

		<table class="table table-bordered datatable" id="table-1" border=1 style="color:white;">

			<thead>
				<tr>
					<th style="color:white;">S.No</th>
					<th style="color:white;">Plan ID</th>
					<th style="color:white;">Plan name</th>
					<th style="color:white;">Plan Details</th>
					<th style="color:white;">Months</th>
					<th style="color:white;">Rate</th>
					<th style="color:white;">Action</th>
				</tr>
			</thead>		
				<tbody>
					<?php


					$query  = "select * from plan where active='yes' ORDER BY amount DESC";
					//echo $query;
					$result = mysqli_query($con, $query);
					$sno    = 1;

					if (mysqli_affected_rows($con) != 0) {
					    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
					        $msgid = $row['pid'];
					        
					        
					        echo "<tr><td>" . $sno . "</td>";
					        echo "<td>" . $row['pid'] . "</td>";
					        echo "<td>" . $row['planName'] . "</td>";
					        echo "<td width='380'>" . $row['description'] . "</td>";
					        echo "<td>" . $row['validity'] . "</td>";
					        echo "<td>" . $row['amount'] . "</td>";
					        
					        $sno++;
					        
					        echo '<td><a href=edit_plan.php?id="'.$row['pid'].'"><input type="button" class="a1-btn a1-blue" id="boxxe" style="width:100%" value="Edit Plan" ></a><form action="del_plan.php" method="post" onSubmit="return ConfirmDelete();"><input type="hidden" name="name" value="' . $msgid .'"/><input type="submit" id="button1" value="Delete Plan" class="a1-btn a1-orange"/></form></td></tr>';
					        
							$msgid = 0;
					    }
					    
					}

					?>																
				</tbody>
		</table>


<?php include('footer.php'); ?>
    	</div>

    </body>
</html>



				
