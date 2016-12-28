<?php
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/includes/queries_tanoa.php";
   include_once($path);
    $Accounts=AllAccounts();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="//assets.codepen.io/assets/common/stopExecutionOnTimeout-53beeb1a007ec32040abaf4c9385ebfc.js"></script>
    <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/components/core.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/md5.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/components/lib-typedarrays.js'></script>
    <script src='https://peterolson.github.com/BigInteger.js/BigInteger.min.js'></script>
    <script src="js/jquery.searchable.js"></script>
    <title></title>
    </head>
<!-- NAVBAR START -->
<?php $search = "True"; ?> <!-- True or False -->
<?php include('navbar.php'); ?>
<!-- NAVBAR END -->
<body>
<!--- JUMBOTRON START-->
<div class="jumbotron" style="padding-top:10px; margin-top:-21px; ">
  <h1><center>TANOA</center></h1>
    <h4><center>ACCOUNTS</center></h4>
</div>
<!--- JUMBOTRON END-->
<div style="height: 10px;">&nbsp;</div>
            <div>

                <div class=" table-responsive" style="max-width:1600px;  margin:auto;">
                    <table class=" table-bordered table table-hover table-striped" id="tabla" style="margin: auto;">
                        <thead>
                            <tr>
                <th style="width:10px;"><center>Check</center></th>
                <th><center>Player Name</center></th>
                <th><center>Player ID</center></th>
                <th><center>GUID</center></th>
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
              $prueba="";
                            foreach ($Accounts as $Account) {
                $counter=$counter+1;
                                echo "<tr>";
                echo "<form action='tanoa_ChangeScoreLocker.php' method='post'>";
                echo "<td><center><input type='checkbox' value='' id='chbox".$counter."' onChange='enableTxTBx".$counter."()';></center></td>";
                echo "<td><center>".$Account['name']."</center></td>";
                echo "<input type='hidden' class='none0".$counter."'  id='Theinput".$counter."' DataUID='".$Account['uid']."' value='".$Account['uid']."' name='uid'  />";
                echo "<td><center>".$Account['uid']."</center></td>";
                echo "<td><center id=col".$counter."></center></td>";
                ?>
                <script>
                  $("input.none0<?php echo $counter ?>").ready(function() {
                    var TheUID = jQuery('#Theinput<?php echo $counter ?>').attr("DataUID");
                    if (!TheUID) {
                      return;
                    }
                    var steamId = bigInt(TheUID);
                    var parts = [
                      66,
                      69,
                      0,
                      0,
                      0,
                      0,
                      0,
                      0,
                      0,
                      0
                    ];
                    for (var i = 2; i < 10; i++) {
                      if (window.CP.shouldStopExecution(1)) {
                        break;
                      }
                      var res = steamId.divmod(256);
                      steamId = res.quotient;
                      parts[i] = res.remainder.toJSNumber();
                    }
                    window.CP.exitedLoop(1);
                    var wordArray = CryptoJS.lib.WordArray.create(new Uint8Array(parts));
                    var hash = CryptoJS.MD5(wordArray);
                    var toPass = hash.toString();
                    var TheTD = document.getElementById('col<?php echo $counter ?>');
                    TheTD.innerHTML = toPass;

                  });
                </script>
                <?php
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
                };
              </script>
              <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
  </body>
</html>
<script type="text/javascript">
  $( '#tabla' ).searchable();
  $(document).ready(function(){
    $("button.btn").click(function(e){
      var Pname = jQuery(this).attr("name");
      if(!confirm('Do you really want to update score and locker values to the player: '+Pname+'?')){
        e.preventDefault();
        return false;
      }
      return true;
    });
  });
</script>
