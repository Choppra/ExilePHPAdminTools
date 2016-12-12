<?php
//MUST BE ON EVERY PAGE, I PUT IT HERE ASSUMING THAT YOU WILL HAVE THE MENU ON EVERY PAGE
//MUST BE WITH THE DATABASE FORM AS WELL
if(!isset($_SESSION['dbase'])){
//DATABASE1 SHOULD BE THE DEFAULT DATABASE WITH THE WEB ACCOUNT INFORMATION
$_SESSION['dbase'] = "ABRAMIA"; //default databse to load
}
if(isset($_GET['changedb'])){
$_SESSION['dbase'] = $_GET['changedb'];
header("Location: " . $_SERVER["PHP_SELF"]);
}
?>
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
                <li><a href="index.php">HOME</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">TOOLS<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="accounts.php">ACCOUNTS</a></li>
                        <li><a href="poptabs.php">POPTABS</a></li>
                        <div class="divider"></div>
                        <li><a href="territories.php">TERRITORY LIST</a></li>
                        <li><a href="deletedbases.php">TERRITORIES DELETED</a></li>
                        <li><a href="stolenbases.php">TERRITORIES STOLEN</a></li>
                        <div class="divider"></div>
                        <li><a href="dupers_trader.php">DUPERS CHECK (TRADER)</a></li>
                        <li><a href="dupers_waste.php">DUPERS CHECK (WASTE)</a></li>
                        <div class="divider"></div>
                        <li><a href="logs.php">SERVER LOGS</a></li>
                        <li><a href="rcon.php">VIEW & REMOVE BANS</a></li>
                    </ul>
                </li>
            </ul>
            <form action="playerinfo.php" method="post" class="navbar-form navbar-left">
                <div class="form-group">
                    <input name="pid" type="text" class="form-control" placeholder="Enter Player ID..." required>
                </div>
                <button type="submit" class="btn btn-success">SEARCH</button>
            </form>
            <!--FORM WITH THE DATABASE CHANGE, ADD IT TO MENUWITHSEARCH AS WELL-->
            <ul class="nav navbar-nav navbar-right" style="margin-top:8px;">
                <form>
                    <select name="changedb" class="form-control" onchange="this.form.submit()">
                        <option value="" selected="selected" disabled>ACTIVE: <?php echo $_SESSION['dbase'] ?></option>
                        <option value="ABRAMIA">ABRAMIA</option>
                        <option value="CHERNARUS">CHERNARUS</option>
                        <option value="TANOA">TANOA</option>
                    </select>
                </form>
            </ul>
            <!--END OF NEW CODE-->
            
        </div>
    </div>
</nav>
<script type="text/javascript">

function setValue() {

document.getElementById('changedb').value = "new value here";
}
</script>