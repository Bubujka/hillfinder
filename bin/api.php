<?php

json_controller('get_point_height', function(){
  // REQUEST: /get_point_height?latitude=52.4822&longitude=-1.9941
  // RESPOND: 205

  if(!isset($_GET['latitude']) or
     !isset($_GET['longitude']) or
     !preg_match('/^\-?\d+(\.\d+)$/', $_GET['latitude']) or
     !preg_match('/^\-?\d+(\.\d+)$/', $_GET['longitude']))
     bad_request('Missed or bad arguments.');
  
  $height = earthtools\get_point_height($_GET['latitude'], $_GET['longitude']);

  HeightRequest::create(array(
    'latitude' => $_GET['latitude'],
    'longitude' => $_GET['longitude'],
    'height' => $height));

  return $height;
});

json_controller('height_requests_count', function(){
  // REQUEST: /height_requests_count
  // RESPOND: 6
  return (int)HeightRequest::count();
});

json_controller('top_highest_count', function(){
  // REQUEST: /top_highest_count
  // RESPOND: 3
  return HeightRequest::count_highest();
});

