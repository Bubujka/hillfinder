<?php
// Wrapper for earthtools.org API
// 
// http://www.earthtools.org/webservices.htm


// http://www.earthtools.org/webservices.htm#height
deffc('earthtools\get_point_height', function($latitude, $longitude){
  $r = get_request('http://www.earthtools.org/height/'.floatval($latitude).'/'.floatval($longitude));
  return (float)simplexml_load_string($r)->xpath('//meters/text()')[0];
});
