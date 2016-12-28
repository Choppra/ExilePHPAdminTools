<?php
    include_once 'includes\queries_tanoa.php';
    $tid=$_GET['tid'];
    $Rows=RestoreTerritory($tid);
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
         <nav class="navbar navbar-default">
             <div class="container-fluid">
                 <div class="navbar-header">
                     <a class="navbar-brand" href="index.php">
                         STOLEN TERRITORY RESTORED
                     </a>
                 </div>

             </div>
         </nav>
         <div class="jumbotron" style="padding-top:10px;">
             <h3 style="margin-left:40px;"><?php echo $Rows['U1'] ?> row(s) affected in Territory table</h3>
             <h3 style="margin-left:40px;"><?php echo $Rows['U2'] ?> row(s) affected in Container table</h3>
             <h3 style="margin-left:40px;"><?php echo $Rows['U3'] ?> row(s) affected in Construction table</h3>
         </div>
         <center><a href='tanoa_deleted.php'><button type='button' class='btn btn-default'>Return</button></a></center>
     </body>
 </html>
