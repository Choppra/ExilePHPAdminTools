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
    <form action="searchlogs.php" method="post">
      <div class="row">
        <div class="col-md-14">
          <center>
          <div class="input-group input-group-md col-md-2">
            <select name="days" class="form-control" required>
              <option value="" selected="selected" disabled>Select Range..</option>
              <option value="All">All days</option>
              <option value="1">1 day</option>
              <option value="2">2 days</option>
              <option value="3">3 days</option>
              <option value="4">4 days</option>
              <option value="5">5 days</option>
              <option value="6">6 days</option>
              <option value="7">1 week</option>
            </select>
            <input name="pid" type="hidden" class="form-control" value=<?php echo $PlayerInfo[0]['uid'];?>>
            <span class="input-group-btn">
              <button class="btn btn-default" type="submit" name="sea2">VIEW LOGS</button>
            </span>
          </div>
          <br>
          <div class="input-group input-group-md col-xs-10 col-sm-4 col-md-4">
          </div>
          </center>
        </div>
      </div>
    </form>
    <div style="height: 10px;">&nbsp;</div>
    <div class="col-md-12">
      <div class="row" style="margin-left: 600px; margin-right: 600px;">
        <h3 style='color: #375A7F;'> ACCOUNT INFORMATION </h3>
        <div class="table-responsive" id="table" style="maselecx-width:1200px; min-width:500px;" >
          <table class="table-bordered table table-hover table-condensed">
            <tbody>
              <col width="250px" />
              <tr>
                <th scope="row" >Player ID </p></th>
                <td><?php echo $PlayerInfo[0]['uid'];?></td>
              </tr>
              <tr>
                <th scope="row" >Clan ID </p></th>
                <?php echo "<td><a href='clanid.php?pid=".$PlayerInfo[0]['clan_id']."'>".$PlayerInfo[0]['clan_id']."</a></td>"; ?>
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
        <h3 style='color: #375A7F;'> TERRITORY INFORMATION </h3>
        <div class="table-responsive" id="table" style="maselecx-width:1200px; min-width:500px;" >
          <table class="table-bordered table table-hover table-condensed">
            <tbody>
              <col width="250px" />
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
        <a href="accounts.php"><button type="button" class="btn btn-default">RETURN</button></a>
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