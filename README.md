This project is likely a little out of date due to the changes that occured while I quit developing for ARMA3/Exile.

# Exile PHP Admin Tools/Portal

# Introduction
I have no formal programming background.  This project originally started as a simple tool to be able to read logs and view server information.  As time went on I decided to expand.

# Prerequisites
* Knowledge of MySQL (Setting up Accounts and Creating Tables)
* Web server knowledge (how to set up, etc)
* server needs infistar

# Support
I will not provide support ANYWHERE except on the github page dedicated to this project.  If you have a suggestion or issue, please submit an issue on github.

# Notes
I have this setup for use with 3 servers.  You will need to modify condb.php and navbar.php.  I will not provide support on how to edit these files.  It should be self explanitory.

Once you modify the databases and database menu, I suggest running logout.php after making the changes.  It will close the current session and allow for the change to work.

# Requirements
* Infistar Log to Database Enabled
* Create Tables used by these tools (trader_log, trader_recycle_log)
```````````sql
CREATE TABLE `trader_log` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`playerid` VARCHAR(50) NULL DEFAULT NULL,
	`item_sold` VARCHAR(100) NULL DEFAULT NULL,
	`poptabs` INT(50) NULL DEFAULT NULL,
	`respect` VARCHAR(50) NULL DEFAULT NULL,
	`time_sold` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	INDEX `Index 1` (`id`),
	INDEX `Index 2` (`item_sold`),
	INDEX `Index 3` (`playerid`),
	INDEX `Index 5` (`time_sold`)
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
AUTO_INCREMENT=1
;

CREATE TABLE `trader_recycle_log` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`playerid` VARCHAR(50) NULL DEFAULT NULL,
	`item_sold` VARCHAR(100) NULL DEFAULT NULL,
	`poptabs` INT(50) NULL DEFAULT NULL,
	`respect` VARCHAR(50) NULL DEFAULT NULL,
	`transactionid` INT(100) NULL DEFAULT NULL,
	`vehicleclass` VARCHAR(50) NULL DEFAULT NULL,
	`soldvehicle` VARCHAR(50) NULL DEFAULT NULL,
	`time_sold` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	INDEX `Index 1` (`id`),
	INDEX `Index 2` (`item_sold`),
	INDEX `Index 3` (`playerid`),
	INDEX `Index 5` (`time_sold`)
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
AUTO_INCREMENT=1
;


```````````
* Exile.ini Updates (add the following)
```````````
[updateTraderRecycleLog]
SQL1_1 = INSERT INTO trader_recycle_log SET playerid = ?, item_sold = ?, poptabs = ?, respect = ?, vehicleclass = ?, transactionid = ?, soldvehicle = ?
Number of Inputs = 7
SQL1_INPUTS = 1,2,3,4,5,6,7

[updateTraderLog]
SQL1_1 = INSERT INTO trader_log SET playerid = ?, item_sold = ?, poptabs = ?, respect = ?
Number of Inputs = 4
SQL1_INPUTS = 1,2,3,4

```````````
* Exile Server PBO Ovewrites (see extras folder - remember to backup)
* MySQL Account with the following permissions (You can use root or a high privledged account but thats up to you)
	* Account - Select / Update
	* Clan - Select
	* Construction - Select / Update
	* Container - Select / Update
	* Infistar_Logs - Select
	* Territory - Select / Update
	* Trader_Log - Select
	* Trader_Recycle_log - Select

# Clean up Routines
Note:  I suggest running these clean up routines on server restart.  I have mine set to delete after 10 Days.

```````````sql
prerequisites
DELETE FROM exile_tanoa.infistar_logs WHERE exile_tanoa.infistar_logs.time < DATE_SUB(NOW(), INTERVAL 10 DAY);
DELETE FROM exile_tanoa.trader_log WHERE exile_tanoa.trader_log.time_sold < DATE_SUB(NOW(), INTERVAL 10 DAY);
DELETE FROM exile_tanoa.trader_recycle_log WHERE exile_tanoa.trader_recycle_log.time_sold < DATE_SUB(NOW(), INTERVAL 10 DAY);
```````````

![](http://i.imgur.com/AaZNH2C.png)
![](http://i.imgur.com/LYPa4lq.png)
![](http://i.imgur.com/wkei5I5.png)
![](http://i.imgur.com/cc7vaVg.png)
![](http://i.imgur.com/YnYhmAo.png)
![](http://i.imgur.com/2le0xLs.png)
![](http://i.imgur.com/70B57y6.png)
![](http://i.imgur.com/BAIo64r.png)
![](http://i.imgur.com/1BGMQQJ.png)
![](http://i.imgur.com/PycYMfS.png)
