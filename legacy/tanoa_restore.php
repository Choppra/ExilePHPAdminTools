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
                    <a class="navbar-brand">
                        <img style="max-width:100px; margin-top: -7px;"
                        src="/images/atd.png">
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="index.php">HOME</a></li>
                        <li class="" class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">TANOA<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="tanoa_accounts.php">ACCOUNTS</a></li>
                                <div class="divider"></div>
                                <li><a href="tanoa_territories.php">TERRITORY LIST</a></li>
                                <li><a href="tanoa_deleted.php">TERRITORIES DELETED</a></li>
                                <li><a href="tanoa_stolen.php">TERRITORIES STOLEN</a></li>
                                <div class="divider"></div>
                                <li><a href="tanoa_dupers_trader.php">DUPERS CHECK (TRADER)</a></li>
                                <li><a href="tanoa_dupers_waste.php">DUPERS CHECK (WASTE)</a></li>
                                <div class="divider"></div>
                                <li><a href="tanoa_logs.php">SERVER LOGS</a></li>
                                <li><a href="tanoa_rcon.php">VIEW & REMOVE BANS</a></li>
                            </ul>
                        </li>
                    </ul>
                    <form class="navbar-form navbar-left">
                        <div class="form-group" role="search">
                            <input id="search" type="text" class="form-control" placeholder="Search">
                        </div>
                    </form>
                </div>
                </div><!-- /.container-fluid -->
            </nav>
         <div class="jumbotron" style="padding-top:10px; margin-top: -21px;">
             <h3 style="margin-left:40px;"><?php echo $Rows['U1'] ?> row(s) affected in Territory table</h3>
             <h3 style="margin-left:40px;"><?php echo $Rows['U2'] ?> row(s) affected in Container table</h3>
             <h3 style="margin-left:40px;"><?php echo $Rows['U3'] ?> row(s) affected in Construction table</h3>
         </div>
         <center><a href='tanoa_deleted.php'><button type='button' class='btn btn-default'>Return</button></a></center>
     </body>
 </html>
