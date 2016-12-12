<?php
$path = $_SERVER['DOCUMENT_ROOT'];
  $path .= "/ExilePHPAdminTools/includes/queries.php";
include_once ($path);
$p_name=trim($_POST['pname']);
if ($p_name!="") {
$players=FindPlayerByName($p_name);
}else {
$players=array();
}
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
      <h1><center>SERVER INFORMATION</center></h1>
      <h2><center><?php echo $_SESSION['dbase'];?></center></h2>
    </div>
    <div style="height: 10px;">&nbsp;</div>
    <!-- Jumbotron - End -->
    
    <!-- Datatable Start -->
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
            echo "<td><a href='searchlogs.php?pid=".$player['uid']."'>".$player['uid']."</a></td>";
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

  <div class="col-md-12">
    <center>
    <div>
<br>
<a href="logs.php"><button type="button" class="btn btn-default">RETURN</button></a>
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