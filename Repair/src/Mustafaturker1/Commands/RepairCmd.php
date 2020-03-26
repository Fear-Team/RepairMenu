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

namespace Mustafaturker1\Commands;

use Mustafaturker1\Main;
use Mustafaturker1\Menu\RepairMenu;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\plugin\Plugin;


class RepairCmd extends Command{

	
	public function __construct(Main $plugin) {
	parent::__construct("repair", "Elindeki itemi tamir edersin.");
	}
 //command
	public function execute(CommandSender $player, string $lbl, array $args) {
		$g = $player->getPlayer();
		//menu
		$g->sendForm(new RepairMenu($g));
	}
}