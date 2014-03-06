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

namespace PocketMine\NBT\Tag;

use PocketMine;
use PocketMine\NBT\NBT as NBT;

class Int_Array extends NamedTag{

	public function getType(){
		return NBT::TAG_Int_Array;
	}

	public function read(NBT $nbt){
		$this->value = array();
		$size = $nbt->getInt();
		for($i = 0; $i < $size and !$nbt->feof(); ++$i){
			$this->value[] = $nbt->getInt();
		}
	}

	public function write(NBT $nbt){
		$nbt->putInt(count($this->value));
		foreach($this->value as $v){
			$nbt->putInt($v);
		}
	}
}