<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/ExilePHPAdminTools/includes/queries.php";
include_once ($path);
$lognames=UniqueLognames();
?>
<!DOCTYPE html>
<?php include('header.php'); ?>
<html>
  <body>
    <!-- Navigation Bar Start -->
    <?php $search = "False"; ?> <!-- True or False -->
    <?php include('navbar.php'); ?>
    <!-- Navigation Bar End -->
    <!-- Jumbotron - Start -->
    <div class="jumbotron" style="padding-top:10px; margin-top:-21px; ">
      <h1><center>SERVER INFORMATION</center></h1>
      <h2><center><?php echo $_SESSION['dbase'];?></center></h2>
    </div>
    <div style="height: 10px;">&nbsp;</div>
    <!-- Jumbotron - End -->
    <!-- Datatable Start -->
    <form action="searchid.php" method="post">
      <div class="row">
        <div class="col-md-12">
          <center>
          <div class="input-group input-group-md col-xs-10 col-sm-4 col-md-4">
            <input name="pname" type="text" class="form-control" placeholder="Enter Player Name to find Player ID..." required autofocus>
            <span class="input-group-btn">
              <button class="btn btn-default" type="submit" name="sea1">SEARCH</button>
            </span>
          </div>
          </center>
        </div>
      </div>
    </form>
    <br>
    <div>
      <h3><dt><center>Search by Player ID<center></dt></h3>
    </div>
    <form action="searchlogs.php" method="post">
      <div class="row">
        <div class="col-md-12">
          <center>
          <div class="input-group input-group-md col-xs-10 col-sm-4 col-md-4">
            <input name="pid" type="text" class="form-control" placeholder="Enter Player ID..." required>
            <span class="input-group-btn">
              <button class="btn btn-default" type="submit" name="sea2">SEARCH</button>
            </span>
          </div>
          <br>
          <div class="input-group input-group-md col-xs-10 col-sm-4 col-md-4">
            <select name="days" class="form-control" required>
              <option value="" selected="selected" disabled>Select range of days to search</option>
              <option value="All">All days</option>
              <option value="1">1 day</option>
              <option value="2">2 days</option>
              <option value="3">3 days</option>
              <option value="4">4 days</option>
              <option value="5">5 days</option>
              <option value="6">6 days</option>
              <option value="7">1 week</option>
            </select>
          </div>
          </center>
        </div>
      </div>
    </form>
    <br>
    <div>
      <h3><dt><center>Search by Logname<center></dt></h3>
    </div>
    <form action="viewlogs.php" method="post">
      <div class="row">
        <div class="col-md-12">
          <center>
          <div class="input-group input-group-md col-xs-10 col-sm-4 col-md-4">
            <select name="logname" class="form-control" required>
              <option value="" selected="selected" disabled>Select Logname</option>
              <?php
              foreach ($lognames as $logname) {
              echo '<option value="'.$logname[logname].'">'.$logname[logname].'</option>';
              }
              ?>
            </select>
          </div>
          <br>
          <div class="input-group input-group-md col-xs-10 col-sm-4 col-md-4">
            <select name="days2" class="form-control" required>
              <option value="" selected="selected" disabled>Select range of days to search</option>
              <option value="All">All days</option>
              <option value="1">1 day</option>
              <option value="2">2 days</option>
              <option value="3">3 days</option>
              <option value="4">4 days</option>
              <option value="5">5 days</option>
              <option value="6">6 days</option>
              <option value="7">1 week</option>
            </select>
          </div>
          <br>
          <div>
            <button type="submit" class="btn btn-default" name="regit">VIEW</button>
          </div>
          </center>
        </div>
      </div>
    </form>
    <!-- Datatable End -->
    <div style="height: 10px;">&nbsp;</div>
  </body>
</html>
<script type="text/javascript">
  $( '#table' ).searchable();
</script>