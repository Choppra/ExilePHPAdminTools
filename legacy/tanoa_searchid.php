<?php
    include_once 'includes\queries_tanoa.php';
$p_name=trim($_POST['pname']);
if ($p_name!="") {
$players=FindPlayerByName($p_name);
}else {
$players=array();
}
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
        <script src="https://assets.codepen.io/assets/common/stopExecutionOnTimeout-53beeb1a007ec32040abaf4c9385ebfc.js"></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/components/core.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/md5.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/components/lib-typedarrays.js'></script>
        <script src='https://peterolson.github.com/BigInteger.js/BigInteger.min.js'></script>
        <script src="js/jquery.searchable.js"></script>
        <title></title>
    </head>
    <body>
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
            <div class=" table-responsive" style="max-width:1200px;  margin:auto;">
                <table class=" table-bordered table table-hover table-striped" id="tabla" style="margin: auto;">
                    <thead>
                        <tr>
                            <th><center>Player ID</center></th>
                            <th><center>Player Name</center></th>
                            <th><center>First Connected</center></th>
                            <th><center>Last Connected</center></th>
                            <th><center>Total Connections</center></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($players as $player) {
                        echo "<tr>";
                            echo "<td><a href='tanoa_searchlogs.php?pid=".$player['uid']."'>".$player['uid']."</a></td>";
                            echo "<td><center>".$player['name']."</center></td>";
                            echo "<td><center>".$player['first_connect_at']."<center></td>";
                            echo "<td><center>".$player['last_connect_at']."<center></td>";
                            echo "<td><center>".$player['total_connections']."<center></td>";
                        echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <br><br>
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
<script type="text/javascript">
    $( '#tabla' ).searchable();
</script>