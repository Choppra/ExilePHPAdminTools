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
    <h1><center>VIEW & REMOVE BANS</center></h1>
    <h2><center>Coming Soon..</center></h2>
  </div>
  <div style="height: 10px;">&nbsp;</div>
  <!-- Jumbotron - End -->   

  <!-- Datatable Start --> 

  <!-- Datatable End -->    

      <div style="height: 10px;">&nbsp;</div>
    </body>
  </html>
<script type="text/javascript">
  $( '#table' ).searchable();
</script>

