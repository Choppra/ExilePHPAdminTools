<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/ExilePHPAdminTools/includes/queries.php";
include_once ($path);
$Territories=TerritoriesStolen();
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
      <h1><center>STOLEN TERRITORIES</center></h1>
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
      <table class=" table-bordered table table-hover table-striped" id="table" style="margin: auto;">
        <thead>
          <tr>
            <th><center>Owner Name</center></th>
            <th><center>Owner ID</center></th>
            <th><center>Territory Name</center></th>
            <th><center>Territory ID</center></th>
            <th><center>Stealer</center></th>
            <th><center>Stealer ID </center></th>
            <th><center>Stolen Date</center></th>
            <th><center>Action</center></th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($Territories as $Territory) {
          echo "<tr>";
            echo "<td><center>".$Territory['owner']."</center></td>";
            echo "<td><center><a href='playerinfo.php?pid=".$Territory['owner_uid']."'>".$Territory['owner_uid']."</a></center</td>";
            echo "<td><center>".$Territory['name']."<center></td>";
            echo "<td><center>".$Territory['id']."<center></td>";
            echo "<td><center>".$Territory['stealer']."<center></td>";
            echo "<td><center><a href='playerinfo.php?pid=".$Territory['stealer_id']."'>".$Territory['stealer_id']."</a></center</td>";
            echo "<td><center>".$Territory['flag_stolen_at']."<center></td>";
            echo "<td>";
              echo "<center>";
              echo "<a href='restoreterritorystolen.php?tid=".$Territory['id']."'  id='".$Territory['name']."' name='".$Territory['id']."' class='delete'><button class='btn btn-xs btn-success' type='button'><i class='fa fa-trash-o'></i>RESTORE</button></a>";
              echo "</center>";
            echo "</td>";
          echo "</tr>";
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
  <!-- Datatable End -->
  <div style="height: 10px;">&nbsp;</div>
</body>
</html>
<script type="text/javascript">
$(document).ready(function(){
$("a.delete").click(function(e){
var terName = jQuery(this).attr("id");
var terID = jQuery(this).attr("name");
if(!confirm('Do you really want to restore territory '+terName+' (ID:'+terID+') ?')){
e.preventDefault();
return false;
}
return true;
});
});
$( '#table' ).searchable();
</script>