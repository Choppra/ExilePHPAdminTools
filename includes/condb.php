<?php
        error_reporting( E_ALL & ~E_DEPRECATED & ~E_NOTICE );
        ob_start();
        session_start();

        switch ($_SESSION['dbase']) {
        case "ABRAMIA":
        function connectdb(){
                define('DB_DRV', 'mysql');
                define('DB_SRV', 'localhost');
                define('DB_USR', 'atools');
                define('DB_PSW', 'atools');
                define('DB_DB', 'exile_abramia');

                $dbopt = array(
                                PDO::ATTR_PERSISTENT => FALSE,
                                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                                );

                $connectdb = new PDO(DB_DRV.':host='.DB_SRV.';dbname='.DB_DB, DB_USR, DB_PSW, $dbopt);
                return $connectdb;
               
            }
             break;
        case "CHERNARUS":
        function connectdb(){
                define('DB_DRV', 'mysql');
                define('DB_SRV', 'localhost');
                define('DB_USR', 'atools');
                define('DB_PSW', 'atools');
                define('DB_DB', 'exile_cherno');

                $dbopt = array(
                                PDO::ATTR_PERSISTENT => FALSE,
                                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                                );

                $connectdb = new PDO(DB_DRV.':host='.DB_SRV.';dbname='.DB_DB, DB_USR, DB_PSW, $dbopt);
                return $connectdb;
                
            }
        break;
        case "TANOA":
        function connectdb(){
                define('DB_DRV', 'mysql');
                define('DB_SRV', 'localhost');
                define('DB_USR', 'atools');
                define('DB_PSW', 'atools');
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
             break;
        default:
             function connectdb(){
                define('DB_DRV', 'mysql');
                define('DB_SRV', 'localhost');
                define('DB_USR', 'atools');
                define('DB_PSW', 'atools');
                define('DB_DB', 'exile_abramia');

                $dbopt = array(
                                PDO::ATTR_PERSISTENT => FALSE,
                                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                                );

                $connectdb = new PDO(DB_DRV.':host='.DB_SRV.';dbname='.DB_DB, DB_USR, DB_PSW, $dbopt);
                return $connectdb;
                
            }
            break;
}

// if ($_SESSION['dbase']=="" || $_SESSION['dbase']=="ABRAMIA") {//DEFAULT DATABASE (Where you have web accounts)-----------------------------
//     function connectdb(){
//         define('DB_DRV', 'mysql');
//         define('DB_SRV', 'localhost');
//         define('DB_USR', 'atools');
//         define('DB_PSW', 'atools');
//         define('DB_DB', 'exile_abramia');

//         $dbopt = array(
//                         PDO::ATTR_PERSISTENT => FALSE,
//                         PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
//                         PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
//                         PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
//                         );

//         $connectdb = new PDO(DB_DRV.':host='.DB_SRV.';dbname='.DB_DB, DB_USR, DB_PSW, $dbopt);
//         return $connectdb;
//     }
// }elseif ($_SESSION['dbase']=="CHERNARUS") {//ANOTHER DATABASE-----------------------------
//     function connectdb(){
//         define('DB_DRV', 'mysql');
//         define('DB_SRV', 'localhost');
//         define('DB_USR', 'atools');
//         define('DB_PSW', 'atools');
//         define('DB_DB', 'exile_cherno');

//         $dbopt = array(
//                         PDO::ATTR_PERSISTENT => FALSE,
//                         PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
//                         PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
//                         PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
//                         );

//         $connectdb = new PDO(DB_DRV.':host='.DB_SRV.';dbname='.DB_DB, DB_USR, DB_PSW, $dbopt);
//         return $connectdb;
//     } 
// }


?>

