<?php
namespace StickPower;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\utils\TextFormat;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\entity;
class Main extends PluginBase implements Listener{
public function onEnable()
{
if(!file_exists($this->getDataFolder() . "config.yml")) {
            @mkdir($this->getDataFolder());
             file_put_contents($this->getDataFolder() . "config.yml",$this->getResource("config.yml"));
        }$this->getServer()->getLogger()->info(TextFormat::BLUE."[StickPower]Plugin Enabled!");
$this->getServer()->getPluginManager()->registerEvents($this,$this);
}

public function onHurt(EntityDamageEvent $event){
if($event instanceof EntityDamageByEntityEvent){
if($event->getDamager()->getInventory()->getItemInHand()->getId() === 280){
				$event->getEntity()->getKnockBack($this->getConfig()->get("KnockBack-Power"));
    }
   }
  }
}
