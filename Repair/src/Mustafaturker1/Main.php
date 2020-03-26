<?php

/**
*
* __  __           _         __   _______         _            __
*|  \/  |         | |       / _| |__   __|       | |          /_ |
*| \  / |_   _ ___| |_ __ _| |_ __ _| |_   _ _ __| | _____ _ __| |
*| |\/| | | | / __| __/ _` |  _/ _` | | | | | '__| |/ / _ \ '__| |
*| |  | | |_| \__ \ || (_| | || (_| | | |_| | |  |   <  __/ |  | |
*|_|  |_|\__,_|___/\__\__,_|_| \__,_|_|\__,_|_|  |_|\_\___|_|  |_| |
*
*
* Bu eklenti Mustafa Türker tarafınca kodlanmıştır. İzinsiz kullanılması, paylaşılması, satılması yasaktır.
*
*@version 2.0
*@author Mustafaturker1
*@copyright TURKER Medya || 2018 - 2020
*
*/

namespace Mustafaturker1;

use Mustafaturker1\Commands\RepairCmd;
use Mustafaturker1\Menu\RepairMenu;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;

class Main extends PluginBase implements Listener{

public function onEnable(){
	//enable
 $this->getServer()->getPluginManager()->registerEvents($this, $this);
 //komut
 $this->getServer()->getCommandMap()->register("repair", new RepairCmd($this));

}

}


?>