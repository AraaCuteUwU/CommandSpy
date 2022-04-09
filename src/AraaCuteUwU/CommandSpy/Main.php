<?php

namespace AraaCuteUwU\CommandSpy;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\player\Player;

class Main extends PluginBase {
	public $snoopers = [];
	
	public function onEnable(): void {
		$this->saveResource("config.yml");
		$this->getLogger()->info("Plugin Enable");
		$this->getServer()->getPluginManager()->registerEvents(new EventListener($this), $this);
		$this->cfg = new Config($this->getDataFolder() . "config.yml", Config::YAML, array());
	}
	
	 public function onCommand(CommandSender $sender, Command $command, string $label, array $args) : bool {			
		if($command->getName() == "commandspy"){
		 	if($sender instanceof Player) {
				if($sender->hasPermission("commandspy.use")) {
					if(!isset($this->snoopers[$sender->getName()])) {
						$sender->sendMessage($this->cfg->get("confirmspy"));
						$this->snoopers[$sender->getName()] = $sender;
						return true;
					} else {
						$sender->sendMessage($this->cfg->get("stopspy"));
						unset($this->snoopers[$sender->getName()]);
						return true;
						}
				} else {
       						$sender->sendMessage($this->cfg->get("ingame-only"));
       						return true;
					}
				}
			}
		return true;
	 }
}
