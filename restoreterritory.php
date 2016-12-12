<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/includes/queries.php";
include_once ($path);
$tid=$_GET['tid'];
$Rows=RestoreTerritory($tid);
?>
<!DOCTYPE html>
<html lang="en">
    <!DOCTYPE html>
    <?php include('header.php'); ?>
    <body>
        <!-- Navigation Bar Start -->
        <?php $search = "False"; ?> <!-- True or False -->
        <?php include('navbar.php'); ?>
        <!-- Navigation Bar End -->
        <!-- Jumbotron - Start -->
        <div class="jumbotron" style="padding-top:10px; margin-top:-21px; ">
            <h1><center>RESTORED TERRITORY ID: <?php echo $tid;?></center></h1>
            <h2><center><?php echo $_SESSION['dbase'];?></center></h2>
        </div>
        <div style="height: 10px;">&nbsp;</div>
        <!-- Jumbotron - End -->
        <center>
        <div class="" style="padding-top:10px; margin-top: -21px;">
            <h3 style="margin-left:40px;"><?php echo $Rows['U1'] ?> row(s) affected in Territory table</h3>
            <h3 style="margin-left:40px;"><?php echo $Rows['U2'] ?> row(s) affected in Container table</h3>
            <h3 style="margin-left:40px;"><?php echo $Rows['U3'] ?> row(s) affected in Construction table</h3>
        </div>
        </center>
        <br>
        <br>
        <center><a href='deletedbases.php'><button type='button' class='btn btn-default'>Return</button></a></center>
        <div style="height: 10px;">&nbsp;</div>
    </body>
</html>