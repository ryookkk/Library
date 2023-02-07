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
<?php
	require 'conn.php';
?>
<html lang="en">
	<head>
		<style>	
		.table {
			width: 100%;
			margin-bottom: 20px;
		}	
		
		.table-striped tbody > tr:nth-child(odd) > td,
		.table-striped tbody > tr:nth-child(odd) > th {
			background-color: #f9f9f9;
		}
		
		@media print{
			#print {
				display:none;
			}
		}
		@media print {
			#PrintButton {
				display: none;
			}
		}
		
		@page {
			size: auto;   /* auto is the initial value */
			margin: 50px;  /* this affects the margin in the printer settings */
		}
		.title{
			text-align: center;
		}
	</style>
	</head>
<body>
	<div class="title">
	<h2>Carmel Academy</h2>
	<h1>Borrowed Book Records</h1>
	</div>
	<br /> <br />
	<b style="color:blue;">Date Prepared:</b>
	<?php
		$date = date("Y-m-d", strtotime("+6 HOURS"));
		echo $date;
	?>
	<br /><br />
	<table class="table table-striped">
		<thead>
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
		<tbody>
			<?php
				require 'conn.php';
				
				$query = $conn->query("SELECT * from tblclients");
				while($fetch = $query->fetch_array()){
					
			?>
			
			<tr>
				<td style="text-align:center;"><?php echo $fetch['id']?></td>
				<td style="text-align:center;"><?php echo $fetch['Stats']?></td>
				<td style="text-align:center;"><?php echo $fetch['fname']?></td>
				<td style="text-align:center;"><?php echo $fetch['mobile']?></td>
				<td style="text-align:center;"><?php echo $fetch['LRN']?></td>
				<td style="text-align:center;"><?php echo $fetch['RegDate']?></td>
				<td style="text-align:center;"><?php echo $fetch['RegDate']?></td>
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
	<center><button id="PrintButton" onclick="PrintPage()">Print</button></center>
</body>
<script type="text/javascript">
	function PrintPage() {
		window.print();
	}
	document.loaded = function(){
		
	}
	window.addEventListener('DOMContentLoaded', (event) => {
   		PrintPage()
		setTimeout(function(){ window.close() },750)
	});
</script>
</html>

<?php } ?>

