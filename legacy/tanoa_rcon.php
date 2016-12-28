<?php
    require_once 'includes\arc.php';
    use \Nizarii\ARC;
    $rcon = new ARC('', '', 2304, [
        'sendHeartbeat' => true,
        'timeoutSec' => 2
    ]);
    if(isset($_POST['removeban'])){
        $banid = trim($_POST['banid']);
        $remove = $rcon ->removeBan(intval($banid));
        unset($_POST['removeban']);
        header("Location: tanoa_rcon.php");
    }
    $Banned = $rcon->getBansArray();
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
        <script src="js/jquery.searchable.js"></script>
        <title></title>
    </head>
    <body>
        <!-- NAVBAR START -->
<?php $search = "True"; ?> <!-- True or False -->
<?php include('includes\navbar.php'); ?>
    <body>
<!-- NAVBAR END -->
            <div class="jumbotron" style="padding-top:10px; margin-top: -21px;">
                
                <div style="height: 10px;">&nbsp;</div>
                <center>
                <h1>TANOA</h1>
                <h4>VIEW & REMOVE BANS</h4>
                </center>
            </div>
            <div>
                <div class=" table-responsive" style="max-width:1200px;  margin:auto;">
                    <table class=" table-bordered table table-hover table-striped" id="tabla" style="margin: auto;">
                        <thead>
                            <tr>
                                <th style="width:50px;"><center>Check</center></th>
                                <th style="width:50px;"><center>ID</center></th>
                                <th><center>GUID</center></th>
                                <th style="width:100px;"><center>Duration</center></th>
                                <th><center>Reason</center></th>
                                <th style="width:100px;"><center>Actions</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                                        $counter=0;
                            foreach ($Banned as $Ban) {
                                                            $counter=$counter+1;
                            echo "<tr>";
                                                                echo "<form method='post'>";
                                                                    echo "<td><center><input type='checkbox' value='' id='chbox".$counter."' onChange='enableTxTBx".$counter."()';></center></td>";
                                                                    echo "<td><center>".$Ban['0']."</center></td>";
                                                                    echo "<input type='hidden' value='".$Ban['0']."' name='banid' />";
                                                                    echo "<td><center>".$Ban['1']."</center></td>";
                                                                    echo "<td><center>".$Ban['2']."</center></td>";
                                                                    echo "<td><center>".$Ban['3']."</center></td>";
                                                                    echo "<td>";
                                                                        echo "<center>";
                                                                        echo "<button type='submit' id='bt".$counter."' class='btn btn-xs btn-danger' name='removeban' desc='".$Ban['0']."' disabled><i class='fa fa-search-plus'></i>REMOVE BAN</button>";
                                                                        echo "</center>";
                                                                    echo "</td>";
                                                                echo "</form>";
                            echo "</tr>";
                            ?>
                            <script type="text/javascript">
                            function enableTxTBx<?php echo $counter ?>(){
                            if (document.getElementById("chbox<?php echo $counter ?>").checked == true) {
                            document.getElementById("bt<?php echo $counter ?>").disabled='';
                            }else {
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
            </div>
        </body>
    </html>
    <script type="text/javascript">
        $( '#tabla' ).searchable();
        $(document).ready(function(){
            $("button.btn").click(function(e){
                var Bid = jQuery(this).attr("desc");
                if(!confirm('Do you really want to remove the BAN with ID: '+Bid+'?')){
                    e.preventDefault();
                    return false;
                }
                return true;
            });
        });
    </script>