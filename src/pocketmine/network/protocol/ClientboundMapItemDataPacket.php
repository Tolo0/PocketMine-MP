<?php
namespace pocketmine\network\protocol;
class ClientboundMapItemDataPacket extends DataPacket {
	const NETWORK_ID = Info::CLIENTBOUND_MAP_ITEM_DATA_PACKET;//0x41
	const UPDATE = 6;
	const FULL = 4;
	
	public $mapId; // VarLong
	public $unknown; // Unsigned VarInt
	public $unknown2; // Unsigned VarInt
	public $unknown3; // VarLong
	public $action; // Unsigned byte
	public $unknown4; // Unsigned VarInt
	public $unknown5; // VarInt
	public $unknown6 = 1; // $~ https://github.com/NiclasOlofsson/MiNET/blob/5064e6d15778f9bfc5dae9fef30eeca10f02f887/src/MiNET/MiNET/Net/Package.cs#L1186
	public $unknown7 = 0; // Byte
	public $showIcons; // Boolean
	public $icons = 0; // varint<xz>[] TODO: Add icons
	public $direction; // VarInt
	public $x; // varint<xz>
	public $z; // ^^^
	public $columns; // VarInt
	public $rows; // VarInt
	public $offsetX; // varint<xz>
	public $offsetZ; // ^^^
	public $data = []; // ubyte[]


	public function decode() {
	}

	public function encode() {
		$this->putLong($this->mapId);
		$this->putUnsignedVarInt($this->unknown);
		$this->putUnsignedVarInt($this->unknown2);
		$this->putLong($this->unknown3);
		$this->putByte($this->action);
		$this->putUnsignedVarInt($this->unknown4);
		$this->putVarInt($this->unknown5);
		$this->putByte($this->unknown6);
		$this->putByte($this->unknown7);
		$this->putBool($this->showIcons);
		$this->putUnsignedVarInt($this->icons); // No icons yet
		$this->putVarInt($this->direction);
		$this->putVarInt($this->x);
		$this->putVarInt($this->z);
		$this->putVarInt($this->columns);
		$this->putVarInt($this->rows);
		$this->putVarInt($this->offsetX);
		$this->putVarInt($this->offsetZ);
		$this->putDataArray($this->data);
	}
}