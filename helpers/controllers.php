<?php
def('json_controller', function($path, $fn){
  controller($path, function() use($fn){
    header('Content-Type: application/json');
    echo json_encode($fn());
  });
});

def('bad_request', function($msg=''){
  header('HTTP/1.1 400 Bad Request', true, 400);
  if(is_dev_host())
    echo $msg;
  else
    echo 'Bad Request';
  exit;
});
