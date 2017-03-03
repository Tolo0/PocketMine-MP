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

namespace pocketmine\inventory;

use pocketmine\entity\Entity;
use pocketmine\entity\Horse;
use pocketmine\entity\Human;
use pocketmine\level\Level;
use pocketmine\level\Position;
use pocketmine\network\protocol\BlockEventPacket;
use pocketmine\Player;
use pocketmine\tile\Chest;
use pocketmine\tile\EnderChest;

class HorseInventory extends ContainerInventory {
	public function __construct(Entity $entity) {
		#parent::__construct(new EntityInventory($this, $entity), InventoryType::get(InventoryType::ENDER_CHEST));
		parent::__construct(null, InventoryType::get(InventoryType::CHEST));
	}

	/**
	 * @return Horse|InventoryHolder
	 */
	public function getHolder() {
		return $this->holder;
	}

	public function onOpen(Player $who) {
		$this->setContents($who->getEnderChestInventory()->getContents());
		parent::onOpen($who);

		if (count($this->getViewers()) === 1) {
			$pk = new BlockEventPacket();
			$pk->x = $this->getHolder()->getX();
			$pk->y = $this->getHolder()->getY();
			$pk->z = $this->getHolder()->getZ();
			$pk->case1 = 1;
			$pk->case2 = 2;
			if (($level = $this->getHolder()->getLevel()) instanceof Level) {
				$level->addChunkPacket($this->getHolder()->getX() >> 4, $this->getHolder()->getZ() >> 4, $pk);
			}
		}
	}

	public function onClose(Player $who) {
		$who->getEnderChestInventory()->setContents($this->getContents());
		if (count($this->getViewers()) === 1) {
			$pk = new BlockEventPacket();
			$pk->x = $this->getHolder()->getX();
			$pk->y = $this->getHolder()->getY();
			$pk->z = $this->getHolder()->getZ();
			$pk->case1 = 1;
			$pk->case2 = 0;
			if (($level = $this->getHolder()->getLevel()) instanceof Level) {
				$level->addChunkPacket($this->getHolder()->getX() >> 4, $this->getHolder()->getZ() >> 4, $pk);
			}
		}
		parent::onClose($who);
	}
}
