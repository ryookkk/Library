<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{ 

// code for block student    
if(isset($_GET['inid']))
{
$id=$_GET['inid'];
$status=0;
$sql = "update tblclients set Status=:status  WHERE id=:id";
$query = $dbh->prepare($sql);
$query -> bindParam(':id',$id, PDO::PARAM_STR);
$query -> bindParam(':status',$status, PDO::PARAM_STR);
$query -> execute();
header('location:reg-students.php');
}



//code for active students
if(isset($_GET['id']))
{
$id=$_GET['id'];
$status=1;
$sql = "update tblclients set Status=:status  WHERE id=:id";
$query = $dbh->prepare($sql);
$query -> bindParam(':id',$id, PDO::PARAM_STR);
$query -> bindParam(':status',$status, PDO::PARAM_STR);
$query -> execute();
header('location:reg-students.php');
}


    ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
	</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<a class="navbar-brand" href="https://sourcecodester.com">Reports</a>
		</div>
	</nav>
	<div class="col-md-3"></div>
	<div class="col-md-6 well">
		<h3 class="text-primary">Accession Report</h3>
		<hr style="border-top:1px dotted #ccc;" />
		<br /><br />
		<a href="print.php" target="_blank" class="btn btn-success pull-right"><span class="glyphicon glyphicon-print"></span> Print</a>
		<br />
		<br />
		<table class="table table-bordered">
			<thead class="alert-success">
			<tr>
				<th>#</th>
				<th>Status</th>
				<th>Name</th>
				<th>Mobile Number</th>
				<th>LRN</th>
				<th>Reg Date</th>
				<th>Action</th>

			</tr>
			</thead>
			<tbody style="background-color:#fff;">
				<?php
					require 'conn.php';
					
					$query = $conn->query("SELECT * from tblclients");
					while($fetch = $query->fetch_array()){
						
				?>
				
				<tr>
				<td><?php echo $fetch['id']?></td>
				<td><?php echo $fetch['Stats']?></td>
				<td><?php echo $fetch['fname']?></td>
				<td><?php echo $fetch['mobile']?></td>
				<td><?php echo $fetch['LRN']?></td>
				<td><?php echo $fetch['RegDate']?></td>
				<td class="center"><?php if($result->Status==1)
                                            {
                                                echo htmlentities("Active");
                                            } else {


                                            echo htmlentities("Blocked");
}
                                            ?></td>
			</tr>
				
				<?php
					}
				?>
			</tbody>
		</table>
	</div>
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<form action="save_query.php" method="POST">
				<div class="modal-content">
					<div class="modal-body">
						<div class="col-md-2"></div>
						<div class="col-md-8">
							<div class="form-group">
								<label>#</label>
								<input type="text" name="id" class="form-control"/>
							</div>
							<div class="form-group">
								<label>Name</label>
								<input type="number" name="Stats" class="form-control"/>
							</div>
							<div class="form-group">
								<label>Mobile Number</label>
								<input type="number" name="Cat" class="form-control"/>
							</div>
							<div class="form-group">
								<label>LRN</label>
								<input type="number" name="Author" class="form-control"/>
							</div>
							<div class="form-group">
								<label>Registered Date</label>
								<input type="number" name="ISBNNumber" class="form-control"/>
							</div>
							<div class="form-group">
								<label>Action</label>
								<input type="number" name="BookPrice" class="form-control"/>
							</div>
							
						</div>
					</div>
					<div style="clear:both;"></div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
						<button name="save" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Submit</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</body>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.js"></script>
</html>
<?php } ?>