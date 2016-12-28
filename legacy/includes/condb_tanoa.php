<?php

error_reporting( E_ALL & ~E_DEPRECATED & ~E_NOTICE );
ob_start();
session_start();

    function connectdb(){


        define('DB_DRV', 'mysql');
        define('DB_SRV', '149.202.223.160');
        define('DB_USR', 'atools');
        define('DB_PSW', 'CWVtkrFNTSrb');
        define('DB_DB', 'exile_tanoa');

        $dbopt = array(
        				PDO::ATTR_PERSISTENT => FALSE,
        				PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        				PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        				);

        $connectdb = new PDO(DB_DRV.':host='.DB_SRV.';dbname='.DB_DB, DB_USR, DB_PSW, $dbopt);
        return $connectdb;
    }

?>
