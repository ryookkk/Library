<!DOCTYPE html>
<?php
	require 'conn.php';
?>
<html lang="en">
	<head>
		<style>	
		.table {
			max-width: 100%;
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
		.logo{
			width: 100px;
			height: 100px;
		}
		.image{
			float: left;
		}
		.bal{
			position: relative;
			top: -20px;
		}
		.acc{
			font-size: 50px;
			position: relative;
			top: -40px;
		}
		.table, th, td{
			border: 1px solid #00b8e6;
  			border-collapse: collapse;
			padding: 8px;
		}
		.d8{
			float: right;
		}
	</style>
	</head>
<body>
	<div class="title">
		<div class="image">
			<img class="logo" src="CA.png" />
		</div>
		<div>
			<h1>CARMEL ACADEMY</h1>
			<div class="bal">
				<h3>Balilihan, Bohol<br />
					Bohol Association of Catholic Schools  (BACS), Diocese of Bohol<br />
					Catholic Educational Association of the Phillipines  (CEAP)
				</h3>
			</div>
			
		</div>
		<div class="acc">
			Accesion Record
		</div>
	</div>
	<br /> <br />
	<div class="d8">
		<b style="color:blue;">Date Prepared:</b>
		<?php
			$date = date("Y-m-d", strtotime("+6 HOURS"));
			echo $date;
		?>
	</div>
	<br /><br />
	<table class="table table-striped" id="book" >
		<thead>
			<tr>
				<th>ID</th>
				<th>Book Title</th>
				<th>Category</th>
				<th>Author</th>
				<th>ISBNNumber</th>
				<th>Quantity</th>
				<th>Date</th>

			</tr>
		</thead>
		<tbody>
			<?php
				require 'conn.php';
				
				$query = $conn->query("SELECT * FROM `tblbooks`");
				while($fetch = $query->fetch_array()){
					
			?>
			
			<tr>
				<td style="text-align:center;"><?php echo $fetch['id']?></td>
				<td style="text-align:center;"><?php echo $fetch['BookName']?></td>
				<td style="text-align:center;"><?php echo $fetch['Cat']?></td>
				<td style="text-align:center;"><?php echo $fetch['Author']?></td>
				<td style="text-align:center;"><?php echo $fetch['ISBNNumber']?></td>
				<td style="text-align:center;"><?php echo $fetch['BookPrice']?></td>
				<td style="text-align:center;"><?php echo $fetch['RegDate']?></td>
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


