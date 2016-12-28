<?php
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/includes/queries_tanoa.php";
   include_once($path);
  $Tabs=TopTotalPoptabs();
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/jquery.searchable.js"></script>
	<title></title>
</head>
<!-- NAVBAR START -->
<?php $search = "True"; ?> <!-- True or False -->
<?php include('navbar.php'); ?>
<!-- NAVBAR END -->
<body>
<!--- JUMBOTRON START-->
<div class="jumbotron" style="padding-top:10px; margin-top:-21px; ">
	<h1><center>TANOA</center></h1>
    <h4><center>TOP TOTAL POPTABS</center></h4>
</div>
<!--- JUMBOTRON END-->
	<div style="height: 10px;">&nbsp;</div>
		<div class=" table-responsive" style="max-width:1200px;  margin:auto;">
			<table class=" table-bordered table table-hover table-striped" id="tabla" style="margin: auto;">
				<thead>
					<tr>
					<th><center>Player Name</center></th>
					<th><center>Player ID</center></th>
					<th><center>Total Poptabs</center></th>
					<th><center>Last Connected</center></th>
					<th><center>Total Connections</center></th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach ($Tabs as $tab) {
					echo "<tr>";
					echo "<td><center>".$tab['name']."</center></td>";
					echo "<td><center>".$tab['account_uid']."<center></td>";
					echo "<td><center>$".number_format(($tab['total_container_tabs'])+($tab['locker']))."<center></td>";
					echo "<td><center>".$tab['last_connect_at']."<center></td>";
					echo "<td><center>".$tab['total_connections']."<center></td>";
					echo "</tr>";
					}
					?>
				</tbody>
			</table>
	</div>
<div style="height: 50px;">&nbsp;</div>
<?php include('includes\footer.php'); ?>
</body>
</html>
<script type="text/javascript">
$( '#tabla' ).searchable();
</script>