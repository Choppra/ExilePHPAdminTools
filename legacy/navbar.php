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
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">TANOA<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="tanoa_accounts.php">ACCOUNTS</a></li>
                        <li><a href="tanoa_poptabs.php">POPTABS</a></li>
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
            <form class="navbar-form navbar-left" <?php if ($search == "False" ) {echo 'hidden="true"';}?>>
                <div class="form-group" role="search">
                    <input id="search" type="text" class="form-control" placeholder="Search">
                </div>
            </form>
        </div>
    </div>
</nav>

