<?php
    include_once 'includes\queries_tanoa.php';
    $Territories=Territories();
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
    <!-- NAVBAR START -->
    <?php $search = "True"; ?> <!-- True or False -->
    <?php include('includes\navbar.php'); ?>
    <!-- NAVBAR END -->
    <body>
        <!--- JUMBOTRON START-->
        <div class="jumbotron" style="padding-top:10px; margin-top:-21px; ">
            <h1><center>TANOA</center></h1>
            <h4><center>TERRITORY LIST</center></h4>
        </div>
        <!--- JUMBOTRON END-->
        <div>
            <div style="height: 10px;">&nbsp;</div>
            <div class=" table-responsive" style="max-width:1200px;  margin:auto;">
                <table class=" table-bordered table table-hover table-striped" id="table" style="margin: auto;">
                    <thead>
                        <tr>
                            <th><center>Territory ID</center></th>
                            <th><center>Territory Name</center></th>
                            <th><center>Owner</center></th>
                            <th><center>Owner ID</center></th>
                            <th><center>Level</center></th>
                            <th><center>Radius</center></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($Territories as $Territory) {
                        echo "<tr>";
                            echo "<td><center>".$Territory['id']."<center></td>";
                            echo "<td><center>".$Territory['name']."<center></td>";
                            echo "<td><center>".$Territory['playername']."</center></td>";
                            echo "<td><center>".$Territory['owner_uid']."</center></td>";
                            echo "<td><center>".$Territory['level']."<center></td>";
                            echo "<td><center>".$Territory['radius']."<center></td>";
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
    $( '#table' ).searchable();
</script>