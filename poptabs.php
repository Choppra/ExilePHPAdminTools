<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/ExilePHPAdminTools/includes/queries.php";
include_once ($path);
$Tabs=TopTotalPoptabs();
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
      <h1><center>TOP 50 POPTABS</center></h1>
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
    <div class=" table-responsive" style="max-width:1200px;  margin:auto;">
      <table class=" table-bordered table table-hover" id="table" style="margin: auto;">
        <thead style='background-color: #375A7F;'>
          <tr>
            <th><center>Player Name</center></th>
            <th><center>Player ID</center></th>
            <th><center>Total Poptabs</center></th>
            <th><center>Last Connected</center></th>
            <th><center>Total Connections</center></th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($Tabs as $tab) {
          echo "<tr>";
            echo "<td><center>".$tab['name']."</center></td>";
            echo "<td><center><a href='playerinfo.php?pid=".$tab['account_uid']."'>".$tab['account_uid']."</a></center</td>";
            echo "<td><center>".number_format($tab['totalpoptabs'])."<center></td>";
            echo "<td><center>".$tab['last_connect_at']."<center></td>";
            echo "<td><center>".$tab['total_connections']."<center></td>";
          echo "</tr>";
          }
          ?>
        </tbody>
      </table>
    </div>
    <!-- Datatable End -->
    <!-- Footer Start -->
    <div style="height: 100px;">&nbsp;</div>
    <footer id="footer" class="container footer">
      <div class="copyright">
        <center>Copyright © 2017 <a href="http://www.atdgaming.com">ATD Gaming</a></center>
        <div style="height: 10px;">&nbsp;</div>
      </div>
    </footer>
    <!-- Footer End -->
  </body>
</html>
<script type="text/javascript">
$( '#table' ).searchable();
</script>