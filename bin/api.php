<?php

json_controller('get_point_height', function(){
  // REQUEST: /get_point_height?latitude=52.4822&longitude=-1.9941
  // RESPOND: 205
  return earthtools\get_point_height($_GET['latitude'], $_GET['longitude']);
});
