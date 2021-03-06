<?php
class HeightRequest extends Model{

  static function last_n($n = 5){
    return static::find('all', array('limit'=>$n, 'order'=>'id desc'));
  }

  static function find_highest(){
    return static::first(array('order'=>'height desc'));
  }

  static function count_highest(){
    $highest = static::find_highest();
    if(!$highest)
      return 0;
    $min = $highest->height * 0.9;
    $condition = array('height > ? and id != ? ', $min, $highest->id);

    return (int)static::count(array('conditions'=>$condition));
  }

  static $before_create = array('set_up_ip');

  function set_up_ip(){
    $this->ip = ip2long($_SERVER['REMOTE_ADDR']);
  }

  function get_ip(){
    return long2ip($this->read_attribute('ip'));
  }
}
