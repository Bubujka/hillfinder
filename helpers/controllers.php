<?php
def('json_controller', function($path, $fn){
  controller($path, function() use($fn){
    header('Content-Type: application/json');
    echo json_encode($fn());
  });
});
