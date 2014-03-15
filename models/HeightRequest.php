<?php
class HeightRequest extends Model{

  static function last_n($n = 5){
    return static::find('all', array('limit'=>$n, 'order'=>'id desc'));
  }
}
