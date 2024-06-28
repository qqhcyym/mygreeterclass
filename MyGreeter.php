<?php
/**
 *
 */
class MyGreeter{

	const EMPTYDATA="The BaseData is empty,please check!";
	const EMPTYRANGE="No correct time range,please check!";
	static $now_time;
	static $init;

	public function __construct (array $init) {
		$this->init=$init;
		$this->now_time = self::getNowTime();
	}

	/**
	 * get match key and return text
	 */
	public function greeting () {
		$key=0;
		$check=false;
		if(!empty($this->init)){
			foreach($this->init as $k => $v){
				if(self::isInRage($this->now_time,$v['min'],$v['max'])){
					$key=$k;
					$check=true;
					break;
				}
			}
		}else{
			return self::EMPTYDATA;
		}
		//response
		if(!$check){
			return self::EMPTYRANGE;
		}else{
			return $this->init[$key]['text'];
		}
	}

	//get server nowtime
	private static function getNowTime(){
		return intval(date("H"));
	}

	//check the number is in range(min & max)
	private static function isInRage($number, $min, $max){
		return $number >= $min && $number < $max;
	}

}
