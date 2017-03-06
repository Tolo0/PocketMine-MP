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

namespace pocketmine\utils;


use pocketmine\Server;

class MapToPNG {

	/** @param Color[] $colors
	 * @param string $filename
	 */
	public function __construct($colors, string $filename) {
		if (!extension_loaded("gd")) {
			Server::getInstance()->getLogger()->error("Unable to find the gd extension, can't create PNG image from Map");
			var_dump(get_loaded_extensions());
			return;
		}
		@mkdir(Server::getInstance()->getDataPath()."maps");
		$filename = $filename==""?Server::getInstance()->getDataPath()."maps/map_0.png":Server::getInstance()->getDataPath().'maps/'.$filename;
		$size = round(sqrt(count($colors)));
		$img = imagecreatetruecolor($size, $size);
		#imagecolortransparent($img, imagecolorallocate($img, 0, 0, 0));
		for ($y = 0; $y < $size; ++$y) {
			for ($x = 0; $x < $size; ++$x) {
				$color = $colors[($y*$size) + $x];
				#imagesetpixel($img, $x, $y, imagecolorallocatealpha($img, $color->getR(),$color->getG(),$color->getB(),$color->getA()));
				imagesetpixel($img, $x, $y, imagecolorallocate($img, $color->getR(),$color->getG(),$color->getB()));
				print $color;
			}
		}
		imagepng($img, $filename);
	}
}