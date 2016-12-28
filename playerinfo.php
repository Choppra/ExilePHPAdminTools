<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/ExilePHPAdminTools/includes/queries.php";
include_once ($path);
if (count($_GET)) {
$pid=$_GET['pid'];
}else {
$pid=trim($_POST['pid']);
}
$PlayerInfo = PlayerInfo($pid);
$TerritoryPlayerInfo = TerritoryPlayerInfo($pid);
$TerritoryInfobyID = TerritoryInfobyID($pid);
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
      <h1><center><?php echo $PlayerInfo[0]['name'];?></center></h1>
      <h3><center><?php echo $_SESSION['dbase'];?></center></h3>
    </div>
    <!--- JUMBOTRON END-->
    <div style="height: 10px;">&nbsp;</div>
    <div class="col-md-12">
      <div class="row" style="margin-left: 500px; margin-right: 500px;">
        <h3> ACCOUNT INFORMATION </h3>
        <div class="table-responsive" id="table" style="maselecx-width:1200px; min-width:500px;" >
          <table class="table-bordered table table-striped table-condensed">
            <tbody>
              <col width="400px" />
              <tr>
                <th scope="row">Player ID </p></th>
                <td><?php echo $PlayerInfo[0]['uid'];?></td>
              </tr>
              <tr>
                <th scope="row">Respect </p></th>
                <td><?php echo number_format($PlayerInfo[0]['score']);?></td>
              </tr>
              <tr>
                <th scope="row">Locker </p></th>
                <td><?php echo number_format($PlayerInfo[0]['locker']);?></td>
              </tr>
              <tr>
                <th scope="row">Total Money (w/Containers) </p></th>
                <td><?php echo number_format($PlayerInfo[0]['locker']+$TerritoryInfobyID[0]['container_money']);?></td>
              </tr>
              <tr>
                <th scope="row">First Connection </p></th>
                <td><?php echo $PlayerInfo[0]['first_connect_at'];?></td>
              </tr>
              <tr>
                <th scope="row">Last Connection </p></th>
                <td><?php echo $PlayerInfo[0]['last_connect_at'];?></td>
              </tr>
              <tr>
                <th scope="row">Last Disconnect </p></th>
                <td><?php echo $PlayerInfo[0]['last_disconnect_at'];?></td>
              </tr>
              <tr>
                <th scope="row">Total Connections</p></th>
                <td><?php echo number_format($PlayerInfo[0]['total_connections']);?></td>
              </tr>
            </tbody>
          </table>
        </div>
        <h3> TERRITORY INFORMATION </h3>
        <div class="table-responsive" id="table" style="maselecx-width:1200px; min-width:500px;" >
          <table class="table-bordered table table-striped table-condensed">
            <tbody>
              <col width="400px" />
              <tr>
                <th scope="row">Territory ID </p></th>
                <td><?php echo $TerritoryPlayerInfo[0]['id'];?></td>
              </tr>
              <tr>
                <th scope="row">Territory Name </p></th>
                <td><?php echo $TerritoryPlayerInfo[0]['name'];?></td>
              </tr>
              <tr>
                <th scope="row">Level: </p></th>
                <td><?php echo $TerritoryPlayerInfo[0]['level'];?></td>
              </tr>
              <tr>
                <th scope="row">First Connection </p></th>
                <td><?php echo $TerritoryPlayerInfo[0]['radius'];?></td>
              </tr>
              <tr>
                <th scope="row">Protection Due </p></th>
                <td><?php echo $TerritoryPlayerInfo[0]['ProtectionDue'];?></td>
              </tr>
              <tr>
                <th scope="row">Total Objects </p></th>
                <td><?php echo number_format($TerritoryInfobyID[0]['container_count']+$TerritoryInfobyID[0]['construction_count']);?></td>
              </tr>
              <tr>
                <th scope="row">Total Container Money </p></th>
                <td><?php echo number_format($TerritoryInfobyID[0]['container_money']);?></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <br>
    <div class="col-md-12">
      <center>
      <div>
        &nbsp;
        &nbsp;
        <a href="accounts.php"><button type="button" class="btn btn-default">RETURN</button></a>
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