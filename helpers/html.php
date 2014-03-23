<?php
def('mask_ip', function($ip){
  return preg_replace('/\.\d+\.\d+$/', '.***.***', $ip);
});
