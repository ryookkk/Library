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
				<th>Clients Name</th>
				<th>Book Name</th>
				<th>Book Code</th>
				<th>Issued Date</th>
				<th>Return Date</th>
				
			</tr>
		</thead>
		<tbody>
			<?php
				require 'conn.php';
				
				$query = $conn->query("SELECT tblissuedbookdetails.id,
										tblclients.fname,
										tblbooks.BookName,
										tblbooks.ISBNNumber,
										tblissuedbookdetails.IssuesDate,
										tblissuedbookdetails.ReturnDate,
										tblissuedbookdetails.id 
										as rid from  tblissuedbookdetails 
										join tblclients on tblclients.fname=tblissuedbookdetails.StudentID 
										join tblbooks on tblbooks.id=tblissuedbookdetails.BookId 
										order by tblissuedbookdetails.id desc");
				while($fetch = $query->fetch_array()){
					
			?>
			
			<tr>
				<td style="text-align:center;"><?php echo $fetch['id']?></td>
				<td style="text-align:center;"><?php echo $fetch['fname']?></td>
				<td style="text-align:center;"><?php echo $fetch['BookName']?></td>
				<td style="text-align:center;"><?php echo $fetch['ISBNNumber']?></td>
				<td style="text-align:center;"><?php echo $fetch['IssuesDate']?></td>
				<td style="text-align:center;"><?php echo $fetch['ReturnDate']?></td>
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


