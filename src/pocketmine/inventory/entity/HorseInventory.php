<?php

/*
 *
 *  ____            _        _   __  __ _                  __  __ ____
 * |  _ \ ___   ___| | _____| |_|  \/  (_)_ __   ___      |  \/  |  _ \
 * | |_) / _ \ / __| |/ / _ \ __| |\/| | | '_ \ / _ \_____| |\/| | |_) |
 * |  __/ (_) | (__|   <  __/ |_| |  | | | | | |  __/_____| |  | |  __/
 * |_|   \___/ \___|_|\_\___|\__|_|  |_|_|_| |_|\___|     |_|  |_|_|
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * @author PocketMine Team
 * @link http://www.pocketmine.net/
 *
 *
*/

namespace pocketmine\inventory\entity;

use pocketmine\entity\Horse;
use pocketmine\inventory\ContainerInventory;
use pocketmine\inventory\InventoryHolder;
use pocketmine\inventory\InventoryType;
use pocketmine\Player;

class HorseInventory extends ContainerInventory {
	public function __construct(Horse $entity) {
		#parent::__construct(new EntityInventory($this, $entity), InventoryType::get(InventoryType::ENDER_CHEST));
		parent::__construct($entity, InventoryType::get(InventoryType::HORSE));
	}

	public function onOpen(Player $who) {
		$this->setContents($this->getHolder()->getInventory()->getContents());
		parent::onOpen($who);
	}

	/**
	 * @return Horse|InventoryHolder
	 */
	public function getHolder() {
		return $this->holder;
	}

	public function onClose(Player $who) {
		$this->getHolder()->getInventory()->setContents($this->getContents());
		parent::onClose($who);
	}
}
