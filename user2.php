<?php
    require_once("db/DBHelper.php");
    require_once("ulis/utility.php");

    $sql = "select * from user;";
    $data = executeResult($sql);
    // var_dump($data);
    // die();

?>
<html>
<head>
	<title>Users Page</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Users Page(<a href="logout.php">logout</a>)</h2>
			</div>
			<div class="panel-body">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>No</th>
							<th>Full Name</th>
							<th>Email</th>
                            <th>Job</th>
                            <th>Age</th>
                            <th>Gender</th>
							<th style="width: 50px;"></th>
							<th style="width: 50px;"></th>
						</tr>
					</thead>
					<tbody>
<?php
    $count = 0;
 foreach ($data as $item) {
	echo '<tr>
			<td>'.(++$count).'</td>
			<td>'.$item['name'].'</td>
			<td>'.$item['email'].'</td>
            <td>'.$item['job'].'</td>
            <td>'.$item['age'].'</td>
            <td>'.$item['sex'].'</td>
			<td><button class="btn btn-warning">Edit</button></td>
			<td><button class="btn btn-danger">Delete</button></td>
		</tr>';
}
?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>
</html>