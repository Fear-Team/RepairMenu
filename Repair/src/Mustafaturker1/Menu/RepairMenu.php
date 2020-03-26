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

namespace Mustafaturker1\Menu;

use pocketmine\Player;
use pocketmine\Server;
use pocketmine\item\Item;
use Mustafaturker1\Main;
use Mustafaturker1\Commands\RepairCmd;
use dktapps\pmforms\ModalForm;
use onebone\economyapi\EconomyAPI;

class RepairMenu extends ModalForm{

    public function __construct(Player $player){

   $para = EconomyAPI::getInstance()->myMoney($player);

   $this->para = $para;

        $esya = $player->getInventory()->getItemInHand();

        $player->getInventory()->setItemInHand($esya);

        $eisim = $esya->getName();

        $esya->getDamage();

        $epara = $esya->getDamage() * 6;

        $this->epara = $epara;
        
        parent::__construct(
            "Tamir",
            "§7Mevcut Paran: §b$para\n\n§7Elindeki Alet: §b$eisim\n\n§7Tamir edebilmek için §e$epara TL §7Gerekli."
            ,
            function (Player $player, bool $choice): void{
                if($choice == true){
                    if ($this->para >= $this->epara){
                        $esya = $player->getInventory()->getItemInHand();
                      $player->getInventory()->setItemInHand($esya->setDamage(0));
                        EconomyAPI::getInstance()->reduceMoney($player, $this->epara);
                        $player->sendMessage("§eBaşarıyla §7". $esya->getName() . "§e Tamir edildi");
                    }else{
                        $player->sendMessage("Tamir işlemi için paran yetersiz!");
                    }

                }elseif($choice == false){
              $player->sendMessage("§7işlemi iptal ettin");
                    return;
                }
            },
            "§aTAMIR ET",
            "§4IPTAL ET"
        );
    }
}
