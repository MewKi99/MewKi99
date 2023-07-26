<?php

namespace jic;

use pocketmine\plugin\PluginBase;

use pocketmine\Server;
use pocketmine\player\Player;

#commands
use pocketmine\command\CommandSender;
use pocketmine\command\Command;

use pocketmine\utils\TextFormat as tf;
use pocketmine\event\Listener;

#forms
use jic\Forms\SimpleForm;
use jic\Forms\FormUI;
use jic\Forms\Form;

class main extends PluginBase implements Listener {

    public function onEnable() : void {
        $this->getLogger()->info(tf::GREEN. "Enable Tutorial");
    }

    public function onLoad() : void {
        @mkdir($this->getDataFolder());
        $this->saveDefaultConfig();
        $this->getResource("config.yml");
    }

    public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args) : Bool {
        if($cmd->getName() === "test") {
            if($sender instanceof Player) {
                $this->test($sender);
            } else {
                $sender->sendMessage(tf::RED. "In-Game");
            }
            return true;
        }
    }

    public function test($sender) : void {
        $form = new SimpleForm(function(Player $sender, $data){
            if($data === null){
                return true;
            }
            switch($data){
                case 0:

                break;
            }
        });
        $form->setTitle($this->getConfig()->get("title"));
        $form->setContent($this->getConfig()->get("content"));
        $form->addButton($this->getConfig()->get("button"));
        $form->sendToPlayer($sender);
    }
}