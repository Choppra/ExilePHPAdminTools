<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/ExilePHPAdminTools/includes/queries.php";
include_once ($path);
$Server=ServerInfo();
$Tabs=TotalPoptabs();
$Accounts=TotalAccounts();
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
        <div class=" table-responsive" style="max-width:800px;  margin:auto;">
      <table class="table borderless "" id="table" style="margin: auto;">
        <thead>
          <tr>
            <th style="width:250px;"><center><h3>$ <?php echo number_format($Tabs[0]['totaltabs']);?></h3></center></th>
            <th style="width:250px;"><center><h3><?php echo $Server[0]['count_construction'];?></a></h3></center></th>
            <th style="width:250px;"><center><h3><?php echo $Server[0]['count_container'];?></h3></center></th>
            <th style="width:250px;"><center><h3><?php echo (($Server[0]['count_container'])+($Server[0]['count_construction']));?></h3></center></th>
          </tr>
        </thead>
        <tbody>
          <th style="width:250px;"><center><h6>TOTAL POPTABS</h6></center></th>
          <th style="width:250px;"><center><h6>TOTAL CONSTRUCTION</h6></center></th>
          <th style="width:250px;"><center><h6>TOTAL CONTAINER</h6></center></th>
          <th style="width:250px;"><center><h6>TOTAL OBJECTS</h6></center></th>
        </tbody>
      </table>
    </div>
    <!-- Datatable End -->
    <!-- Footer Start -->
    <div style="height: 100px;">&nbsp;</div>
    <footer id="footer" class="container footer">
      <div class="copyright">
        <center>Copyright © 2017 <a href="http://www.atdgaming.com">ATD Gaming</a></center>
        <div style="height: 10px;">&nbsp;</div>
      </div>
    </footer>
    <!-- Footer End -->
  </body>
</html>
<script type="text/javascript">
  $( '#table' ).searchable();
</script>