<?php
include_once 'includes\queries_tanoa.php';
$Accounts=FindDupersTrader();
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
    <h4><center>DUPERS CHECK</center></h4>
</div>
<!--- JUMBOTRON END-->
        <div>
            <div style="height: 10px;">&nbsp;</div>
            <div class=" table-responsive" style="max-width:1500px;  margin:auto;">
                <table class=" table-bordered table table-hover table-striped" id="tabla" style="margin: auto;">
                    <thead>
                        <tr>
                            <th><center>Player Name</center></th>
                            <th><center>Player ID</center></th>
                            <th><center>Item Sold</center></th>
                            <th><center>Quantity</center></th>
                            <th><center>Poptabs Earned</center></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        
                        $counter=0;
                        foreach ($Accounts as $Account) {
                        $counter=$counter+1;
                        $pid = "";
                        echo "<tr>";
                            echo "<td><center>".$Account['playername']."<center></td>";
                            echo "<td><center><a href='tanoa_searchlogs.php?pid=".$Account['playerid']."'>".$Account['playerid']."</a></center></td>";
                            echo "<td><center>".$Account['item_sold']."<center></td>";
                            echo "<td><center>".$Account['amount']."<center></td>";
                            echo "<td><center>".$Account['poptabs']."<center></td>";
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
    $("button.btn").click(function(e){
    var Pname = jQuery(this).attr("name");
    if(!confirm('Do you really want to update score and locker values to the player: '+Pname+'?')){
    e.preventDefault();
    return false;
    }
    return true;
    });
    });
    $( '#table' ).searchable();
    </script>