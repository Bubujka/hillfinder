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

    $min = $highest->height * 0.9;
    $condition = array('height > ? and id != ? ', $min, $highest->id);

    return (int)static::count(array('conditions'=>$condition));
  }
}
