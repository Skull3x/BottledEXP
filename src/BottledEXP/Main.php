<?php
namespace BottledEXP;
use pocketmine\utils\TextFormat;
use pocketmine\command\{Command, CommandSender, CommandExecutor, ConsoleCommandSender};
use pocketmine\{Server, Player};
use pocketmine\level\sound\{ExpPickupSound, ExplodeSound, ButtonClickSound};
use pocketmine\level\Level;
use pocketmine\permission\Permission;
use pocketmine\item\Item;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
class Main extends PluginBase implements Listener{
  
  public function onEnable(){
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
  }
  
  public function onCommand(Command $command, CommandSender $sender, $label, array $args){
    $n = $sender->getName();
    $l = $sender->getLevel();
    $exp = count($sender->getExpLevel());
    if(strtolower($command->getName() == "exp")) {
      switch(strtolower($args[0])) {
        case "bottle":
          if($sender->hasPermission("bottle.exp") && is_numeric($args[1]) && !$sender->isCreative()){
            $sender->getInventory()->addItem(Item::get(384, 0, $exp));
            $sender->sendMessage(TextFormat::YELLOW ."You have successfully bottled all of your ". TextFormat::GREEN ."EXP!");
          }
      }
    }
  }
}
