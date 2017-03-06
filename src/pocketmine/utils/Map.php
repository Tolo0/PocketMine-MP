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

class Map {

	public static $BaseMapColors = [];
	public static $MapColors = [];

	public function __construct() {
		self::$BaseMapColors = [
			new Color(0, 0, 0, 0),
			new Color(127, 178, 56),
			new Color(247, 233, 163),
			new Color(167, 167, 167),
			new Color(255, 0, 0),
			new Color(160, 160, 255),
			new Color(167, 167, 167),
			new Color(0, 124, 0),
			new Color(255, 255, 255),
			new Color(164, 168, 184),
			new Color(183, 106, 47),
			new Color(112, 112, 112),
			new Color(64, 64, 255),
			new Color(104, 83, 50),
			//new 1.7 colors (13w42a/13w42b)
			new Color(255, 252, 245),
			new Color(216, 127, 51),
			new Color(178, 76, 216),
			new Color(102, 153, 216),
			new Color(229, 229, 51),
			new Color(127, 204, 25),
			new Color(242, 127, 165),
			new Color(76, 76, 76),
			new Color(153, 153, 153),
			new Color(76, 127, 153),
			new Color(127, 63, 178),
			new Color(51, 76, 178),
			new Color(102, 76, 51),
			new Color(102, 127, 51),
			new Color(153, 51, 51),
			new Color(25, 25, 25),
			new Color(250, 238, 77),
			new Color(92, 219, 213),
			new Color(74, 128, 255),
			new Color(0, 217, 58),
			new Color(21, 20, 31),
			new Color(112, 2, 0),
			//new 1.8 colors
			new Color(126, 84, 48)];

		for ($i = 0; $i < count(self::$BaseMapColors); ++$i) {
			/** @var Color $bc */
			$bc = self::$BaseMapColors[$i];
			self::$MapColors[$i * 4 + 0] = new Color((int)($bc->getR() * 180.0 / 255.0 + 0.5), (int)($bc->getG() * 180.0 / 255.0 + 0.5), (int)($bc->getB() * 180.0 / 255.0 + 0.5), $bc->getA());
			self::$MapColors[$i * 4 + 1] = new Color((int)($bc->getR() * 220.0 / 255.0 + 0.5), (int)($bc->getG() * 220.0 / 255.0 + 0.5), (int)($bc->getB() * 220.0 / 255.0 + 0.5), $bc->getA());
			self::$MapColors[$i * 4 + 2] = $bc;
			self::$MapColors[$i * 4 + 3] = new Color((int)($bc->getR() * 135.0 / 255.0 + 0.5), (int)($bc->getG() * 135.0 / 255.0 + 0.5), (int)($bc->getB() * 135.0 / 255.0 + 0.5), $bc->getA());
		}
	}

	public function getMapColors(){
		return self::$MapColors;
	}
}