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
				<th>Clients Name</th>
				<th>Book Name</th>
				<th>Book Code</th>
				<th>Issued Date</th>
				<th>Return Date</th>

			</tr>
			</thead>
			<tbody style="background-color:#fff;">
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
				<td><?php echo $fetch['id']?></td>
				<td><?php echo $fetch['fname']?></td>
				<td><?php echo $fetch['BookName']?></td>
				<td><?php echo $fetch['ISBNNumber']?></td>
				<td><?php echo $fetch['IssuesDate']?></td>
				<td><?php echo $fetch['ReturnDate']?></td>
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
								<label>ID</label>
								<input type="text" name="id" class="form-control"/>
							</div>
							<div class="form-group">
								<label>Book Title</label>
								<input type="number" name="BookName" class="form-control"/>
							</div>
							<div class="form-group">
								<label>Category</label>
								<input type="number" name="Cat" class="form-control"/>
							</div>
							<div class="form-group">
								<label>Author</label>
								<input type="number" name="Author" class="form-control"/>
							</div>
							<div class="form-group">
								<label>Book Code</label>
								<input type="number" name="ISBNNumber" class="form-control"/>
							</div>
							<div class="form-group">
								<label>Book Price</label>
								<input type="number" name="BookPrice" class="form-control"/>
							</div>
							<div class="form-group">
								<label>Date</label>
								<input type="number" name="RegDate" class="form-control"/>
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