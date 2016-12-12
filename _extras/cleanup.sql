#make sure you run something like this against your database... i do 14 days but you can do less..

DELETE FROM exile_cherno.infistar_logs WHERE exile_cherno.infistar_logs.time < DATE_SUB(NOW(), INTERVAL 14 DAY);
DELETE FROM exile_tanoa.infistar_logs WHERE exile_tanoa.infistar_logs.time < DATE_SUB(NOW(), INTERVAL 14 DAY);

DELETE FROM exile_cherno.trader_log WHERE exile_cherno.trader_log.time_sold < DATE_SUB(NOW(), INTERVAL 14 DAY);
DELETE FROM exile_tanoa.trader_log WHERE exile_tanoa.trader_log.time_sold < DATE_SUB(NOW(), INTERVAL 14 DAY);

DELETE FROM exile_cherno.trader_recycle_log WHERE exile_cherno.trader_recycle_log.time_sold < DATE_SUB(NOW(), INTERVAL 14 DAY);
DELETE FROM exile_tanoa.trader_recycle_log WHERE exile_tanoa.trader_recycle_log.time_sold < DATE_SUB(NOW(), INTERVAL 14 DAY);
