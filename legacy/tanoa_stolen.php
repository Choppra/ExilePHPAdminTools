<?php
include_once 'includes\queries_tanoa.php';
$Territories=TerritoriesStolen();
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
    <script type="text/javascript">
    $(window).load(function(){
    $('#myModal').modal('show');
    });
    </script>
    <body>
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header alert-danger">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" align ="center">ATTENTION!</h4>
                    </div>
                    <div class="modal-body">
                        <br><br>
                        <h2><center>This is live data!<br>Pay Attention to what you are doing!</center></h2><br><p><center>Please make sure the coordinates are clear before restoring!</p></center>
                        <br><br>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
<!-- NAVBAR START -->
<?php $search = "True"; ?> <!-- True or False -->
<?php include('includes\navbar.php'); ?>
<!-- NAVBAR END -->
<!--- JUMBOTRON START-->
<div class="jumbotron" style="padding-top:10px; margin-top:-21px; ">
  <h1><center>TANOA</center></h1>
    <h4><center>STOLEN TERRITORIES</center></h4>
</div>
<!--- JUMBOTRON END-->
            <div>
                <div style="height: 10px;">&nbsp;</div>
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
                                echo "<td><center>".$Territory['owner_uid']."</center></td>";
                                echo "<td><center>".$Territory['name']."<center></td>";
                                echo "<td><center>".$Territory['id']."<center></td>";
                                echo "<td><center>".$Territory['stealer']."<center></td>";
                                echo "<td><center>".$Territory['stealer_id']."<center></td>";
                                echo "<td><center>".$Territory['flag_stolen_at']."<center></td>";
                                echo "<td>";
                                    echo "<center>";
                                    echo "<a href='tanoa_restorestolen.php?tid=".$Territory['id']."'  id='".$Territory['name']."' name='".$Territory['id']."' class='delete'><button class='btn btn-xs btn-success' type='button'><i class='fa fa-trash-o'></i>RESTORE</button></a>";
                                    echo "</center>";
                                echo "</td>";
                            echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
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