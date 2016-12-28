/*
	ExileServer_system_trading_network_wasteDumpRequest
*/
_this spawn {
private["_soldVehicle","_transactionID","_sessionID","_parameters","_vehicleNetID","_mode","_fnc_network_send","_vehicleObject","_playerObject","_cargo","_revenue","_playerMoney","_respectGain","_playerRespect","_traderLog"];
_sessionID = _this select 0;
_parameters = _this select 1;
_vehicleNetID = _parameters select 0;
_mode = _parameters select 1;
_fnc_network_send = {[_this select 0, "wasteDumpResponse", [_this select 1, 0, ""]] call call ExileServer_system_network_send_to;};

_vehicleObject = objectFromNetId _vehicleNetID;
if(isNull _vehicleObject)exitWith{[_sessionID, 6] call _fnc_network_send;};
_mutexvarname = format["ExileMutex_%1",netId _vehicleObject];
if(missionNameSpace getVariable [_mutexvarname,false])exitWith{[_sessionID,12] call _fnc_network_send;};
missionNameSpace setVariable [_mutexvarname,true];

_playerObject = _sessionID call ExileServer_system_session_getPlayerObject;
if(isNull _playerObject)exitWith{[_sessionID, 1] call _fnc_network_send;};
if!(alive _playerObject)exitWith{[_sessionID, 2] call _fnc_network_send;};
if!((owner _vehicleObject) isEqualTo (owner _playerObject))exitWith{[_sessionID, 6] call _fnc_network_send;};

_class = typeOf _vehicleObject;
_cargo = _vehicleObject call ExileClient_util_containerCargo_list;
_revenue = _cargo call ExileClient_util_gear_calculateTotalSellPrice;
clearBackpackCargoGlobal _vehicleObject;
clearItemCargoGlobal _vehicleObject;
clearMagazineCargoGlobal _vehicleObject;
clearWeaponCargoGlobal _vehicleObject;

_deleted = false;
if(_mode isEqualTo 2)then
{
	_revenue = _revenue + ([(typeOf _vehicleObject)] call ExileClient_util_gear_calculateTotalSellPrice);
	_vehicleObject call ExileServer_object_vehicle_remove;
	_vehicleObject setPos [0,0,0];
	_vehicleObject setDamage 1;
	deleteVehicle _vehicleObject;
	_deleted = true;
	_soldVehicle = "Yes";
}
else 
{
	_vehicleObject call ExileServer_object_vehicle_database_update;
	_soldVehicle = "No";
};
_playerMoney = _playerObject getVariable ["ExileMoney", 0];
_playerMoney = _playerMoney + _revenue;
_playerObject setVariable ["ExileMoney", _playerMoney, true];
format["setPlayerMoney:%1:%2", _playerMoney, _playerObject getVariable ["ExileDatabaseID", 0]] call ExileServer_system_database_query_fireAndForget;
_respectGain = _revenue * getNumber (configFile >> "CfgSettings" >> "Respect" >> "tradingRespectFactor");
_playerRespect = _playerObject getVariable ["ExileScore", 0];
_playerRespect = floor (_playerRespect + _respectGain);
_playerObject setVariable ["ExileScore", _playerRespect];
format["setAccountScore:%1:%2", _playerRespect, (getPlayerUID _playerObject)] call ExileServer_system_database_query_fireAndForget;
[_sessionID, "wasteDumpResponse", [0, _revenue, str _playerRespect]] call ExileServer_system_network_send_to;

_traderLog = format ["PLAYER: ( %1 ) %2 SOLD ITEM: %3 (ID# %4) with Cargo %5 FOR %6 POPTABS AND %7 RESPECT | PLAYER TOTAL MONEY: %8",getPlayerUID _playerObject,_playerObject,_class,_vehicleNetID,_cargo,_revenue,_respectGain,_playerMoney];
["A3_EXILE_RECYCLELOG",_traderLog] call FNC_A3_CUSTOMLOG;
	_transactionID = (round (random 50000)) + (round (random 45000));
	{
	 	format["updateTraderRecycleLog:%1:%2:%3:%4:%5:%6:%7", (getPlayerUID _playerObject), _x, _revenue, _respectGain, typeOf _vehicleObject, _transactionID,_soldVehicle] call ExileServer_system_database_query_fireAndForget;
	} 
	forEach _cargo;

if(_deleted)then
{
	missionNameSpace setVariable [_mutexvarname,nil];
	if(!isNull _vehicleObject)then
	{
		_vehicleObject setPos [0,0,0];
		_vehicleObject setDamage 1;
		deleteVehicle _vehicleObject;
	};
}
else
{
	missionNameSpace setVariable [_mutexvarname,false];
};
};
true