<?php
namespace pocketmine\entity;

use pocketmine\inventory\entity\HorseInventory;
use pocketmine\inventory\Inventory;
use pocketmine\inventory\InventoryHolder;
use pocketmine\item\Item as ItemItem;
use pocketmine\nbt\tag\StringTag;
use pocketmine\network\protocol\AddEntityPacket;
use pocketmine\Player;
use pocketmine\tile\Nameable;

class Horse extends Animal implements Rideable, InventoryHolder, Tameable, Nameable {
	const NETWORK_ID = 23;

	public $width = 0.75;
	public $height = 1.562;
	public $lenght = 1.5;//TODO

	protected $exp_min = 1;
	protected $exp_max = 3;//TODO
	protected $maxHealth = 10;//TODO
	/** @var HorseInventory $inventory */
	private $inventory;

	public function initEntity() {
		$this->inventory = new HorseInventory($this);
		parent::initEntity();
	}

	public function spawnTo(Player $player) {
		$pk = new AddEntityPacket();
		$pk->type = self::NETWORK_ID;
		$pk->eid = $this->getId();
		$pk->x = $this->x;
		$pk->y = $this->y;
		$pk->z = $this->z;
		$pk->speedX = $this->motionX;
		$pk->speedY = $this->motionY;
		$pk->speedZ = $this->motionZ;
		$pk->yaw = $this->yaw;
		$pk->pitch = $this->pitch;
		$pk->metadata = $this->dataProperties;
		$player->dataPacket($pk);

		parent::spawnTo($player);
	}

	public function isTamed() {
		return $this->getDataFlag(self::DATA_FLAGS, self::DATA_FLAG_TAMED);
	}

	public function setTamed($value = true) {
		return $this->setDataFlag(self::DATA_FLAGS, self::DATA_FLAG_TAMED, $value);
	}

	public function getDrops() {
		$drops = [
			ItemItem::get(ItemItem::LEATHER, 0, mt_rand(0, 2))
		];

		return $drops;
	}

	public function canBeLeashed() {
		return !$this->getDataFlag(self::DATA_FLAGS, self::DATA_FLAG_LEASHED); //TODO: distance check
	}

	/**
	 * Get the object related inventory
	 *
	 * @return Inventory|null
	 */
	public function getInventory() {
		print $this->getName().PHP_EOL;
		return $this->isTamed() ? $this->inventory : null;
		// TODO: Implement getInventory() method.
	}

	/**
	 * @param void $str
	 */
	public function setName($str) {
		if ($str === "") {
			unset($this->namedtag->CustomName);
			return;
		}

		$this->namedtag->CustomName = new StringTag("CustomName", $str);
	}

	/**
	 * @return string
	 */
	public function getName() {
		return isset($this->namedtag->CustomName) ? $this->namedtag->CustomName->getValue() : "Horse";//TODO: Name by type
	}

	/**
	 * @return bool
	 */
	public function hasName() {
		return isset($this->namedtag->CustomName);
	}
}
