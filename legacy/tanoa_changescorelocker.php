<?php
    include_once 'includes\queries_tanoa.php';
    $uid=$_POST['uid'];
    $score=$_POST['score'];
	$locker=$_POST['locker'];
	UpdateScoreLocker($uid,$score,$locker);
    header("Location: tanoa_accounts.php");
?>
