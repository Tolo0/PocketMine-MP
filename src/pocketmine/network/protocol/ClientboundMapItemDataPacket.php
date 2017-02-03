<?php
namespace pocketmine\network\protocol;
#include <rules/DataPacket.h>
class ClientboundMapItemDataPacket extends DataPacket{
	const NETWORK_ID = Info::CLIENTBOUND_MAP_ITEM_DATA_PACKET;//0x41

	public $eid1 = 0;//white dot?
	public $varint1 = 5;//x-offset?
	public $varint2 = 5;//z-offset?
	public $eid2 = 0;//? maybe an array of markers positions
	public $varint3 = 2;//rotation of entity 0-8? (360/8) = one step rotate
	//over all.. some MapDecoration object is in IDA
	public function decode(){
		/*
		$this->eid = $this->getEntityId();
		$this->action = $this->getVarInt();
		$this->getBlockCoords($this->x, $this->y, $this->z);
		$this->face = $this->getVarInt();//still interact packet shit. needed the functions
		*/
		/*
		getVarInt
		getbyte
		getbyte
		getstring
		getunsingedint
		LATER:
		getvarint
		getvarint
		getvarint
		getvarint
		LATER:
		getunsingedvarint
		BUT: 9 reads in total??
		*/
	}
	public function encode(){
		$this->reset();
		$this->putEntityId($this->eid1);
		$this->putVarInt($this->varint1);
		$this->putVarInt($this->varint2);
		$this->putEntityId($this->eid2);
		$this->putVarInt($this->varint3);
	}
}