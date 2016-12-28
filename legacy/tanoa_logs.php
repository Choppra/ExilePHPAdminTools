<?php
	include_once 'includes\queries_tanoa.php';
	$lognames=UniqueLognames();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.js"></script>
		<script src="js/jquery.searchable.js"></script>
		<title>ATD Logs</title>
	</head>
    

<!-- NAVBAR START -->
<?php $search = "True"; ?> <!-- True or False -->
<?php include('includes\navbar.php'); ?>
    <body>
<!-- NAVBAR END -->
<!--- JUMBOTRON START-->
<div class="jumbotron" style="padding-top:10px; margin-top:-21px; ">
  <h1><center>TANOA</center></h1>
    <h4><center>SERVER LOGS</center></h4>
</div>
<!--- JUMBOTRON END-->  
			<center>
			<div>
				&nbsp;
				&nbsp;
				
			</div>
			<form action="tanoa_searchid.php" method="post">
				<div class="row">
					<div class="col-md-12">
						<center>
						<div class="input-group input-group-md col-xs-10 col-sm-4 col-md-4">
							<input name="pname" type="text" class="form-control" placeholder="Enter Player Name to find Player ID..." required autofocus>
							<span class="input-group-btn">
								<button class="btn btn-default" type="submit" name="sea1">Search</button>
							</span>
						</div>
						</center>
					</div>
				</div>
			</form>
			<br>
			<div>
				<h3><dt><center>Search by Player ID<center></dt></h3>
			</div>
			<form action="tanoa_searchlogs.php" method="post">
				<div class="row">
					<div class="col-md-12">
						<center>
						<div class="input-group input-group-md col-xs-10 col-sm-4 col-md-4">
							<input name="pid" type="text" class="form-control" placeholder="Enter Player ID..." required>
							<span class="input-group-btn">
								<button class="btn btn-default" type="submit" name="sea2">Search</button>
							</span>
						</div>
						<br>
						<div class="input-group input-group-md col-xs-10 col-sm-4 col-md-4">
							<select name="days" class="form-control" required>
								<option value="" selected="selected" disabled>Select range of days to search</option>
								<option value="All">All days</option>
								<option value="1">1 day</option>
								<option value="2">2 days</option>
								<option value="3">3 days</option>
								<option value="4">4 days</option>
								<option value="5">5 days</option>
								<option value="6">6 days</option>
								<option value="7">1 week</option>
							</select>
						</div>
						</center>
					</div>
				</div>
			</form>
			<br>
			<div>
				<h3><dt><center>Search by Logname<center></dt></h3>
			</div>
			<form action="tanoa_viewlogs.php" method="post">
				<div class="row">
					<div class="col-md-12">
						<center>
						<div class="input-group input-group-md col-xs-10 col-sm-4 col-md-4">
							<select name="logname" class="form-control" required>
								<option value="" selected="selected" disabled>Select Logname</option>
								<?php
									foreach ($lognames as $logname) {
										echo '<option value="'.$logname[logname].'">'.$logname[logname].'</option>';
									}
								?>
							</select>
						</div>
						<br>
						<div class="input-group input-group-md col-xs-10 col-sm-4 col-md-4">
							<select name="days2" class="form-control" required>
								<option value="" selected="selected" disabled>Select range of days to search</option>
								<option value="All">All days</option>
								<option value="1">1 day</option>
								<option value="2">2 days</option>
								<option value="3">3 days</option>
								<option value="4">4 days</option>
								<option value="5">5 days</option>
								<option value="6">6 days</option>
								<option value="7">1 week</option>
							</select>
						</div>
						<br>
						<div>
							<button type="submit" class="btn btn-default" name="regit">View</button>
						</div>
						</center>
					</div>
				</div>
			</form>
		</body>
	</html>