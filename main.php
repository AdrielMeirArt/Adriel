<?php

namespace gm;


use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\Server;
use pocketmine\command\CommandSender;
use pocketmine\event\inventory\InventoryTransactionEvent;
use pocketmine\item\Item;
use pocketmine\block\Block;
use pocketmine\tile\Hopper;
use gm\WindowInventory;
use gm\WindowHolder;
use pocketmine\command\ConsoleCommandSender;
use pocketmine\Player;

class Main extends PluginBase implements Listener{
 public function onEnable(){
 $this->getServer()->getPluginManager()->registerEvents($this, $this);
 
}

  public function onCommand(CommandSender $sender, Command $cmd, $lbl, array $args){
  switch($cmd->getName()){
  	case "gm":
  $chest = new WindowInventory($sender, 27, "§eGamemodes &&");
  $sender->addWindow($chest);
  $noob = Item::get(57, 0, 1);
  $noob->setCustomName("§cCreative");
  $vipsemanal = Item::get(42, 0, 1);
  $vipsemanal->setCustomName("§cSobrevivencia");
  $viplord = Item::get(41, 0, 1);
  $viplord->setCustomName("§cAventura");
  $vip = Item::get(133, 0, 1);
  $vip->setCustomName("§bEspectador");
  $chest->setItem(1, $noob);
  $chest->setItem(5, $vip);
  $chest->setItem(3, $vipsemanal);
  $chest->setItem(7, $viplord);
   
}
}
  public function onClick(InventoryTransactionEvent $e){
  	
   $player = null;
   $trans = $e->getTransaction()->getTransactions();
   $intt = $e->getTransaction()->getInventories();
   foreach($trans as $t){
   foreach($intt as $inst){
  $inst = $inst->getHolder();
   if($inst instanceof Player){
     $pl = $inst;
}
}

 $trans = $t;
 $i = $trans->getTargetItem();
 $p = $inst;
  if($i->getId() == 57 && $i->getCustomName() == "§cCreative"){
  	 $e->setCancelled();
    $cmd = "gamemode 1";
    Server::getInstance()->getCommandMap()->dispatch($p, $cmd);
    $chest = new WindowInventory($p, 27, "§cGM");
    $p->removeWindow($chest);
   
}
    $trans = $t;
    $i = $trans->getTargetItem();
    $p = $inst;
    if($i->getId() == 42 && $i->getCustomName() == "§cSobrevivencia"){
     $e->setCancelled();
     $cmd = "gamemode 2";
     Server::getInstance()->getCommandMap()->dispatch($p, $cmd);
     $chest = new WindowInventory($p, 27, "§cGM");
     $p->removeWindow($chest);
     
}
  
   $trans = $t;
    $i = $trans->getTargetItem();
    $p = $inst;
    if($i->getId() == 41 && $i->getCustomName() == "§cAventura"){
     $e->setCancelled();
     $cmd = "gamemode 4";
     Server::getInstance()->getCommandMap()->dispatch($p, $cmd);
     $chest = new WindowInventory($p, 27, "§cWarps");
     $p->removeWindow($chest);
     
}

    $trans = $t;
    $i = $trans->getTargetItem();
    $p = $inst;
    if($i->getId() == 133 && $i->getCustomName() == "§cEspectador"){
     $e->setCancelled();
     $cmd = "gamemode 3";
     Server::getInstance()->getCommandMap()->dispatch($p, $cmd);
     $chest = new WindowInventory($p, 27, "§cGM");
     $p->removeWindow($chest);
     
}
  
   $trans = $t;
    $i = $trans->getTargetItem();
    $p = $inst;
    if($i->getId() == 264 && $i->getCustomName() == "§bVip"){
     $e->setCancelled();
     $cmd = "vip";
     Server::getInstance()->getCommandMap()->dispatch($p, $cmd);
     $chest = new WindowInventory($p, 27, "§cWarps");
     $p->removeWindow($chest);
     
     
}
}
}
}
