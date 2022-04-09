<?php

namespace AraaCuteUwU\CommandSpy;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerCommandPreprocessEvent;
use AraaCuteUwU\CommandSpy\Main;

class EventListener implements Listener {
	public $plugin;
	
	public function __construct(Main $plugin) {
		$this->plugin = $plugin;
	}

	public function getPlugin() {
		return $this->plugin;
	}
	
	public function onPlayerCmd(PlayerCommandPreprocessEvent $event) {
		$sender = $event->getPlayer();
		$msg = $event->getMessage();
		
		if($this->getPlugin()->cfg->get("console") == "true") {
			if($msg[0] == "/") {
				$this->getPlugin()->getLogger()->info(str_replace(["{player}", "{msg}"], [$sender->getName(), $msg], $this->getPlugin()->cfg->get("format-spy")));
			}
		}
			
			if(!empty($this->getPlugin()->snoopers)) {
				foreach($this->getPlugin()->snoopers as $snooper) {
					 if($msg[0] == "/") {
						$this->getPlugin()->getLogger()->info(str_replace(["{player}", "{msg}"], [$sender->getName(), $msg], $this->getPlugin()->cfg->get("format-spy")));
					}
				}
			}
		}
	}