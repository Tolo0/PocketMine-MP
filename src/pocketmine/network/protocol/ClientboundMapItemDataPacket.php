<?php
namespace pocketmine\network\protocol;
class ClientboundMapItemDataPacket extends DataPacket {
	const NETWORK_ID = Info::CLIENTBOUND_MAP_ITEM_DATA_PACKET;//0x41
	const UPDATE = 6;
	const FULL = 4;
	
	public $mapId; // EntityUniqueID
	public $unknown; // getUnsignedVarInt
	public $unknown2; // getUnsignedVarInt
//std::vector<EntityUniqueID,std::allocator<EntityUniqueID>>::_M_default_append(uint)
// This basically means: no data, no stuff
//--------------------------------
//EntityUniqueID
//getByte
//getUnsignedVarInt
//std::vector<std::shared_ptr<MapDecoration>,std::allocator<std::shared_ptr<MapDecoration>>>::_M_default_append(uint)
//--------------------------------
//getVarInt
//getByte
//getByte
//getString
//getUnsignedInt
//Lock_policyE2EEC2ISaIS0_EJNS0_4TypeERaS7_aRSsR5ColorEEESt19_Sp_make_shared_tagRKT_DpOT0_
	/*.plt:0069489C
	.plt:0069489C                 LDR             PC, [R12,#(_ZNSt12__shared_ptrI13MapDecorationLN9__gnu_cxx12_Lock_policyE2EEC2ISaIS0_EJNS0_4TypeERaS7_aRSsR5ColorEEESt19_Sp_make_shared_tagRKT_DpOT0__ptr - 0x1E1489C)]! ; _ZNSt12__shared_ptrI13MapDecorationLN9__gnu_cxx12_Lock_policyE2EEC2ISaIS0_EJNS0_4TypeERaS7_aRSsR5ColorEEESt19_Sp_make_shared_tagRKT_DpOT0_
	.plt:0069489C ; End of function j__ZNSt12__shared_ptrI13MapDecorationLN9__gnu_cxx12_
	.plt:006948A0 ; [0000000C BYTES: COLLAPSED FUNCTION MapItemSavedData::addDecoration(EntityUniqueID,std::shared_ptr<MapDecoration>). PRESS CTRL-NUMPAD+ TO EXPAND]
	.plt:006948AC ; [0000000C BYTES: COLLAPSED FUNCTION MapDecoration::getImg(void). PRESS CTRL-NUMPAD+ TO EXPAND]
	.plt:006948B8 ; [0000000C BYTES: COLLAPSED FUNCTION MapDecoration::getRot(void). PRESS CTRL-NUMPAD+ TO EXPAND]
	.plt:006948C4 ; [0000000C BYTES: COLLAPSED FUNCTION MapDecoration::getX(void). PRESS CTRL-NUMPAD+ TO EXPAND]
	.plt:006948D0 ; [0000000C BYTES: COLLAPSED FUNCTION MapDecoration::getY(void). PRESS CTRL-NUMPAD+ TO EXPAND]
	.plt:006948DC ; [0000000C BYTES: COLLAPSED FUNCTION MapDecoration::getLabel(void). PRESS CTRL-NUMPAD+ TO EXPAND]
	.plt:006948E8 ; [0000000C BYTES: COLLAPSED FUNCTION MapDecoration::getColor(void). PRESS CTRL-NUMPAD+ TO EXPAND]
	.plt:006948F4 ; [0000000C BYTES: COLLAPSED FUNCTION __aeabi_memset8. PRESS CTRL-NUMPAD+ TO EXPAND]
	.plt:00694900 ; [0000000C BYTES: COLLAPSED FUNCTION MapDecoration::MapDecoration(MapDecoration::Type,signed char,signed char,signed char,std::string const&,Color const&). PRESS CTRL-NUMPAD+ TO EXPAND]
	.plt:0069490C ; [0000000C BYTES: COLLAPSED FUNCTION std::__shared_count<(__gnu_cxx::_Lock_policy)2>::__shared_count<MapDecoration *,std::__shared_ptr<MapDecoration *,(std::__shared_count<(__gnu_cxx::_Lock_policy)2>)2>::_Deleter<std::allocator<MapDecoration *>>,std::__shared_ptr<MapDecoration *,(std::__shared_count<(__gnu_cxx::_Lock_policy)2>)2>::_Deleter<std::allocator<MapDecoration *>>>(MapDecoration *,std::__shared_ptr<MapDecoration *,(std::__shared_count<(__gnu_cxx::_Lock_policy)2>)2>::_Deleter<std::allocator<MapDecoration *>>,std::__shared_ptr<MapDecoration *,(std::__shared_count<(__gnu_cxx::_Lock_policy)2>)2>::_Deleter<std::allocator<MapDecoration *>>). PRESS CTRL-NUMPAD+ TO EXPAND]
	.plt:00694918 ; [0000000C BYTES: COLLAPSED FUNCTION ClientboundMapItemDataPacket::~ClientboundMapItemDataPacket(). PRESS CTRL-NUMPAD+ TO EXPAND]
	.plt:00694924 ; [0000000C BYTES: COLLAPSED FUNCTION ClientboundMapItemDataPacket::~ClientboundMapItemDataPacket(). PRESS CTRL-NUMPAD+ TO EXPAND]
	.plt:00694930 ; [0000000C BYTES: COLLAPSED FUNCTION ClientboundMapItemDataPacket::getId(void). PRESS CTRL-NUMPAD+ TO EXPAND]
	.plt:0069493C ; [0000000C BYTES: COLLAPSED FUNCTION ClientboundMapItemDataPacket::getName(void). PRESS CTRL-NUMPAD+ TO EXPAND]
	.plt:00694948 ; [0000000C BYTES: COLLAPSED FUNCTION ClientboundMapItemDataPacket::write(BinaryStream &). PRESS CTRL-NUMPAD+ TO EXPAND]
	.plt:00694954 ; [0000000C BYTES: COLLAPSED FUNCTION ClientboundMapItemDataPacket::read(BinaryStream &). PRESS CTRL-NUMPAD+ TO EXPAND]
	.plt:00694960 ; [0000000C BYTES: COLLAPSED FUNCTION ClientboundMapItemDataPacket::handle(NetworkIdentifier const&,NetEventCallback &). PRESS CTRL-NUMPAD+ TO EXPAND]
	.plt:0069496C ; [0000000C BYTES: COLLAPSED FUNCTION std::_Sp_counted_deleter<MapDecoration *,std::__shared_ptr<MapDecoration,(__gnu_cxx::_Lock_policy)2>::_Deleter<std::allocator<MapDecoration>>,std::__shared_ptr<MapDecoration,(__gnu_cxx::_Lock_policy)2>::_Deleter<std::allocator<MapDecoration>>,(std::__shared_ptr<MapDecoration,(__gnu_cxx::_Lock_policy)2>)2>::~_Sp_counted_deleter(). PRESS CTRL-NUMPAD+ TO EXPAND]
	.plt:00694978 ; [0000000C BYTES: COLLAPSED FUNCTION std::_Sp_counted_deleter<MapDecoration *,std::__shared_ptr<MapDecoration,(__gnu_cxx::_Lock_policy)2>::_Deleter<std::allocator<MapDecoration>>,std::__shared_ptr<MapDecoration,(__gnu_cxx::_Lock_policy)2>::_Deleter<std::allocator<MapDecoration>>,(std::__shared_ptr<MapDecoration,(__gnu_cxx::_Lock_policy)2>)2>::~_Sp_counted_deleter(). PRESS CTRL-NUMPAD+ TO EXPAND]
	.plt:00694984 ; [0000000C BYTES: COLLAPSED FUNCTION std::_Sp_counted_deleter<MapDecoration *,std::__shared_ptr<MapDecoration,(__gnu_cxx::_Lock_policy)2>::_Deleter<std::allocator<MapDecoration>>,std::__shared_ptr<MapDecoration,(__gnu_cxx::_Lock_policy)2>::_Deleter<std::allocator<MapDecoration>>,(std::__shared_ptr<MapDecoration,(__gnu_cxx::_Lock_policy)2>)2>::_M_dispose(void). PRESS CTRL-NUMPAD+ TO EXPAND]
	.plt:00694990 ; [0000000C BYTES: COLLAPSED FUNCTION std::_Sp_counted_deleter<MapDecoration *,std::__shared_ptr<MapDecoration,(__gnu_cxx::_Lock_policy)2>::_Deleter<std::allocator<MapDecoration>>,std::__shared_ptr<MapDecoration,(__gnu_cxx::_Lock_policy)2>::_Deleter<std::allocator<MapDecoration>>,(std::__shared_ptr<MapDecoration,(__gnu_cxx::_Lock_policy)2>)2>::_M_destroy(void). PRESS CTRL-NUMPAD+ TO EXPAND]
	.plt:0069499C ; [0000000C BYTES: COLLAPSED FUNCTION std::_Sp_counted_deleter<MapDecoration *,std::__shared_ptr<MapDecoration,(__gnu_cxx::_Lock_policy)2>::_Deleter<std::allocator<MapDecoration>>,std::__shared_ptr<MapDecoration,(__gnu_cxx::_Lock_policy)2>::_Deleter<std::allocator<MapDecoration>>,(std::__shared_ptr<MapDecoration,(__gnu_cxx::_Lock_policy)2>)2>::_M_get_deleter(std::type_info const&). PRESS CTRL-NUMPAD+ TO EXPAND]*/
//
//
//


	public function decode() {
	}

	public function encode() {
		$this->reset();
		$this->putEntityId($this->mapId);
		$this->putUnsignedVarInt($this->unknown);
		$this->putUnsignedVarInt($this->unknown2);
	}
}