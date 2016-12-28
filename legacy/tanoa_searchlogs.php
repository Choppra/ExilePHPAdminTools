<?php
	include_once 'includes\queries_tanoa.php';
	if (count($_GET)) {
        $pid=$_GET['pid'];
		$range="All";
    }else {
		$pid=trim($_POST['pid']);
	    $range=trim($_POST['days']);
    }
    $Logns=FindLogNames($pid,$range);
    $Player=FindPlayerByID($pid);
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
                <style>
            table { table-layout: fixed; }
            table td { word-wrap: break-word; }
        </style>
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
    <h4><center>SERVER LOGS</center></h4>
</div>
<!--- JUMBOTRON END-->  
                <h4 style='margin-top:0px;'><b><center><?php echo $Player[0]['name']; ?> (<?php echo $Player[0]['uid']; ?>)<br><br><?php echo $range; ?> Day(s)</center></b></h3>
            </div><br>
        

<div class="row" style="margin-left: 100px; margin-right: 100px;">
                <div class=" table-responsive" margin:auto;">
                <?php
                foreach ($Logns as $Logn) {
                    echo "<h3 style='margin-bottom:0px;'><b>".$Logn['logname']."</b></h3>";
                    echo "<table class=' table-bordered table table-hover table-striped' id='tabla' style='margin: auto;'>";
                    echo "<thead style='background-color: #375A7F;'>";
                    echo "<tr>";
                    echo "<th style='width:150px;'><center>DATE</center></th>";
                    echo "<th><center>LOGENTRY</center></th>";
                    echo "</tr>";
                    echo "</thead>";
                    echo "<tbody>";
                    $entries=FindLogEntries($pid,$range,$Logn['logname']);
                    foreach ($entries as $entry) {
                        echo "<tr>";
                        echo "<td><center>".$entry['time']."</center></td>";
                        echo "<td>".$entry['logentry']."</td>";
                        echo "</tr>";
                    }
                    echo "</tbody>";
                    echo "</table>";
                    echo "<br>";
                    echo "<br>";
                }
                ?>
            </div>
            </div>
        </div>
        <div class="col-md-12">
            <center>
                <div>
                    &nbsp;
                    &nbsp;
                    <a href="tanoa_logs.php"><button type="button" class="btn btn-default">Return</button></a>
                </div>
            </center>
        </div>
    </body>
</html>
