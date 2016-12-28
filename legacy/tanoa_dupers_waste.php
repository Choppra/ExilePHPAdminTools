<?php
	include_once 'includes\queries_tanoa.php';
    $Accounts=FindDupersWaste();
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
        <title></title>
    </head>
    

<!-- NAVBAR START -->
<?php $search = "True"; ?> <!-- True or False -->
<?php include('includes\navbar.php'); ?>
    <body>
<!-- NAVBAR END -->
<!--- JUMBOTRON START-->
<div class="jumbotron" style="padding-top:10px; margin-top:-21px; ">
  <h1><center>TANOA</center></h1>
    <h4><center>WASTE TRADER TRANSACTIONS</center></h4>
</div>
<!--- JUMBOTRON END-->  
			<form action="tanoa_transactionid_search.php" method="post">
				<div class="row">
					<div class="col-md-12">
						<center>
							<div class="input-group input-group-md col-xs-10 col-sm-4 col-md-4">
								<input name="pid" type="text" class="form-control" placeholder="Enter Transaction ID..." required>
								<span class="input-group-btn">
									<button class="btn btn-default" type="submit" name="sea2">Search</button>
								</span>
							</div>
						</center>
					</div>
				</div>
			</form>
			<br>
            <div>
                <div style="height: 10px;">&nbsp;</div>
                <div class=" table-responsive" style="max-width:1500px;  margin:auto;">
                    <table class=" table-bordered table table-hover table-striped" id="tabla" style="margin: auto;">
                        <thead>
                            <tr>
								<th><center>Date</center></th>
                                <th><center>PlayerName</center></th>
                                <th><center>Player ID</center></th>
                                <th><center>Vehicle Used/Sold</center></th>
                                <th><center>Item Sold</center></th>
                                <th><center>Quantity</center></th>
                                <th><center>Poptabs Earned</center></th>
                                <th><center>Transaction ID</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                              
					$counter=0;
                            foreach ($Accounts as $Account) {
								$counter=$counter+1;
                                $pid = "";
                                echo "<tr>";
                                echo "<td><center>".$Account['time_sold']."<center></td>";
                                echo "<td><center>".$Account['playername']."<center></td>";
                                echo "<td><center><a href='tanoa_searchlogs.php?pid=".$Account['playerid']."'>".$Account['playerid']."</a></center></td>";
                                echo "<td><center>".$Account['vehicleclass']."<center></td>";
                                echo "<td><center>".$Account['item_sold']."<center></td>";
                                echo "<td><center>".$Account['quantity']."<center></td>";
                                echo "<td><center>".$Account['poptabs']."<center></td>";
                                echo "<td><center><a href='tanoa_transactionid_search.php?pid=".$Account['transactionid']."'>".$Account['transactionid']."</a></center></td>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
    </body>
</html>
<script type="text/javascript">
	$( '#tabla' ).searchable();
	$(document).ready(function(){

	});
	$( '#table' ).searchable();
</script>
