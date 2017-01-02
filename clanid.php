<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/ExilePHPAdminTools/includes/queries.php";
include_once ($path);
if (count($_GET)) {
$pid=$_GET['pid'];
}else {
$pid=trim($_POST['pid']);
}
$GetClanMembersByIDs = GetClanMembersByID($pid);
$GetClanNameByID = GetClanNameByID($pid);
$GetClanLeaderByID = GetClanLeaderByID($pid);
$clanleader = $GetClanLeaderByID[0]['leader_uid'];
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
      <h1><center><?php echo $GetClanNameByID[0]['name'];?><h2>ID: <?php echo $GetClanNameByID[0]['id'];?></h2></center></h1>
      <h3><center><?php echo $_SESSION['dbase'];?></center></h3>
    </div>
    <!--- JUMBOTRON END-->
    <div style="height: 10px;">&nbsp;</div>
    <div class="col-md-12">
      <div class="row" style="margin-left: 600px; margin-right: 600px;">
        <h3 style='color: #375A7F;'>MEMBERS: </h3>
         <div class=" table-responsive" style="max-width:1400px;  margin:auto;">
      <table class=" table-bordered table table-hover" id="table" style="margin: auto;">
        <thead style='background-color: #375A7F;'>
          <tr>
            <th><center>NAME</center></th>
            <th><center>PLAYER ID</center></th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($GetClanMembersByIDs as $GetClanMembersByID) {
          echo "<tr>";
          if ($clanleader == $GetClanMembersByID['uid']) {
            echo "<td title='Clan Leader'><center>". $GetClanMembersByID['name']."&nbsp;&nbsp;";
             echo "<span class='glyphicon glyphicon-star-empty'></span>";
             echo "<center></td>";} else {
              echo "<td><center>".$GetClanMembersByID['name']."</center</td>";
             }
            echo "<td><center><a href='playerinfo.php?pid=".$GetClanMembersByID['uid']."'>".$GetClanMembersByID['uid']."</a></center</td>";
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
        <a href="clans.php"><button type="button" class="btn btn-default">RETURN</button></a>
      </div>
      </center>
    </div>
  </div>
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