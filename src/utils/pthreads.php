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

define("ASYNC_CURL_GET", 1);
define("ASYNC_CURL_POST", 2);
define("ASYNC_FUNCTION", 3);

class StackableArray extends \Stackable{
	public function __construct(){
		foreach(func_get_args() as $n => $value){
			if(is_array($value)){
				$this->{$n} = new StackableArray();
				call_user_func_array(array($this->{$n}, "__construct"), $value);
			} else{
				$this->{$n} = $value;
			}
		}
	}

	public function __destruct(){
	}

	public function run(){
	}
}

class AsyncMultipleQueue extends Thread{
	public $input;
	public $output;
	public $stop;

	public function __construct(){
		$this->input = "";
		$this->output = "";
		$this->stop = false;
		$this->start();
	}

	private function get($len){
		$str = "";
		if($len <= 0){
			return $len;
		}
		$offset = 0;
		while(!isset($str{$len - 1})){
			if(isset($this->input{$offset})){
				$str .= $this->input{$offset};
				++$offset;
			}
		}
		$this->input = (string) substr($this->input, $offset);

		return $str;
	}

	public function run(){
		while($this->stop === false){
			if(isset($this->input{5})){ //len 6 min
				$rID = \PocketMine\Utils\Utils::readInt($this->get(4));
				switch(\PocketMine\Utils\Utils::readShort($this->get(2), false)){
					case ASYNC_CURL_GET:
						$url = $this->get(\PocketMine\Utils\Utils::readShort($this->get(2), false));
						$timeout = \PocketMine\Utils\Utils::readShort($this->get(2));

						$res = (string) \PocketMine\Utils\Utils::curl_get($url, $timeout);
						$this->lock();
						$this->output .= \PocketMine\Utils\Utils::writeInt($rID) . \PocketMine\Utils\Utils::writeShort(ASYNC_CURL_GET) . \PocketMine\Utils\Utils::writeInt(strlen($res)) . $res;
						$this->unlock();
						break;
					case ASYNC_CURL_POST:
						$url = $this->get(\PocketMine\Utils\Utils::readShort($this->get(2), false));
						$timeout = \PocketMine\Utils\Utils::readShort($this->get(2));
						$cnt = \PocketMine\Utils\Utils::readShort($this->get(2), false);
						$d = array();
						for($c = 0; $c < $cnt; ++$c){
							$key = $this->get(\PocketMine\Utils\Utils::readShort($this->get(2), false));
							$d[$key] = $this->get(\PocketMine\Utils\Utils::readInt($this->get(4)));
						}
						$res = (string) \PocketMine\Utils\Utils::curl_post($url, $d, $timeout);
						$this->lock();
						$this->output .= \PocketMine\Utils\Utils::writeInt($rID) . \PocketMine\Utils\Utils::writeShort(ASYNC_CURL_POST) . \PocketMine\Utils\Utils::writeInt(strlen($res)) . $res;
						$this->unlock();
						break;
					case ASYNC_FUNCTION:
						$function = $this->get(\PocketMine\Utils\Utils::readShort($this->get(2), false));
						$params = unserialize($this->get(\PocketMine\Utils\Utils::readInt($this->get(4))));
						$res = serialize(@call_user_func_array($function, $params));
						$this->output .= \PocketMine\Utils\Utils::writeInt($rID) . \PocketMine\Utils\Utils::writeShort(ASYNC_FUNCTION) . \PocketMine\Utils\Utils::writeInt(strlen($res)) . $res;
						break;
				}
			}
			usleep(10000);
		}
	}
}

class Async extends Thread{
	public function __construct($method, $params = array()){
		$this->method = $method;
		$this->params = $params;
		$this->result = null;
		$this->joined = false;
	}

	public function run(){
		if(($this->result = call_user_func_array($this->method, $this->params))){
			return true;
		} else{
			return false;
		}
	}

	public static function call($method, $params = array()){
		$thread = new Async($method, $params);
		if($thread->start()){
			return $thread;
		}
	}

	public function __toString(){
		if(!$this->joined){
			$this->joined = true;
			$this->join();
		}

		return (string) $this->result;
	}
}