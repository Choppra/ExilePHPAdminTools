<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/includes/queries.php";
include_once ($path);
if (count($_GET)) {
$pid=$_GET['pid'];
}else {
$pid=trim($_POST['pid']);
}
$Transactions=FindTransactionByID($pid);
?>
<!DOCTYPE html>
<?php include('header.php'); ?>
<html>
  <body>
    <!-- Navigation Bar Start -->
    <?php $search = "False"; ?> <!-- True or False -->
    <?php include('navbar.php'); ?>
    <!-- Navigation Bar End -->
<!--- JUMBOTRON START-->
<div class="jumbotron" style="padding-top:10px; margin-top:-21px; ">
  <h1><center>TRANSACTION ID# <?php echo $Transactions[0]['transactionid'];?></center></h1>
  <h2><center><?php echo $_SESSION['dbase'];?></center></h2>
</div>
<!--- JUMBOTRON END-->  
      <div style="height: 10px;">&nbsp;</div>
      <div class="col-md-12">
      <center>
      <div>
        &nbsp;
        &nbsp;
        <a href="dupers_waste.php"><button type="button" class="btn btn-default">Return</button></a><br><br><br>
      </div>
      </center>
    </div>
      <div class="row" style="margin-left: 100px; margin-right: 100px;">
        <div class=" table-responsive col-md-6">
          <table class=" table-bordered table table-hover table-striped">
            <tbody>
              <tr>
                <th scope="row">Date/Time</th>
                <td><?php echo $Transactions[0]['time_sold'];?></td>
              </tr>
              <tr>
                <th scope="row">Vehicle Used</th>
                <td><?php echo $Transactions[0]['vehicleclass'];?></td>
              </tr>
              <tr>
                <th scope="row">Vehicle Sold</p></th>
                <td colspan="2"><?php echo $Transactions[0]['soldvehicle'];?></td>
              </tr>
              <tr>
                <th scope="row">Total Poptabs</p></th>
                <td colspan="2"><?php echo $Transactions[0]['poptabs'];?></td>
              </tr>
            </tbody>
          </table><br><br>
        </div>
        <div class="table-responsive col-md-6">
          <table class=" table-bordered table table-hover table-striped">
            <tbody>
              <tr>
                <th scope="row">Player Name</th>
                <td><?php echo $Transactions[0]['playername'];?></td>
              </tr>
              <tr>
                <th scope="row">Player ID:</th>
                <td><?php echo $Transactions[0]['playerid'];?></td>
              </tr>
              <tr>
                <th scope="row">Total Respect:</th>
                <td colspan="2"><?php echo $Transactions[0]['score'];?></td>
              </tr>
              <tr>
                <th scope="row">Total Connections:</th>
                <td colspan="2"><?php echo $Transactions[0]['total_connections'];?></td>
              </tr>
              <tr>
                <th scope="row">Total Days on Server:</th>
                <td colspan="2"><?php echo $Transactions[0]['days_on_server'];?></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <!--Information About The Transaction-->
      <br>
      <div class=" table-responsive" style="max-width:600px;  margin:auto;">
        <table class=" table-bordered table table-hover table-striped" id="tabla" style="margin: auto;">
          <thead>
            <tr>
              <th><center>Items in Vehicle Inventory</center></th>
              <th><center>Quantity</center></th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($Transactions as $Transaction) {
            echo "<tr>";
              echo "<td><center>".$Transaction['item_sold']."<center></td>";
              echo "<td><center>".$Transaction['quantity']."<center></td>";
            echo "</tr>";
            }
            ?>
          </tbody>
        </table><br><br>
      </div>
    </div>
    <div class="col-md-12">
      <center>
      <div>
        &nbsp;
        &nbsp;
        <a href="dupers_waste.php"><button type="button" class="btn btn-default">Return</button></a>
      </div>
      </center>
    </div>
  </div>
</div>
</body>

      <!-- Datatable End -->
      <div style="height: 10px;">&nbsp;</div>
    </body>
  </html>
  <script type="text/javascript">
  $( '#table' ).searchable();
  </script>