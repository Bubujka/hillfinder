<?php

json_controller('get_point_height', function(){
  return earthtools\get_point_height($_GET['latitude'], $_GET['longitude']);
});
