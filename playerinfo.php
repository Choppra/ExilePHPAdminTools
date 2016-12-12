<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/includes/queries.php";
include_once ($path);

if (count($_GET)) {
$pid=$_GET['pid'];
}else {
$pid=trim($_POST['pid']);
}
$playerinfo=PlayerInfo($pid);

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
  <h1><center><?php echo $playerinfo[0]['playername'];?></center></h1>
  <h3><center><?php echo $_SESSION['dbase'];?></center></h3>
</div>

<!--- JUMBOTRON END-->  
      <div style="height: 10px;">&nbsp;</div>

      <div class="col-md-12">

         <div class="row" style="margin-left: 500px; margin-right: 500px;">
          <div class=" table-responsive" id="table">
            <table class="table-bordered table table-striped table-condensed">
              <tbody>
                <tr>
                  <th scope="row">Player ID: </p></th>
                  <td><?php echo $playerinfo[0]['playerid'];?></td>
                </tr>
                <tr>
                  <th scope="row">Clan: </p></th>
                  <td><?php echo $playerinfo[0]['clanname'];?></td>
                </tr>
                <tr>
                  <th scope="row">Clan Leader: </p></th>
                  <td><?php echo $playerinfo[0]['clan_leader_uid'];?></td>
                </tr>
                <tr>
                  <th scope="row">Total Respect: </p></th>
                  <td><?php echo number_format($playerinfo[0]['respect'])?></td>
                </tr>
                <tr>
                  <th scope="row">Total Locker: </p></th>
                  <td>$ <?php echo number_format($playerinfo[0]['locker'])?></td>
                </tr>
                <tr>
                  <th scope="row">Total Poptabs: </p></th>
                  <td>$ <?php echo number_format(($playerinfo[0]['locker'])+($playerinfo[0]['container_money']));?></td>
                </tr>
                <tr>
                  <th scope="row">Total Connections: </p></th>
                  <td><?php echo $playerinfo[0]['total_connections'];?></td>
                </tr>
                <tr>
                  <th scope="row">Territory Name: </p></th>
                  <td><?php echo $playerinfo[0]['territoryname'];?></td>
                </tr>
                <tr>
                  <th scope="row">Territory Level: </p></th>
                  <td><?php echo $playerinfo[0]['level'];?></td>
                </tr>
                <tr>
                  <th scope="row">Territory Radius: </p></th>
                  <td><?php echo $playerinfo[0]['level'];?></td>
                </tr>
                <tr>
                  <th scope="row">Territory Last Paid: </p></th>
                  <td><?php echo $playerinfo[0]['last_paid_at'];?></td>
                </tr>
                <tr>
                  <th scope="row">Territory Prootection Due: </p></th>
                  <td><?php echo $playerinfo[0]['ProtectionDue'];?></td>
                </tr>
                <tr>
                  <th scope="row">Territory Construction Count: </p></th>
                  <td><?php echo $playerinfo[0]['construction_count'];?></td>
                </tr>
                <tr>
                  <th scope="row">Territory Container Count: </p></th>
                  <td><?php echo $playerinfo[0]['container_count'];?></td>
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