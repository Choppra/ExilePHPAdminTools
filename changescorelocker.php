<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/ExilePHPAdminTools/includes/queries.php";
include_once ($path);
    $uid=$_POST['uid'];
    $score=$_POST['score'];
	$locker=$_POST['locker'];
	UpdateScoreLocker($uid,$score,$locker);
    header("Location: accounts.php");
?>
