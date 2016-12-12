<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/includes/queries.php";
include_once ($path);
$Accounts=FindDupersWaste();
?>
<!DOCTYPE html>
<?php include('header.php'); ?>
<html>
  <body>
    <!-- Navigation Bar Start -->
    <?php $search = "False"; ?> <!-- True or False -->
    <?php include('navbar.php'); ?>
    <!-- Navigation Bar End -->
    <!-- Jumbotron - Start -->
    <div class="jumbotron" style="padding-top:10px; margin-top:-21px; ">
      <h1><center>WASTE TRADER CHECK</center></h1>
      <h2><center><?php echo $_SESSION['dbase'];?></center></h2>
    </div>
    <div style="height: 10px;">&nbsp;</div>
    <!-- Jumbotron - End -->
    <center>
<div class="form-group">
    <div class="input-group input-group-default">
        <input class="form-control input-sm" type="text" id="search" placeholder="Quick Search...">
    </div>
</div>
</center>
    <!-- Datatable Start -->
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
            echo "<td><center><a href='dupers_waste_transaction.php?pid=".$Account['transactionid']."'>".$Account['transactionid']."</a></center></td>";
            }
            ?>
          </tbody>
        </table>
      </div>
      <!-- Datatable End -->
      <div style="height: 10px;">&nbsp;</div>
    </body>
  </html>
  <script type="text/javascript">
  $( '#table' ).searchable();
  </script>