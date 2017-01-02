<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/ExilePHPAdminTools/includes/queries.php";
include_once ($path);
$GetAllClans=GetAllClans();
?>
<!DOCTYPE html>
<?php include('header.php'); ?>
<head>
  <script>
  $(document).ready(function(){
  $(function(){
  $("#table").tablesorter();
  });
  });
  </script>
</head>
<html>
  <body>
    <!-- Navigation Bar Start -->
    <?php include('navbar.php'); ?>
    <!-- Navigation Bar End -->
    <!-- Jumbotron - Start -->
    <div class="jumbotron" style="padding-top:10px; margin-top:-21px; ">
      <h1><center>CLANS</center></h1>
      <h2><center><?php echo $_SESSION['dbase'];?></center></h2>
    </div>
    <div style="height: 10px;">&nbsp;</div>
    <!-- Jumbotron - End -->
    <!-- Datatable Start -->
    <center>
    <div class="form-group">
      <div class="input-group input-group-default">
        <input class="form-control input-sm" type="text" id="search" placeholder="Quick Search...">
      </div>
    </div>
    </center>
    <div class=" table-responsive" style="max-width:900px;  margin:auto;">
      <table class=" table-bordered table table-hover" id="table" style="margin: auto;">
        <thead style='background-color: #375A7F;'>
          <tr>
            <th><center>ID</center></th>
            <th><center>Clan</center></th>
            <th><center>Leader</center></th>
            <th><center>Leader ID</center></th>

          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($GetAllClans as $GetAllClan) {
          echo "<tr>";
            echo "<td><center><a href='clanid.php?pid=".$GetAllClan['id']."'>".$GetAllClan['id']."</a></center</td>";
            echo "<td><center>".$GetAllClan['name']."<center></td>";
            echo "<td><center>".$GetAllClan['leader_name']."</center></td>";
            echo "<td><center><a href='playerinfo.php?pid=".$GetAllClan['leader_uid']."'>".$GetAllClan['leader_uid']."</a></center</td>";

          echo "</tr>";
          }
          ?>
        </tbody>
      </table>
    </div>
    <!-- Datatable End -->
    <br>
    <br>
    <center><a href='stolenbases.php'><button type='button' class='btn btn-default'>RETURN</button></a></center>
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