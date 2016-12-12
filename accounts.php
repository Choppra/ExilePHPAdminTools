<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/ExilePHPAdminTools/includes/queries.php";
include_once ($path);
$Accounts=AllAccounts();
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
    <div class="jumbotron" style="padding-top:10px; margin-top:-21px;">
      <h1><center>ACCOUNTS</center></h1>
      <h2><center><?php echo $_SESSION['dbase'];?></center></h2>
    </div>
    <div style="height: 10px;">&nbsp;</div>
    <!-- Jumbotron - End -->
    <!-- Datatable Start -->
    <center>
    <div class="form-group">
      <div class="input-group input-group-">
        <input class="form-control input-sm" type="text" id="search" placeholder="Quick Search...">
      </div>
    </div>
    </center>
    <div class=" table-responsive" style="max-width:1200px;  margin:auto;">
      <table class=" table-bordered table table-hover table-striped" id="table" style="margin: auto;">
        <thead>
          <tr>
            <th style="width:10px;"><center>Check</center></th>
            <th><center>Player Name</center></th>
            <th><center>Player ID</center></th>
            <th style="width:100px;"><center>Score</center></th>
            <th style="width:100px;"><center>Locker</center></th>
            <th><center>First Connected</center></th>
            <th><center>Last Connected</center></th>
            <th><center>Last Disconnected</center></th>
            <th><center>Total Connections</center></th>
            <th style="width:100px;"><center>Actions</center></th>
          </tr>
        </thead>
        <tbody>
          <?php
          $counter=0;
          foreach ($Accounts as $Account) {
          $counter=$counter+1;
          echo "<tr>";
            echo "<form action='ChangeScoreLocker.php' method='post'>";
              echo "<td><center><input type='checkbox' value='' id='chbox".$counter."' onChange='enableTxTBx".$counter."()';></center></td>";
              echo "<td><center>".$Account['name']."</center></td>";
              echo "<input type='hidden' value='".$Account['uid']."' name='uid' />";
              echo "<td><center><a href='playerinfo.php?pid=".$Account['uid']."'>".$Account['uid']."</a></center</td>";
              echo "<td><input style='text-align:right;' type='number' class='form-control input-sm' name='score' id='score".$counter."' value='".$Account['score']."' disabled></td>";
              echo "<td><input style='text-align:right;' type='number' class='form-control input-sm' name='locker' id='locker".$counter."' value='".$Account['locker']."' disabled></td>";
              echo "<td><center>".$Account['first_connect_at']."<center></td>";
              echo "<td><center>".$Account['last_connect_at']."<center></td>";
              echo "<td><center>".$Account['last_disconnect_at']."<center></td>";
              echo "<td><center>".$Account['total_connections']."<center></td>";
              echo "<td>";
                echo "<center>";
                echo "<button type='submit' id='bt".$counter."' class='btn btn-xs btn-success' name='".$Account['name']."' disabled><i class='fa fa-search-plus'></i>UPDATE</button>";
                echo "</center>";
              echo "</td>";
            echo "</form>";
          echo "</tr>";
          ?>
          <script type="text/javascript">
          function enableTxTBx<?php echo $counter ?>(){
          if (document.getElementById("chbox<?php echo $counter ?>").checked == true) {
          document.getElementById("score<?php echo $counter ?>").disabled='';
          document.getElementById("locker<?php echo $counter ?>").disabled='';
          document.getElementById("bt<?php echo $counter ?>").disabled='';
          }else {
          document.getElementById("score<?php echo $counter ?>").disabled='true';
          document.getElementById("locker<?php echo $counter ?>").disabled='true';
          document.getElementById("bt<?php echo $counter ?>").disabled='true';
          }
          }
          </script>
          <?php
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


