<?php
def('get_request', function($url){
  return file_get_contents($url);
});
