<?php
  $path = $_SERVER['DOCUMENT_ROOT'];
  $path .= "/includes/queries.php";
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
        <div class="row" style="margin-left: 500px; margin-right: 500px;">
          <div class=" table-responsive" id="table">
            <table class="table-bordered table table-striped table-condensed">
              <tbody>
                <tr>
                  <th scope="row">Total Poptabs</p></th>
                  <td>$ <?php echo number_format($Tabs[0]['totaltabs']);?></td>
                </tr>
                <tr>
                  <th scope="row">Construction</th>
                  <td><?php echo $Server[0]['count_construction'];?></td>
                </tr>
                <tr>
                  <th scope="row">Containers</p></th>
                  <td><?php echo $Server[0]['count_container'];?></td>
                </tr>
                <tr>
                  <th scope="row">Total Objects</p></th>
                  <td><?php echo (($Server[0]['count_container'])+($Server[0]['count_construction']));?></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
  <!-- Datatable End --> 		

      <div style="height: 10px;">&nbsp;</div>
    </body>
  </html>
<script type="text/javascript">
	$( '#table' ).searchable();
</script>

