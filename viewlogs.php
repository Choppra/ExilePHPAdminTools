<?php
  $path = $_SERVER['DOCUMENT_ROOT'];
  $path .= "/includes/queries.php";
  include_once ($path);
  $logn=trim($_POST['logname']);
  $range=trim($_POST['days2']);
  $logentries=LogEntriesByLogname($range,$logn);
?>

<!DOCTYPE html>
<?php include('header.php'); ?>
<head>
                <style>
            table { table-layout: fixed; }
            table td { word-wrap: break-word; }
        </style>
</head>
  <html>
  	<body>
  <!-- Navigation Bar Start -->
  <?php $search = "False"; ?> <!-- True or False -->
  <?php include('navbar.php'); ?>
  <!-- Navigation Bar End -->

  <!-- Jumbotron - Start -->
  <div class="jumbotron" style="padding-top:10px; margin-top:-21px; ">
    <h1><center>SERVER INFORMATION</center></h1>
    <h2><center><?php echo $_SESSION['dbase'];?></center></h2>
  </div>
  <div style="height: 10px;">&nbsp;</div>
  <!-- Jumbotron - End -->   

  <!-- Datatable Start --> 
 <div style="height: 10px;">&nbsp;</div>
            <center>
            <div>
                <a href="logs.php"><button type="button" class="btn btn-default">RETURN</button></a><br>
            </div>
            </center>
            <div class="row" style="margin-left: 100px; margin-right: 100px;">
                <div style="height: 10px;">&nbsp;</div>
                <div class=" table-responsive" margin:auto;">
                    <?php
                    echo "<h3 style='margin-bottom:0px;'><b>".$logn."</b></h3>";
                    echo "<table class=' table-bordered table table-striped' id='tabla' style='margin: auto;'>";
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
                    <a href="logs.php"><button type="button" class="btn btn-default">Return</button></a>
                </div>
                </center>
            </div>
  <!-- Datatable End --> 		

      <div style="height: 10px;">&nbsp;</div>
    </body>
  </html>
<script type="text/javascript">
	$( '#table' ).searchable();
</script>

