<?php
    include_once 'includes\queries_tanoa.php';
$logn=trim($_POST['logname']);
$range=trim($_POST['days2']);
$logentries=LogEntriesByLogname($range,$logn);
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

                <style>
            table { table-layout: fixed; }
            table td { word-wrap: break-word; }
        </style>
        <title></title>
    </head>

<!-- NAVBAR START -->
<?php $search = "True"; ?> <!-- True or False -->
<?php include('includes\navbar.php'); ?>
<!-- NAVBAR END -->
<body>
<!--- JUMBOTRON START-->
<div class="jumbotron" style="padding-top:10px; margin-top:-21px; ">
  <h1><center>TANOA</center></h1>
    <h4><center>SERVER LOGS</center></h4>
</div>
<!--- JUMBOTRON END-->
<div style="height: 10px;">&nbsp;</div>
            <center>
            <div>
                <a href="tanoa_logs.php"><button type="button" class="btn btn-default">Return</button></a><br>
            </div>
            </center>
            <div class="row" style="margin-left: 100px; margin-right: 100px;">
                <div style="height: 10px;">&nbsp;</div>
                <div class=" table-responsive" margin:auto;">
                    <?php
                    echo "<h3 style='margin-bottom:0px;'><b>".$logn."</b></h3>";
                    echo "<table class=' table-bordered table table-hover table-striped' id='tabla' style='margin: auto;'>";
                    echo "<thead style='background-color: #375A7F;'>";
                    echo "<tr>";
                    echo "<th style='width:150px;'><center>DATE</center></th>";
                    echo "<th><center>LOGENTRY</center></th>";
                    echo "</tr>";
                    echo "</thead>";
                    echo "<tbody>";
                        foreach ($logentries as $logentry) {
                        echo "<tr>";
                            echo "<td><center><p>".$logentry['time']."</p></center></td>";
                            echo "<td>".$logentry['logentry']."</td>";
                        echo "</tr>";
                        }
                    echo "</tbody>";
                    echo "</table>";
                    echo "<br>";
                    echo "<br>";
                    ?>
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